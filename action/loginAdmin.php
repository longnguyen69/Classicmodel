<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['pass'];


    include '../class/Manipulation.php';

    $user = new Manipulation();
    $login = $user->loginAdmin($email,$password);
    if ($login > 0){
        $_SESSION['user'] = $_REQUEST['email'];
        header('location: ../view/admin.php');
    } else {
        echo 'Wrong username or password';
    }
}