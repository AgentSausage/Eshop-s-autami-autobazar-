<?php
include_once "functions.php";

use main\Produkt;

$obj = new Produkt();

$products = $obj->getImage();

$obj ->printImage($products);
