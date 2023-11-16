<?php 
require_once __DIR__ . '/../helpers/init.php';
require_once __DIR__ . '/../models/Product.php';

try {
    
    $id_galleries = intval(filter_input(INPUT_GET, 'id_galleries', FILTER_SANITIZE_NUMBER_INT));
    // $products = Product::get($id_product);
    // $products = Product::get_all();
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
include __DIR__ . '/../views/productSheet.php';
include __DIR__ . '/../views/templates/footer.php';