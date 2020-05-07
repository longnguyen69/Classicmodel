<?php
session_start();
if (!isset($_SESSION['user'])){
    header('location: ../login/login.php');
} else{
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_REQUEST['name'];
        $author = $_REQUEST['author'];
        $publish = $_REQUEST['date'];
        $version = $_REQUEST['version'];
        $price = $_REQUEST['price'];
        $categoryID = $_REQUEST['categoryID'];
        $status = $_REQUEST['status'];

        $image = $_FILES['image'];
        $nameFile = $image['name'];
        move_uploaded_file($image['tmp_name'],'../uploads/'.$nameFile);

        include "../class/Manipulation.php";


        $books = new Manipulation();
        $book = $books->addBook($name,$author,$publish,$version,$price,$nameFile,$categoryID,$status);

        header('location: ../index.php');

    }
}
