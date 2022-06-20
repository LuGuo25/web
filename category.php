<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>京东</title>
    <script src="./scripts/vue.js"></script>
    <link rel="stylesheet" href="css/category.css">
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
            // 设置 页数和每页显示的物品数量 参数
            $pagenumber = $_GET['pagenumber'];
            $pagesize = 10;
            $start = ($pagenumber-1)*$pagesize;
            $sql = "select * from product55122005125 where catid=:catid limit :start,:pagesize";
            $light_stmt = $pdo->prepare($sql);
            $catid = $_GET['catid'];
            $light_stmt -> bindParam(':catid',$catid,PDO::PARAM_STR);
            $light_stmt -> bindParam(':start',$start,PDO::PARAM_INT);
            $light_stmt -> bindParam(':pagesize',$pagesize,PDO::PARAM_INT);
            $light_stmt->execute();

            // 确定该类的最大页数
            $sql = "select count(*) max_count from product55122005125 where catid=:catid";
            $count_stmt = $pdo->prepare($sql);
            $count_stmt -> bindParam(':catid',$catid,PDO::PARAM_STR);
            $count_stmt->execute();
            $count_row = $count_stmt -> fetch();
            $maxpagenumber = ceil($count_row['max_count']/$pagesize);
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
            
            // 提取catid对应的分类名称，用于显示当前在哪个分类下
            $sql = "select * from category55122005125 where catid=:catid";
            $categorytitle_stmt = $pdo->prepare($sql);
            $catid = $_GET['catid'];
            $categorytitle_stmt -> bindParam(':catid',$catid,PDO::PARAM_STR);
            $categorytitle_stmt->execute();

        }
        catch(PDOException $e)
        {
            var_dump($e -> getMessage());
        }


    ?>
    <div id="main">
        <header>
            <div class="top">
                <span v-if=<?=$flag ?>>欢迎<?=$_SESSION['yhm'];?><a href="logout.php">,注销</a></span>
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
                <li><a href="./index.php" class="return_index">首页</a></li>
                <?php while($category_row = $category_stmt->fetch()): ?>
                <li><a href="./category.php?catid=<?=$category_row['catid'];?>&pagenumber=1" class="category"><?=$category_row['catname']?></a></li>
                <?php endwhile;?>
            </ul>
        </nav>

        <div class="content">
            <div class="categorytitle">
                <!-- <img src="./images/guanggao.png" alt=""> -->
                <h1><?php $categorytitle_row = $categorytitle_stmt->fetch();
                echo $categorytitle_row['catname'];
                ?></h1>
            </div>
            <div class="lightlist">
                <?php while($light_row = $light_stmt->fetch()): ?>
                    <div class="lightitem">
                        <a href="./details.php?productid=<?=$light_row['productid'];?>"><img src="images/products/small/<?=$light_row['small_imagefile']?>" alt=""></a>
                        <span><?=$light_row['productname']?></span>
                        <span>原价：<?="￥".$light_row['price']?></span>
                        <span>折扣价：<?="￥".$light_row['discount_price']?></span>
                    </div>
                <?php endwhile;?>
            </div>
        </div>
        <page>
            <h1><span v-show=<?=($pagenumber>1)?>><a href="./category.php?catid=<?=$_GET['catid'];?>&pagenumber=<?=$_GET['pagenumber']-1?>">上一页</a></span> 当前第<?=(string)$pagenumber;?>页 <span v-show=<?=($pagenumber<$maxpagenumber)?>><a href="./category.php?catid=<?=$_GET['catid'];?>&pagenumber=<?=$_GET['pagenumber']+1?>">下一页</a></span></h1>
            <h1>当前款式共<?=(string)$maxpagenumber?>页</h1>
        </page>

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