<?php
include '../connectDB/ConnectDBClass.php';

class Manipulation
{
    protected $conn;

    public function __construct()
    {
        $db = new ConnectDBClass();
        $this->conn = $db->connectDB();
    }

    public function loginAdmin($email, $password)
    {
        $sql = "select email,password from users where email = :email && password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'email' => $email,
            'password' => $password
        ));
        return $stmt->rowCount();
    }
    public function checkPass($email){
        $sql = "select password from users where email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'email'=>$email
        ));
        return $stmt;
    }
    public function changePass($newPass,$email){
        $sql = "update users set password = :password where email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'password'=>$newPass,
            'email'=>$email
        ));
    }
}