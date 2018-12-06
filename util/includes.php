<?php
use src\Translations;
use src\Language;

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
