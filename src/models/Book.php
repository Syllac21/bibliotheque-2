<?php
require_once(dirname(__DIR__,2).'/src/models/Model.php');

class Books{
    public function getBooks() : array
    {
        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $getBooks = $mysqlClient-> prepare('SELECT * FROM books');
        $getBooks->execute();
        $books = $getBooks->fetchAll();
        return $books;
    }
}
