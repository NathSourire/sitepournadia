<?php 
require_once __DIR__ . '/../helpers/init.php';
require_once __DIR__ . '/../models/Crafts.php';

try {
    $crafts = Craft::get_all();

    }
catch (\Throwable $th) {

    $errors = $th->getMessage();

    
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/crafts.php';
include __DIR__ . '/../views/templates/footer.php';