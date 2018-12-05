<?php
use src\Captcha;
if (isset($_GET['code'])) {
    require '..\..\util\includes.php';
    $captchaImgInfo = Captcha::generateImage($_GET['code']);
    header('Content-Type: ' . $captchaImgInfo['type']);
    echo $captchaImgInfo['content'];
}