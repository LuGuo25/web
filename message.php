<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<style>
    div{
        width: 800px;
        height: 300px;
        background-color: #ddf;
        box-shadow: 3px 3px 3px 3px;
        margin: 50px auto;

        font-size: 40px;
        text-align: center;
        line-height: 300px;
    }
</style>
<body>
    <?php
        session_start();
        $msg = $_SESSION['msg'];
    ?>
    <div><?=$msg?></div>

</body>
</html>