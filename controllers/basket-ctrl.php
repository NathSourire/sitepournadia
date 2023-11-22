<?php 
require_once __DIR__ . '/../helpers/init.php';
require_once __DIR__ . '/../models/Product.php';

try {
    $id_product = intval(filter_input(INPUT_GET, 'id_product', FILTER_SANITIZE_NUMBER_INT));
    $products = Product::get($id_product);
    $errors = [];


    }
catch (\Throwable $th) {

    $errors = $th->getMessage();

    
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/basket.php';
include __DIR__ . '/../views/templates/footer.php';