<?php
use src\Note;
require 'util/includes.php';

$note = new Note($mysqli, (int)$_GET['noteid']);
echo $templates->render('pages::note', array('valueArray'   =>  $note->getValueArray()));