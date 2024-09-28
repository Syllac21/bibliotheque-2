<?php
class Pages{
    public function loginPage(){
        require_once(dirname(__DIR__,1).'../template/login.php');
    }

    public function addUserPage(){
        require_once(dirname(__DIR__,2).'/src/template/addUserPage.php');
    }

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

    public function book()
    {
        require_once(dirname(__DIR__,1).'../template/book.php');
    }

    public function newBook()
    {
        require_once(dirname(__DIR__,1).'../template/addBook.php');
    }

    public function errorPage($error)
    {
        require_once(dirname(__DIR__,1).'../template/errorPage.php');
    }
}