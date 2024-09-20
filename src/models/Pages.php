<?php
class Pages{
    public function homepage()
    {
        require_once(dirname(__DIR__,1).'../template/homePage.php');
    }

    public function productPage()
    {
        require_once(dirname(__DIR__,1).'../template/productPage.php');
    }

    public function contact()
    {
        require_once(dirname(__DIR__,1).'../template/contact.php');
    }

    public function errorPage($error)
    {
        require_once(dirname(__DIR__,1).'../template/errorPage.php');
    }
}