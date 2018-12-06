<?php
use src\User;
use src\UserConnection;
require 'util/includes.php';

if (!User::isLogged() && isset($_POST['signin'])) {
    $connection = new UserConnection($mysqli, $_POST['login-email'], $_POST['login-password']);
    if ($connection->check()) {
        $user = new User($mysqli, -1, $_POST['login-email']);
        $user->createSession($user->getValuesArray()['id']);
        header('Location: ' . $_POST['url'] . 'loginerror=0');
    } else {
        header('Location: ' . $_POST['url'] . 'loginerror=1');
    }
} else {
    header('Location: index');
}