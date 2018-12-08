<?php
use src\Note;
use src\File;
use src\User;
require 'util/includes.php';
try {
    $note = new Note($mysqli, (int)$_GET['noteid']);
    $note->addView();
    $valueArray = $note->getValueArray();
    $user = new User($mysqli, $valueArray['author_id']);
    $userDetails = $user->exists() ? array_merge($user->getValuesArray(), array('isguest' => false)) : array('isguest' => true);
    echo $templates->render('pages::note', array('valueArray'  =>  $valueArray , 'userDetails'  =>  $userDetails, 'files' => File::noteFiles($mysqli, (int)$_GET['noteid'])));
} catch(Exception $e) {
    echo $templates->render('pages::nonote', array());
}