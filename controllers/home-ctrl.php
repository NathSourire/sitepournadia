<?php 
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../config/constant.php';
require_once __DIR__ . '/../models/Galleries.php';

try {
    $images = Galleries::get_all();

    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    
    }
} catch (\Throwable $th) {

    $errors = $th->getMessage();

    
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}



include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';