<?php
require_once __DIR__ . '/../../helpers/init.php';
require_once __DIR__ . '/../../models/Product.php';
require_once __DIR__ . '/../../models/Galleries.php';

try {
    $id_galleries = intval(filter_input(INPUT_GET, 'id_galleries', FILTER_SANITIZE_NUMBER_INT));
    // $id_product = intval(filter_input(INPUT_GET, 'id_product', FILTER_SANITIZE_NUMBER_INT));
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    $products = Galleries::get_all();
    $productobj = Galleries::get($id_galleries);

    $errors = [];

    // archive 
    switch ($action) {
        case 'archive':
            $archived = (int) Product::archived($id_product);
            header('location: /controllers/dashboard/dashboard_product_ctrl.php ?archive=' . $archived);
            die;
        case 'restor':
            $restor = (int) Product::restored($id_product);
            header('location: /controllers/dashboard/dashboard_product_ctrl.php ?restor=' . $restored);
            die;
    }

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name_product = filter_input(INPUT_POST, 'name_product', FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);


        if (empty($errors)) {
            $newProduct = new Product();
            $newProduct->set_name_product($name_product);
            $newProduct->set_price($price);
            $newProduct->set_description($description);
            $saved = $newProduct->insert();
        }
        if ($saved) {
            FlashMessage::set('L\'enregistrement s\'est bien déroulée!', SUCCESS);
        } else {
            FlashMessage::set('L\'enregistrement s\'est mal passée!', ERROR);
        }
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();



    include __DIR__ . '/../../views/templates/dashboardheader.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/templates/dashboardheader.php';
include __DIR__ . '/../../views/dashboard/dashboard_product.php';
include __DIR__ . '/../../views/templates/footer.php';
