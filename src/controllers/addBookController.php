<?php

require_once(dirname(__DIR__,1).'/models/Books.php');
require_once(dirname(__DIR__,1).'/models/Pages.php');

$postData=$_POST;
$page = new Pages;
$bookItem = new Books;


// validation des données saisies
if(!$bookItem->addBook($postData)) {
    header('location: /index.php?action=error');
    exit;
}

header('location: /');