<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户注册</title>
    <link rel="stylesheet" href="./css/register_input.css">
    <script src="scripts/vue.js"></script>
</head>

<body>
    <form id='myreg' action="register.php" method="post" autocomplete="on" enctype="multipart/form-data">
        <table>
            <caption><h2>用户注册</h2></caption>
            <tr>
                <td><label for="uname">用户名</label></td>
                <td><input type="text" id="uname" name="uname" required autofocus pattern="^[A-Za-z_]\w*$" placeholder="字母下划线开头，可以包含字母、下划线、数字"></td>
            </tr>
            <tr>
                <td><label for="pwd1">密码</label></td>
                <td><input type="password" id="pwd1" name="pwd1" v-model='firstpwd' required pattern="^[A-Za-z_].*$"></td>
            </tr>
            <tr>
                <td><label for="pwd2">确认密码</label></td>
                <td><input type="password" id="pwd2" name="pwd2" v-model='secondpwd' required></td>
            </tr>
            <tr v-if='firstpwd!=secondpwd'>
                <td colspan="2" id='tip'>两次输入的密码不相同</td>
            </tr>
            <tr>
                <td for="sex">性别</td>
                <td><input type="radio" name="sex" id="male" checked value="男">男
                    <input type="radio" name="sex" id="female" value="女">女</td>
            </tr>
            <tr>
                <td><label for="utel">手机号码</label></td>
                <td><input type="tel" id="utel" name="utel" pattern="^1[35789]\d{9}$"></td>
            </tr>
            <tr>
                <td><label for="email">电子邮箱</label></td>
                <td><input type="email" id="email" name="email" list="email_list"></td>
            </tr>
            <datalist id="email_list">
                <option value="@qq.com"></option>
                <option value="@126.com"></option>
                <option value="@sohu.com"></option>
                <option value="@163.com"></option>
            </datalist>
            <tr>
                <td for="">兴趣爱好</td>
                <td><input type="checkbox" name="preference[]" id="music" value="听音乐">听音乐
                    <input type="checkbox" name="preference[]" id="study" value="学习">学习
                    <input type="checkbox" name="preference[]" id="ball" value="打球">打球  </td>
            </tr>
            <tr>
                <td><label for="birthday">生日</label></td>
                <td><input type="date" name="birthday" id="birthday"></td>
            </tr>
            <!-- <tr>
                <td for="color">最喜欢的颜色</td>
                <td><input type="color" name="color" id="color" ></td>
            </tr> -->
            <!-- <tr>
                <td></td>
                <td><input type="search" name="" id=""></td>
            </tr> -->
            <tr>
                <td><label for="province">所在省份或地区</label></td>
                <td>
                    <select name="province" id="province" multiple>
                        <option value="浙江省">浙江省</option>
                        <option value="北京市">北京市</option>
                        <option value="上海市">上海市</option>
                        <option value="天津市">天津市</option>
                        <option value="重庆市">重庆市</option>
                        <option value="江苏省">江苏省</option>
                        <option value="安徽省">安徽省</option>
                        <option value="江西省">江西省</option>
                        <option value="福建省">福建省</option>
                        <option value="山东省">山东省</option>
                        <option value="河北省">河北省</option>
                        <option value="山西省">山西省</option>
                        <option value="辽宁省">辽宁省</option>
                        <option value="吉林省">吉林省</option>
                        <option value="黑龙江省">黑龙江省</option>
                        <option value="河南省">河南省</option>
                        <option value="四川省">四川省</option>
                        <option value="贵州省">贵州省</option>
                        <option value="陕西省">陕西省</option>
                        <option value="甘肃省">甘肃省</option>
                        <option value="青海省">青海省</option>
                        <option value="海南省">海南省</option>
                        <option value="内蒙古">内蒙古</option>
                        <option value="广西">广西</option>
                        <option value="西藏">西藏</option>
                        <option value="宁夏">宁夏</option>
                        <option value="新疆">新疆</option>
                        <option value="香港">香港</option>
                        <option value="澳门">澳门</option>
                        <option value="台湾">台湾</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="mypicture">照片</label></td>
                <td><input type="file" id="mypicture" name="mypicture" accept="image/jpeg,image/png,image/gif,image/bmp"></td>
            </tr>
            <tr>
                <td colspan="2" id="smttd"><input type="submit" value="注册" id="smt"></td>
            </tr>
        </table>
    </form>

    <script>
        new Vue({
            el:"#myreg",
            data: {
                firstpwd:'',
                secondpwd:''
            }
        });
    </script>
</body>

</html>