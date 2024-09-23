<?php
session_start();
require_once(__DIR__.'./src/models/Pages.php');
require_once(__DIR__.'/src/controllers/Test.php');
require_once(__DIR__.'/src/models/Users.php');

$test = new Test;
$page = new Pages;
$user = new Users;

if(!isset($_SESSION['LOGGED_USER'])){
    if(isset($_GET['connect']) && $_GET['connect']==='adduser'){
        $pageDisplay = $page->addUserPage();
        return;
    }else{
        $pageDisplay=$page->loginPage();
        return;
    }
}

if(isset($_GET['id'])){
    if($test->testId($_GET['id'])){
        $pageDisplay = $page->book();
    }else{
        $pageDisplay = $page->errorPage('ce livre n\'existe pas');
    }
    
}elseif(!isset($_GET['action'])){
    $pageDisplay = $page->homePage();
} else{
    switch ($_GET['action']) {
        case 'produits' :
            $pageDisplay = $page->productPage();
            break;
        
        case 'contact' :
            $pageDisplay = $page->contact();
            break;
        
        case 'logout' :
            $user->logout();
            exit;
        default:
            include '/src/template/productPage.php';
            break;
    
    }
}

