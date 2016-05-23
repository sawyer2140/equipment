<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-3-13
 * Time: 下午4:51
 * To change this template use File | Settings | File Templates.
 */


header("Content-type: image/png");

    $list = array( "2", "3", "4", "5", "6", "7", "8", "9",
                  "a", "b", "c", "d", "f", "g", "h", "i", "j", "k", "m",
                  "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

    $cmax = count($list) - 1;

    $verifyCode = '';

    for ($i = 0; $i < 5; $i++) {
        $randnum = mt_rand(0, $cmax);
        $verifyCode .= $list[$randnum];
    }

    $_SESSION['verifyCode'] = $verifyCode;

    $im = imagecreate(60, 25);

    $white = imagecolorallocate($im, 255, 255, 255);
    $red = imagecolorallocate($im, 237, 1, 1);
    $li = ImageColorAllocate($im, 155, 154, 154);

    imagefill($im, 0, 0, $white);

    for ($i = 0; $i < 7; $i++) {
        imageline($im, rand(0, 30), rand(0, 21), rand(20, 40), rand(0, 21), $li);
    }

    imagestring($im, 5, 10, 8, $verifyCode, $red);

    imagepng($im);
    imagedestroy($im);

?>



