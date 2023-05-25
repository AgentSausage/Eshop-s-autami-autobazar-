<?php

namespace main;

use \PDO;

class Produkt
{

    private string $hostname = "localhost";
    private int $port = 3306;
    private string $username = "root";
    private string $password = "";
    private string $dbName = "motor";

    private $connection;

    public function __construct(string $host = "", int $port = 3306, string $user = "", string $pass = "", string $dbName = "")
    {
        if (!empty($host)) {
            $this->hostname = $host;
        }

        if (!empty($port)) {
            $this->port = $port;
        }

        if (!empty($user)) {
            $this->username = $user;
        }

        if (!empty($pass)) {
            $this->password = $pass;
        }

        if (!empty($dbName)) {
            $this->dbName = $dbName;
        }

        try {
            $this->connection = new PDO("mysql:charset=utf8;host=" . $this->hostname . ";dbname=" . $this->dbName . ";port=" . $this->port, $this->username, $this->password);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            die();
        }
    }

    public function getProduct(): array
    {
        $products = [];

        $sql = "SELECT * FROM product";
        $query = $this->connection->query($sql);
        $pItems = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($pItems as $pItem) {
            $products[$pItem['id']] = [
                'img' => $pItem['img'],
                'price' => $pItem['price'],
                'name' => $pItem['name'],
                'id' => $pItem['id']
            ];
        }
        return $products;
    }

    public function getProductItem(int $id): array
    {
        try {
            $sql = "SELECT * FROM product WHERE id = " . $id;
            $query = $this->connection->query($sql);
            $data = $query->fetch(PDO::FETCH_ASSOC);

            return $data;
        } catch (\Exception $exception) {
            return [];
        }
    }

    public function printProduct(array $products)
    {
        foreach ($products as $key => $pItem) {
            echo '<div class="tm-item-container" >
                     <img src='.$pItem['img'].' alt="Image" width="200" height="140">
                     <p class="tm-item-description">'.$pItem['name'].'</p><hr>
                         <div class="tm-item-price-container">
                           <span class="tm-item-price">$ '.$pItem['price'].'</span>
                           <a href="detail.php?img='.$pItem['img'].'&name='.$pItem['name'].
                    '&price='.$pItem['price'].'&layout=0'.'" class="tm-item-link">
                             <span class="tm-item-action">Details</span>
                             <img src="img/plus.png" class="tm-item-add-icon" alt="Image">
                           </a>
                         </div>
                     </div>';
        }
    }

    public function insertProduct(string $name, string $image, string $price): bool
    {
        $insert = false;
        $sql = "INSERT INTO product(name, img, price) VALUES ('".$name."', '".$image."', '".$price."')";
        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();
        } catch (\Exception $e) {
            echo "Unable to insert value. Error: " . $e->getMessage();
        }

        return $insert;
    }

    public function updateProduct(int $id, string $name, string $image, int $price): bool
    {
        try {
            $sql = "UPDATE product SET name = '".$name."', img = '".$image."', price = '".$price."' WHERE id =".$id;
            $statement = $this->connection->prepare($sql);
            $update = $statement->execute();
        } catch (\Exception $e) {
            $update = false;
        }

        return $update;

    }

    public function deleteProduct(int $id): bool
    {
        $delete = false;
        $sql = "DELETE FROM product WHERE id = ".$id;

        try {
            $statement = $this->connection->prepare($sql);
            $delete = $statement->execute();
        } catch (\Exception $exception) {
            echo "Unable to delete value. Error: " . $exception->getMessage();
        }

        return $delete;

    }

    public function getImage(): array
    {
        $images = [];

        $sql = "SELECT * FROM upload";
        $query = $this->connection->query($sql);
        $imgItems = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($imgItems as $imgItem) {
            $images[$imgItem['id']] = [
                'imagename' => $imgItem['imagename'],
                'id' => $imgItem['id']
            ];
        }
        return $images;
    }

    public function insertImage(string $name): bool
    {
        $insert = false;
        $sql = "INSERT INTO upload(imagename) VALUE ('".$name."')";
        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();
        } catch (\Exception $e) {
            echo "Unable to insert value. Error: " . $e->getMessage();
        }

        return $insert;
    }

    public function deleteImage(int $id): bool
    {
        $delete = false;
        $sql = "DELETE FROM upload WHERE id = ".$id;

        try {
            $statement = $this->connection->prepare($sql);
            $delete = $statement->execute();
        } catch (\Exception $exception) {
            echo "Unable to delete value. Error: " . $exception->getMessage();
        }

        return $delete;

    }

    public function updateImage(int $id, string $name): bool
    {
        try {
            $sql = 'UPDATE upload SET imagename = "'.$name.'" WHERE id='.$id;
            $statement = $this->connection->prepare($sql);
            $update = $statement->execute();
        } catch (\Exception $e) {
            $update = false;
        }

        return $update;

    }

    public function getImageItem(int $id): array
    {
        try {
            $sql = "SELECT * FROM upload WHERE id = " . $id;
            $query = $this->connection->query($sql);
            $data = $query->fetch(PDO::FETCH_ASSOC);

            return $data;
        } catch (\Exception $exception) {
            return [];
        }
    }

    public function printImage(array $images)
    {
        foreach ($images as $key => $imgItem) {
            echo '<div class="tm-item-container">
            <img src="img/'.$imgItem['imagename'].'" alt="Image" width="215" height="208">
            <div class="tm-item-price-container tm-gallery-item-info">
              <span class="tm-item-price">'.$imgItem['imagename'].'</span>
            </div>
          </div>';
        }
    }
}