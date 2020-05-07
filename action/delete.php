<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../login/login.php');
}

    include "../class/Manipulation.php";

    $objBook = new Manipulation();
    $objBook->deleteBook($_REQUEST['code']);

    header('location: ../view/admin.php');
