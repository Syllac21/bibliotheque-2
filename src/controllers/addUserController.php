<?php
session_start();
require_once(dirname(__DIR__,2).'/src/models/Pages.php');
require_once(dirname(__DIR__,2).'/src/controllers/Test.php');

$postData = $_POST;
$page = new Pages;
$test = new Test;



// on vérifie que le visiteur vient de notre site

if($test->testAddUser($postData)){
    header('location: /');
    exit;
}

$pageDisplay = $page->errorPage('les informations saisies sont incorrectes');