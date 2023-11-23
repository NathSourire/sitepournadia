<?php 
require_once __DIR__ . '/../../helpers/init.php';
require_once __DIR__ . '/../../models/Crafts.php';

try {
    

}catch (\Throwable $th) {

    $errors = $th->getMessage();

    
    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/dashboard/dashboard_change_craft.php';
include __DIR__ . '/../../views/templates/footer.php';