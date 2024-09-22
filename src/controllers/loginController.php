<?php
session_start();
require_once(dirname(__DIR__,2).'/src/models/Users.php');
require_once(dirname(__DIR__,2).'/src/models/Pages.php');
require_once(dirname(__DIR__,2).'/src/controllers/Test.php');

// recupération de la table users

$obj_users = new Users;
$users = $obj_users->getUsers();
$page = new Pages;
$test = new Test;
// validation des données dans $_POST

$postData=$_POST;

    if(!$test->testLogin($postData)){
        $pageDisplay = $page->homepage();
    }
    $pageDisplay = $page->errorPage('les identifiants saisis ne corresondent pas à un utilisateur enregistré');