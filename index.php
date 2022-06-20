<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>京东</title>
    <script src="./scripts/vue.js"></script>
    <link rel="stylesheet" href="css/index.css">
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
    
            $sql = "select * from product55122005125 order by DATE desc limit 15";
            $product_stmt = $pdo->prepare($sql);

            $product_stmt->execute();

            $product_row = $product_stmt->fetch();
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
                    <form action="select_result.php" method="get" id="nameform">
                        <input type="text" name="selectword">
                        <button type="submit" form="nameform">搜索</button>
                    </form>
                </div>
            </div>
        </header>

        <nav>
            <ul>
                <?php while($category_row = $category_stmt->fetch()): ?>
                <li><a href="./category.php?catid=<?=$category_row['catid']?>&pagenumber=1" class="category"><?=$category_row['catname']?></a></li>
                <?php endwhile; ?>
            </ul>
        </nav>

        <div class="content">
            <div class="banner">
                <img src="./images/guanggao.png" alt="">
            </div>
            <img src="./images/xinpin.jpg" alt="">
            <div class="lightlist">
                <?php while($product_row = $product_stmt->fetch()): ?>
                <div class="lightitem">
                    <a href="./details.php?productid=<?=$product_row['productid']?>"><img src="images/products/small/<?=$product_row['small_imagefile']?>" alt=""></a>
                    <span><?=$product_row['productname']?></span>
                    <span>原价：<?="￥".$product_row['price']?></span>
                    <span>折扣价：<?="￥".$product_row['discount_price']?></span>
                    <span>发售时间：<?=$product_row['DATE']?></span>
                </div>
                <?php endwhile;?>
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