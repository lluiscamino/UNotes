<?php
use src\Captcha;
use src\User;
use src\UserRegistration;
require 'util/includes.php';

if (!User::isLogged()) {
    if (isset($_POST['signup'])) {
        $register = new UserRegistration($mysqli, $_POST['name'], $_POST['email'], $_POST['password'], $_POST['repassword'], $_POST['captcha'], $_SESSION[Captcha::SESSION_NAME]);
        if ($register->check()) {
            User::createSession(User::register($mysqli, $_POST['name'], $_POST['email'], $_POST['password'])->getValuesArray()['id']);
            Captcha::destroySession();
            header('Location: index');
        }
    }
    $errors = isset($register) ? $register->errors() : array();
    $captcha = new Captcha();
    $captcha->createSession();
    echo $templates->render('pages::signup', array('captcha' => $captcha->getCode(), 'formerrors' => $errors));
} else {
    header('Location: index');
}