<?php 
require_once __DIR__ . '/../../helpers/init.php';
require_once __DIR__ . '/../../models/Galleries.php';
// require_once __DIR__ . '/../models/Product.php';

try {




} catch (\Throwable $th) {

    $errors = $th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/templates/dashboardheader.php';
include __DIR__ . '/../../views/dashboard/dashboard_product.php';
include __DIR__ . '/../../views/templates/footer.php';