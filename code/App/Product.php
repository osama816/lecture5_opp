<?php

namespace App;

use PDO;

 class Product {
    private int $id;
    private int $quantity;
    private string $name;
    private float $price;
    private float $price_before_discount;

function __construct($id,$name,$price,$price_before_discount,$quantity) {
        $this->id=$id;
        $this->name=$name;
        $this->price=$price;
        $this->price_before_discount=$price_before_discount;
        $this->quantity=$quantity;
    }
    function get_id() : int {
        return $this->id;
    }
    function get_name() : string {
        return $this->name;
    }
    function price_before_discount() : float {
        return $this->price_before_discount;
    }
    function get_price() : float {
        return $this->price;
    }
    function get_quantity() : int {
        return $this->quantity;
    }
    static function create(PDO $conn,string $name ,float $price,float $price_before_discount,int $quantity):?Product  {
        $stmt=$conn->prepare("INSERT INTO products (name, price, price_before_discount, quantity)
        VALUE (:name , :price, :price_before_discount, :quantity) ");
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":price",$price);
        $stmt->bindParam(":price_before_discount",$price_before_discount);
        $stmt->bindParam(":quantity",$quantity);
        $success=$stmt->execute();
        if ($success) {
            $id=(int)$conn->lastInsertId();
            return new self($id,$name,$price, $price_before_discount,$quantity);
        }
        return null;
    }
    static function get_All( PDO $conn):array{
     $stmt=$conn->query("SELECT * FROM products");
     $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
     $products=[];
     foreach ($rows as $row) {
        $products[]=new Product($row['id'],$row['name'],$row['price'],$row['price_before_discount'],$row['quantity']);
     }
     return $products;
    }
    static function find_by_id( PDO $conn,int $id):?Product{
        $stmt=$conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Product($row['id'],$row['name'],$row['price'],$row['price_before_discount'],$row['quantity']);
        }
        return null;
    }

    
}

