<?php
use src\Note;
use src\File;
require 'util/includes.php';
try {
    $note = new Note($mysqli, (int)$_GET['noteid']);
    $note->addView();
    echo $templates->render('pages::note', array('valueArray'  =>  $note->getValueArray() , 'files' => File::noteFiles($mysqli, 1)));
} catch(Exception $e) {
    echo $templates->render('pages::nonote', array());
}