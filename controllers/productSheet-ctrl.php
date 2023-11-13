<?php 
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../config/constant.php';
require_once __DIR__ . '/../models/Galleries.php';
require_once __DIR__ . '/../models/Product.php';

try {
    $products = Product::get_all();
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