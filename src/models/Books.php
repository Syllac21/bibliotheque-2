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

    public function getBook($id) : array
    {
        $dbc = new Model;
        $mysqlClient =$dbc->dbConnect();
        $getBook = $mysqlClient-> prepare('SELECT * FROM books where id=:id');
        $getBook->execute([
            'id'=>$id,
        ]);
        return $getBook->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategory()
    {
        $dbc = new Model;
        $mysqlClient =$dbc->dbConnect();
        $getCategory = $mysqlClient->prepare('SELECT DISTINCT category FROM books');
        $getCategory->execute() ;
        return $getCategory->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSeries()
    {
        $dbc = new Model;
        $mysqlClient =$dbc->dbConnect();
        $series = $mysqlClient->prepare('SELECT DISTINCT serie FROM books');
        $series->execute() ;
        return $series->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBook($postData)
    {
        $dbc = new Model;
        $mysqlClient =$dbc->dbConnect();
        $insertBook = $mysqlClient->prepare('INSERT INTO books(title, autor, serie, image, category, idOwner, price) VALUES (:title, :autor, :serie, :image, :category, :idOwner, :price)');
        return $insertBook->execute([
            'title'=>$postData['title'],
            'autor'=>$postData['autor'],
            'serie'=>$postData['serie'],
            'image'=>$postData['image'],
            'category'=>$postData['category'],
            'idOwner'=>$postData['idOwner'],
            'price'=>$postData['price'],
        ]);
    }
}
