<?php


class Book
{
    protected $name;
    protected $author;
    protected $publish;
    protected $version;
    protected $price;
    protected $image;
    protected $categoryID;
    protected $status;
    public function __construct($name,$author,$publish,$version,$price,$image,$categoryID,$status)
    {
        $this->name = $name;
        $this->author = $author;
        $this->publish = $publish;
        $this->version = $version;
        $this->price = $price;
        $this->image = $image;
        $this->categoryID = $categoryID;
        $this->status = $status;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setPublish($publish)
    {
        $this->publish = $publish;
    }

    public function getPublish()
    {
        return $this->publish;
    }

    public function setVersion($version): void
    {
        $this->version = $version;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setCategoryID($categoryID): void
    {
        $this->categoryID = $categoryID;
    }

    public function getCategoryID()
    {
        return $this->categoryID;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

}