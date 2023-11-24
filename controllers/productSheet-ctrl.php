<?php
require_once __DIR__ . '/../helpers/init.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Galleries.php';

try {
    $id_galleries = intval(filter_input(INPUT_GET, 'id_galleries', FILTER_SANITIZE_NUMBER_INT));
    $id_product = intval(filter_input(INPUT_GET, 'id_product', FILTER_SANITIZE_NUMBER_INT));
    $product = Product::get($id_product);
    $images = Galleries::get($id_galleries);
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_SPECIAL_CHARS);
            // récuperation du pays de naissance nettoyage et validation
    $quantity = filter_input(INPUT_POST, 'quantity');
    if (!in_array($quantity, QUANTITY )) {
        //ou if (in_array($nativeCountry,$nativeCountryList) == false){}
        // ou if (!array_key_exists($nativeCountry, NATIVECOUNTRY)) {
        $errors['quantity'] = 'Veuillez entrer une quantité valide';
    }
    
    }
} catch (\Throwable $th) {

    $errors = $th->getMessage();


    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/productSheet.php';
include __DIR__ . '/../views/templates/footer.php';
