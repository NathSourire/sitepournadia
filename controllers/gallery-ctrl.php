<?php 
require_once __DIR__ . '/../helpers/init.php';
require_once __DIR__ . '/../models/Galleries.php';

try {
    $images = Galleries::get_all();
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
include __DIR__ . '/../views/gallery.php';
include __DIR__ . '/../views/templates/footer.php';