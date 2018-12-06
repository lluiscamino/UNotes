<?php
use src\Note;
use src\Category;
use src\User;
require 'util/includes.php';

if (isset($_POST['publish'])) {
    $authorId = isset($_SESSION[User::SESSION_NAME]) ? $_SESSION[User::SESSION_NAME] : -1;
    header('Location: notes/' . Note::upload($mysqli, $_POST['title'], $_POST['desc'], $_POST['content'], $authorId, 0, $_POST['category'], $_POST['subcategory'])->getValueArray()['id']);
}

echo $templates->render('pages::upload', array('categoryTrCodes' =>  Category::getCategories()));