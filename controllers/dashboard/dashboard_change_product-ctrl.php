<?php
require_once __DIR__ . '/../../helpers/init.php';
require_once __DIR__ . '/../../models/Product.php';
require_once __DIR__ . '/../../models/Galleries.php';

try {

    $id_product = intval(filter_input(INPUT_GET, 'id_product', FILTER_SANITIZE_NUMBER_INT));
    $products = Product::get_all();
    $productobj = Product::get($id_product);
    $id_galleries = intval(filter_input(INPUT_GET, 'id_galleries', FILTER_SANITIZE_NUMBER_INT));
    $images = Galleries::get_all_archived();
    $imageobj = Galleries::get($id_galleries);

    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        
        $name_product = filter_input(INPUT_POST, 'name_product', FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $nameimg = filter_input(INPUT_POST, 'nameimg', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($nameimg)) {
            $errors['nameimg'] = 'Veuillez entrer un nom pour l\'image ';
        } else {
            $isOk = filter_var($nameimg, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
            if (!$isOk) {
                $errors['nameimg'] = 'Veuillez entrer un nom d\'image correct';
            }
        }
        //récuperation du ficher recu nettoyage et validation
        try {
            $picture = $_FILES['picture'];
            if (empty($picture['name'])) {
                throw new Exception("Veuillez entrer un fichier", 1);
            }
            if ($picture['error'] > 0) {
                throw new Exception("Fichier non envoyé", 2);
            }
            if (!in_array($picture['type'], EXTENSION)) {
                throw new Exception("Veuillez entrer un fichier valide ( soit .png, .jpeg, .webp)", 3);
            }
            if ($picture['size'] > FILESIZE) {
                throw new Exception('Veuillez entrer un fichier avec une taille inferieur', 4);
            }
            $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
            $newnamefile = uniqid('img_') . '.' . $extension;
            $from = $picture['tmp_name'];
            $to = __DIR__ . '/../../public/uploads/image/' . $newnamefile;
            move_uploaded_file($from, $to);

        } catch (\Throwable $th) {
            $errors['picture'] = $th->getMessage();
        }

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
            FlashMessage::set('La modification s\'est bien déroulée!', SUCCESS);
        } else {
            FlashMessage::set('La modification s\'est mal passée!', ERROR);
        }

        if (empty($errors)) {
            $newImage = new Galleries();
            $newImage->set_name_img($nameimg);
            $newImage->set_image($newnamefile);
            $newImage->set_id_product($id_product);
            $saved = $newImage->insert();
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
include __DIR__ . '/../../views/dashboard/dashboard_change_product.php';
include __DIR__ . '/../../views/templates/footer.php';
