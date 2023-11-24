<?php
require_once __DIR__ . '/../../helpers/init.php';
require_once __DIR__ . '/../../models/Product.php';


try {
    $id_product = intval(filter_input(INPUT_GET, 'id_product', FILTER_SANITIZE_NUMBER_INT));
    $productobj = Product::get($id_product);


    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name_product = filter_input(INPUT_POST, 'name_product', FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($errors)) {
            $newProduct = new Product();
            $newProduct->set_name_product($name_product);
            $newProduct->set_price($price);
            $newProduct->set_description($description);
            $newProduct->set_id_product($id_product);
            $saved = $newProduct->update();
        }
        if ($saved) {
            header('location: /controllers/dashboard/dashboard_product_ctrl.php');
            FlashMessage::set('L\'enregistrement s\'est bien déroulée!', SUCCESS);
        } else {
            FlashMessage::set('L\'enregistrement s\'est mal passée!', ERROR);
        }
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();


    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/dashboard/dashboard_change_prod.php';
include __DIR__ . '/../../views/templates/footer.php';


