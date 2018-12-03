<?php
use src\Note;
use src\Category;
require 'util/includes.php';

if (isset($_POST['publish'])) {
    header('Location: notes/' . Note::upload($mysqli, $_POST['title'], $_POST['desc'], $_POST['content'], -1, 0, $_POST['category'], $_POST['subcategory'])->getValueArray()['id']);
}

echo $templates->render('pages::upload', array('categoryTrCodes' =>  Category::getCategories()));