<?php
use src\Translations;

require 'db_connection.php';
require 'vendor/autoload.php';
require 'src\Translations.php';
require 'src\Note.php';

$templates = new League\Plates\Engine();
$templates->addFolder('global', 'resources/templates/global');
$templates->addFolder('pages', 'resources/templates/pages');
$templates->registerFunction('getTr', function(string $trCode) {
    $translations = new Translations('en');
    return $translations->get($trCode);
});
