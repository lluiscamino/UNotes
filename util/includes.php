<?php
use src\Translations;
use src\Language;
use src\User;

session_start();

$dir = 'C:\xampp\htdocs\UNotes\\';

require 'db_connection.php';
require $dir . 'vendor\autoload.php';
require $dir . 'src\Language.php';
require $dir . 'src\Translations.php';
require $dir . 'src\Note.php';
require $dir . 'src\File.php';
require $dir . 'src\Category.php';
require $dir . 'src\User.php';
require $dir . 'src\UserRegistration.php';
require $dir . 'src\UserConnection.php';
require $dir . 'src\Captcha.php';

$templates = new League\Plates\Engine();
$templates->addFolder('global', $dir . 'resources\templates\global');
$templates->addFolder('pages', $dir . 'resources\templates\pages');
$templates->registerFunction('getTr', function(string $trCode): string {
    $language = new Language(Language::getLanguage());
    $language->setCookie();
    $translations = new Translations($language->code);
    return $translations->get($trCode);
});
$templates->registerFunction('isLogged', function(): bool {
    return User::isLogged();
});
$templates->registerFunction('getLoggedUserData', function(string $code) {
    if (User::isLogged()) {
        require 'db_connection.php';
        $loggedUser = new User($mysqli, $_SESSION[User::SESSION_NAME]);
        return $loggedUser->getValuesArray()[$code];
    } else {
        throw \Exception('User is not logged.');
    }
});