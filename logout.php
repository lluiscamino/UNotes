<?php
use src\User;
require 'util/includes.php';

if (User::isLogged()) {
    $user = new User($mysqli, $_SESSION[User::SESSION_NAME]);
    $user->destroySession();
}

header('Location: index');