<?php


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

    public function checkPass($email)
    {
        $sql = "select password from users where email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'email' => $email
        ));
        return $stmt;
    }

    public function changePass($newPass, $email)
    {
        $sql = "update users set password = :password where email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'password' => $newPass,
            'email' => $email
        ));
    }

    public function addBook($name, $author, $publish, $version, $price, $nameFile, $categoryID, $status)
    {
        $sql = 'insert into books(name,author,publish,version_number,price,image,category_id,status) values (?,?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $author);
        $stmt->bindParam(3, $publish);
        $stmt->bindParam(4, $version);
        $stmt->bindParam(5, $price);
        $stmt->bindParam(6, $nameFile);
        $stmt->bindParam(7, $categoryID);
        $stmt->bindParam(8, $status);

        $stmt->execute();
    }

    public function showCategories()
    {
        $sql = 'select * from categories';
        $stmt = $this->conn->query($sql);
        //        var_dump($a);die();
        return $stmt->fetchAll();
    }

    public function getStatus()
    {
        $sql = "select status from books";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }

    public function getListBooks()
    {
        $sql = "select * from books";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

    public function getBook($code)
    {
        $sql = "select * from books where code = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $code);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateBook($name, $author, $publish, $version, $price, $nameFile, $categoryID, $status, $code)
    {
        $sql = "update books set name= :name,author = :author,publish= :publish,version_number= :version,price= :price,image= :image,category_id= :id,status= :status where code = :code";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'name' => $name,
            'author' => $author,
            'publish' => $publish,
            'version' => $version,
            'price' => $price,
            'image' => $nameFile,
            'id' => $categoryID,
            'status' => $status,
            'code' => $code
        ));
    }
    public function deleteBook($code){
        $sql = "delete from books where code= :code";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'code' => $code
        ));
    }
}