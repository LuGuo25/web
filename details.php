<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>京东</title>
    <script src="./scripts/vue.js"></script>
    <link rel="stylesheet" href="css/details.css">
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['yhm'])){
            $flag = 'true';
        }
        else{
            $flag = 'false';
        }
        // SELECT * FROM product55122005125 WHERE productname LIKE CONCAT('%',KEY,'%');
        
        try{

            //使用php数据库抽象层（PDO:php data object）来访问数据库
            //dsn(data source name 数据源名字)
            $dsn = "mysql:host=localhost;dbname=lightshop55122005125;charset=utf8";
            $dbusername = "root";
            $dbuserpwd = "root";
    
            //创建pdo对象，以root用户的身份登陆到本地mysql服务器上的shoeshop551220051数据库
            $pdo = new PDO($dsn, $dbusername, $dbuserpwd);
    
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = "select * from category55122005125";
            $category_stmt = $pdo->prepare($sql);
    
            $category_stmt->execute();
            $catid = 01;

        }
        catch(PDOException $e)
        {
            var_dump($e -> getMessage());
        }

        try{

            //使用php数据库抽象层（PDO:php data object）来访问数据库
            //dsn(data source name 数据源名字)
            $dsn = "mysql:host=localhost;dbname=lightshop55122005125;charset=utf8";
            $dbusername = "root";
            $dbuserpwd = "root";
    
            //创建pdo对象，以root用户的身份登陆到本地mysql服务器上的shoeshop551220051数据库
            $pdo = new PDO($dsn, $dbusername, $dbuserpwd);
    
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $productid = $_GET['productid'];
            $sql = "select * from product55122005125 where productid = '$productid'";
            $light_stmt = $pdo->prepare($sql);
            $light_stmt->execute();
            $light_row = $light_stmt->fetch();
        }
        catch(PDOException $e)
        {
            var_dump($e -> getMessage());
        }


    ?>
    <div id="main">
        <header>
            <div class="top">
                <span v-if=<?=$flag ?>>欢迎<?=$_SESSION['yhm'];?>,<a 
                href="logout.php">注销</a></span>
                <span v-else>欢迎来到***，请<a href="login_input.php">登录</a></span>
            </div>
            <div class="bottom">
                <img src="images/jingdong.jpg" alt="">
                <div>
                    <form action="select_result.php" method="get" id="nameform"><input type="text" name="selectword">
                    <button type="submit" form="nameform" value="提交搜索">搜索</button></form>
                </div>
            </div>
        </header>

        <nav>
            <ul>
                <?php while($category_row = $category_stmt->fetch()): ?>
                <li><a href="./category.php?catid=<?=$category_row['catid'];?>&pagenumber=1" class="category"><?=$category_row['catname']?></a></li>
                <?php endwhile;?>
                <li><a href="./index.php" class="return_index">首页</a></li>
            </ul>
        </nav>

        <div class="content">
            <div class="lightlist">
                    <div class="lightitem">
                        <img src="images/products/large/<?=$light_row['large_imagefile']?>" alt="">
                    </div>
                    <div class="lightdetails">
                        <span><h1><?=$light_row['productname']?></h1></span>
                        <span>简介：<?=$light_row['descn']?></span>
                        <span>原价：<?="￥".$light_row['price']?></span>
                        <span>折扣价：<?="￥".$light_row['discount_price']?></span>
                        <span>购买数量：</span>
                        <form action="" method="post" id="submit" name="submit">
                            <input type="number" id="number" min="1" max="<?=$light_row['qty']?>" name="number">
                            <button type="submit" form="submit" class="submit_button">提交订单</button>
                        </form>
                    </div>
            </div>
        </div>
        <footer>
            Copyright 2002 - 2022 网络20051 卢果 55122005125 ,All Rights Reserverd|京ICP备17043473
        </footer>
    </div>

    <script>
        new Vue({
            el:'#main',
        })
    </script>
</body>
</html>