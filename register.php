<?php
session_start();

$username = $_POST['uname'];
$userpassword1 = $_POST['pwd1'];
// $userpassword2 = $_GET['pwd2'];
$usertel = $_POST['utel'];
$useremail = $_POST['email'];
$usersex = $_POST['sex'];
$userpreference = $_POST['preference'];
$userprovince = $_POST['province'];

$birth = $_POST['birthday'];


if(isset($userpreference)){
    $useraihao = implode(',',$userpreference);
}

if($_FILES['mypicture']['error']===4)
{
    echo '没有选择上传的文件';
}
elseif($_FILES['mypicture']['size']>1024*50){
    echo "上传的图片大小应小于等于50K";
}
elseif(!in_array($_FILES['mypicture']['type'],['image/jpeg','image/png','image/gif','image/bmp']))
{
    echo "上传的图片文件格式不正确";
}
else{

    $imagefile = $_FILES['mypicture']['name'];
    move_uploaded_file($_FILES['mypicture']['tmp_name'],'images/'.$_FILES['mypicture']['name']);
    
    try{

        //使用php数据库抽象层（PDO:php data object）来访问数据库
        //dsn(data source name 数据源名字)
        $dsn = "mysql:host=localhost;dbname=lightshop55122005125;charset=utf8";
        $dbusername = "root";
        $dbuserpwd = "root";

        //创建pdo对象，以root用户的身份登陆到本地mysql服务器上的shoeshop551220051数据库
        $pdo = new PDO($dsn, $dbusername, $dbuserpwd);

        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "select * from account55122005125 where fullname=:uname";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':uname', $username, PDO::PARAM_STR);

        $stmt->execute();
        $row = $stmt->fetch();//存在的话，返回时查到的用户记录，如果不存在返回false

        if(!$row){
            $sql = "insert into account55122005125 values(null, :uname, :upwd,:usex, :uaddress, :uemail, :uphone, :ubirth, :uhobby, :uimagefile)";
        
            //pdo准备sql语句，得到一个名为$stmt语句对象
            $stmt = $pdo->prepare($sql);
            if ($birth == '') $birth = null;

            $stmt->bindParam(':uname', $username, PDO::PARAM_STR);
            $stmt->bindParam(':upwd', $userpassword1, PDO::PARAM_STR);
            $stmt->bindParam(':usex', $usersex, PDO::PARAM_STR);
            $stmt->bindParam(':uaddress', $userprovince, PDO::PARAM_STR);
            $stmt->bindParam(':uemail', $useremail, PDO::PARAM_STR);
            $stmt->bindParam(':uphone', $usertel, PDO::PARAM_STR);
            $stmt->bindParam(':ubirth', $birth, PDO::PARAM_STR);
            $stmt->bindParam(':uhobby', $useraihao, PDO::PARAM_STR);
            $stmt->bindParam(':uimagefile', $imagefile, PDO::PARAM_STR);

            $stmt ->execute();

            $_SESSION['msg'] = '注册成功,<a href="login_input.php">去登陆</a>';

        }else{

            $_SESSION['msg'] = '该用户名已经注册，请换一个用户名<a href="register_input.php">去注册</a>';

        }
        header('location:message.php');

    }
    catch(PDOException $e)
    {
        
        var_dump($e -> getMessage());
        
    }

}

