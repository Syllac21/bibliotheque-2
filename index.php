<?php
require_once(__DIR__.'./src/models/Pages.php');
$page = new Pages;

if(!isset($_GET['action'])){
    $pageDisplay = $page->homePage();
} else{
    switch ($_GET['action']) {
        case 'produits' :
            $pageDisplay = $page->productPage();
            break;
        
        case 'contact' :
            $pageDisplay = $page->contact();
            break;

        default:
            include '/src/template/productPage.php';
            break;
    
    }
}

