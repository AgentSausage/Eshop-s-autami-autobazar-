<?php
include_once "functions.php";

use main\Produkt;

$obj = new Produkt();

$products = $obj->getProduct();

$obj ->printProduct($products);
