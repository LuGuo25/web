<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户登录</title>
    <link rel="stylesheet" href="css/login_input.css">
    <script src="scripts/vue.js"></script>
</head>
<body>
    <?php
        // $uname = $_GET['yhm'];
        // $upwd = $_GET['yhmm'];

        $uname_pwd = $_COOKIE['auth'];
        $arr_uname_pwd = explode(':',$uname_pwd);
    ?>
    <!-- <form action=<?='login.php?yhm='.$uname.'&yhmm='.$upwd ?> method="post"> -->
    <form action="login.php" method="post" id="login">
    <table>
        <caption>欢迎登陆</caption>
        <tr>
            <td><input type="text" name="username" placeholder="请输入用户名" value=<?=base64_decode($arr_uname_pwd[0]);?>></td>
        </tr>
        <tr>
            <td><input type="password" name="userpassword" placeholder="请输入密码" value=<?=base64_decode($arr_uname_pwd[1]);?>></td>
        </tr>
        <tr>
            <td class='captcha'><input type="text" name="captcha" placeholder="请输入验证码"><img :src="imgpicture" alt="" @click='refresh'></td>
        </tr>
        <tr>
            <td><input type="checkbox" name="remember">30天内免密登录</td>
        </tr>
        <tr>
            <td><a href="./register_input.php" class="register">还没有账户？去注册</a></td>
        </tr>
        <tr>
            <td><input type="submit" value="登录"></td>
        </tr>
    </table>
    </form>

    <script>
        new Vue({
            el:'#login',
            data:{
                imgpicture: 'captcha.php'
            },
            methods:{
                refresh(){
                    this.imgpicture = 'captcha.php?'+Math.random();
                }
            },
        })
    </script>
</body>
</html>

