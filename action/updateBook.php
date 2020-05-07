<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../login/login.php');
}
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
    $book = new Manipulation();
    $updateBook =$book->updateBook($name, $author, $publish, $version, $price, $nameFile, $categoryID, $status,$_REQUEST['code']);
    header('location: ../view/admin.php');
}