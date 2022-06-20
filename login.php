<?php
session_start();

$input_uname = $_POST['username'];
$input_pwd = $_POST['userpassword'];
$input_captcha = strtoupper($_POST['captcha']);


/* $correct_uname = $_GET['yhm'];
$correct_pwd = $_GET['yhmm']; */

// $correct_uname = $_SESSION['yhm'];
// $correct_pwd = $_SESSION['yhmm'];
$correct_captcha = $_SESSION['correct_captcha'];


/* echo $input_uname;
echo "<br>";
echo $input_pwd;
echo "<br>";
echo $correct_uname;
echo "<br>";
echo $correct_pwd;
echo "<br>"; */
if($input_captcha == $correct_captcha){
    
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
        $stmt->bindParam(':uname', $input_uname, PDO::PARAM_STR);

        $stmt->execute();
        $row = $stmt->fetch();//存在的话，返回时查到的用户记录，如果不存在返回false

        if($row){
            $correct_pwd = $row['upassword'];
            if($input_pwd===$correct_pwd){

                // echo "登录成功";
                // var_dump(isset($_POST['remember']));
                if(isset($_POST['remember'])){
                    setcookie('auth',base64_encode($input_uname).':'.base64_encode($correct_pwd),time()+30*24*60*60);
                }
                else{
                    setcookie('auth',base64_encode($input_uname).':'.base64_encode($correct_pwd),time()-1);
                }
                $_SESSION['yhm'] = $input_uname;
                header('location:index.php');
            }
            else{
                $_SESSION['msg'] = '密码错误，请重新<a href="login_input.php">登录</a>';
                header('location:message.php');
            }

        }else{
            $_SESSION['msg'] = '该用户不存在，请重新<a href="login_input.php">登录</a>';
            header('location:message.php');
        }

    }
    catch(PDOException $e)
    {
        
        var_dump($e -> getMessage());
        
    }
}else{
    echo "验证码错误";
}
