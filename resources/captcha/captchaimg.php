<?php
use src\Captcha;
require '../../util/includes.php';

$code = isset($_GET['code']) && $_GET['code'] !== '' ? $_GET['code'] : 'ERROR';
$captchaImgInfo = Captcha::generateImage($code);
header('Content-Type: ' . $captchaImgInfo['type']);
echo $captchaImgInfo['content'];