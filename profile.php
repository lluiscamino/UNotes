<?php
use src\User;
use src\Note;
require 'util/includes.php';
$userId = isset($_GET['userid']) ? (int)$_GET['userid'] : -1;
$user = new User($mysqli, $userId);
if ($user->exists()) {
    echo $templates->render('pages::profile', array('valueArray'  =>  $user->getValuesArray(), 'notes'  =>  Note::getNotesByUser($mysqli, $userId)));
} else {
    echo $templates->render('pages::noprofile');
}