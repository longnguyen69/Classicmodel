<?php
//include 'config.php';

class ConnectDBClass
{
    protected $userName;
    protected $password;

    public function __construct()
    {
        $this->userName = USERNAME;
        $this->password = PASSWORD;
    }
    public function connectDB(){
        $conn = null;
        try {
            $conn = new PDO("mysql:host=localhost;dbname=librarymanager",$this->userName,$this->password);
        } catch (PDOException $exception){
            return $exception->getMessage();
        }
        return $conn;
    }
}