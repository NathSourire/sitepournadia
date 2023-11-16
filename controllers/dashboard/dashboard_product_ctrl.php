<?php
require_once __DIR__ . '/../../helpers/init.php';
require_once __DIR__ . '/../../models/Product.php';

try {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    $id_product = intval(filter_input(INPUT_GET, 'id_product', FILTER_SANITIZE_NUMBER_INT));
    $products = Product::get_all();
    $productobj = Product::get($id_product);
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
        $nameimg = filter_input(INPUT_POST, 'nameimg', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($nameimg)) {
            $errors['nameimg'] = 'Veuillez entrer un nom pour l\'image ';
        } else {
            $isOk = filter_var($nameimg, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
            if (!$isOk) {
                $errors['nameimg'] = 'Veuillez entrer un nom d\'image correct';
            }
        }



        // if (empty($errors)) {
        //     $newProduct = new Product();
        //     $newProduct->set_name_product($name_product);
        //     $newProduct->set_price($price);
        //     $newProduct->set_description($description);
        //     $newProduct->set_id_galleries($id_galleries);
        //     $saved = $newProduct->insert();
        // }
        // if (empty($errors)) {
        //     $newProduct = new Product();
        //     $newProduct->set_name_product($name_product);
        //     $newProduct->set_price($price);
        //     $newProduct->set_description($description);
        //     $newProduct->set_id_galleries($id_galleries);
        //     $saved = $newProduct->update();
        // }
    
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();
    dd($th);


    include __DIR__ . '/../../views/templates/dashboardheader.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/templates/dashboardheader.php';
include __DIR__ . '/../../views/dashboard/dashboard_product.php';
include __DIR__ . '/../../views/templates/footer.php';
