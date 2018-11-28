<?php
use src\Note;
require 'util/includes.php';

try {
    $note = new Note($mysqli, (int)$_GET['noteid']);
    $note->addView();
    echo $templates->render('pages::note', array('valueArray'  =>  $note->getValueArray()));
} catch(Exception $e) {
    echo $templates->render('pages::nonote', array());
}