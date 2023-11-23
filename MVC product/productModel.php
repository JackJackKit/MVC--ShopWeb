<?php
require('dbconfig.php');

class Product {
    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct($id, $name, $description, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_description() {
        return $this->description;
    }

    public function get_price() {
        return $this->price;
    }
}

class ProductModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function get_product_list() {
        $query = "SELECT * FROM products";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["id"];
            $name = $row["name"];
            $description = $row["description"];
            $price = $row["price"];
            $product = new Product($id, $name, $description, $price);
            $products[] = $product;
        }

        return $products;
    }

    public function get_product_by_id($id) {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $id = $row["id"];
            $name = $row["name"];
            $description = $row["description"];
            $price = $row["price"];
            $product = new Product($id, $name, $description, $price);
            return $product;
        } else {
            return null;
        }
    }
}

// 建立資料庫連線
try {
    $db = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$productModel = new ProductModel($db);