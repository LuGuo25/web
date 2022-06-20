<?php
session_start();
header('content-type:image/png');

// 创建画布
$wid = 100;
$hei = 60;
$img = imagecreatetruecolor($wid,$hei);

// 调色
$imgcolor = imagecolorallocate($img, 255,255,255);

// 填充颜色
imagefill($img,0,0,$imgcolor);

// 生产四个随机数字随机颜色随机位置的验证码
// 方法一：用数组取

$arr_char = range('A','Z');
$arr_num = range(0,9);
$arr = array_merge($arr_char,$arr_num); 

$correct_captcha = '';
for($i=0;$i<=3;$i++){
    $color = imagecolorallocate($img,rand(0,200),rand(0,200),rand(0,200));
    // imagettftext($img,30,0,20+$wid/4*$i+rand(5,10),$hei/3+rand(0,$hei/3),$color,'C:/Windows/Fonts/micross.ttf',$arr[rand(0,count($arr)-1)]);
    $ch = $arr[rand(0,count($arr)-1)];
    imagestring($img,10,5+$wid/4*$i + rand(5,10),5+rand(5,40),$ch,$color);
    $correct_captcha .= $ch;
}

$_SESSION['correct_captcha'] = $correct_captcha;


// 创建干扰线条
for($j=0;$j<=1;$j++){
    $color = imagecolorallocate($img,rand(0,200),rand(0,200),rand(0,200));
    $x1 = rand(0,$wid);
    $x2 = rand(0,$wid);
    $y1 = rand(0,$hei);
    $y2 = rand(0,$hei);
    
    imageline($img,$x1,$y1,$x2,$y2,$color);
}

// 创建干扰点
for($k=0; $k <= rand(30,100);$k++){
    $color = imagecolorallocate($img,rand(0,200),rand(0,200),rand(0,200));
    imagesetpixel($img,rand(0,$wid),rand(0,$hei),$color);
}

// 输出画布
imagepng($img);
imagedestroy($img);
