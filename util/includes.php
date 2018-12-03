<?php
use src\Translations;
use src\Language;

require 'db_connection.php';
require 'vendor/autoload.php';
require 'src\Language.php';
require 'src\Translations.php';
require 'src\Note.php';
require 'src\File.php';
require 'src\Category.php';

$templates = new League\Plates\Engine();
$templates->addFolder('global', 'resources/templates/global');
$templates->addFolder('pages', 'resources/templates/pages');
$templates->registerFunction('getTr', function(string $trCode): string {
    $language = new Language(Language::getLanguage());
    $language->setCookie();
    $translations = new Translations($language->code);
    return $translations->get($trCode);
});
