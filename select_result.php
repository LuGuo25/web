<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        try{

            //使用php数据库抽象层（PDO:php data object）来访问数据库
            //dsn(data source name 数据源名字)
            $dsn = "mysql:host=localhost;dbname=lightshop55122005125;charset=utf8";
            $dbusername = "root";
            $dbuserpwd = "root";
            
            //创建pdo对象，以root用户的身份登陆到本地mysql服务器上的shoeshop551220051数据库
            $pdo = new PDO($dsn, $dbusername, $dbuserpwd);
            
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $selectword = $_GET['selectword'];
            // 模糊查询
            $sql = "select * from product55122005125 where productname like '%$selectword%'";
            // select * from product55122005125 where productname like '%专业%';
            $select_stmt = $pdo->prepare($sql);
            // $select_stmt -> bindParam(':selectword',$selectword,PDO::PARAM_STR);
            $select_stmt->execute();
            // $select_row=$select_stmt->fetch();

            }
            catch(PDOException $e)
            {
            var_dump($e -> getMessage());
            }
    ?>
        <div class="lightlist">
            <?php while($select_row = $select_stmt->fetch()): ?>
                <div class="lightitem">
                    <img src="images/products/small/<?=$select_row['small_imagefile']?>" alt="">
                    <span><?=$select_row['productname']?></span>
                    <span>原价：<?="￥".$select_row['price']?></span>
                    <span>折扣价：<?="￥".$select_row['discount_price']?></span>
                </div>
            <?php endwhile;?>
        </div>
</body>
</html>