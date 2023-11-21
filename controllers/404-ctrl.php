<?php 
require_once __DIR__ . '/../helpers/init.php';


try {


} catch (\Throwable $th) {

    $errors = $th->getMessage();

    
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}



include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../404.php';
include __DIR__ . '/../views/templates/footer.php';