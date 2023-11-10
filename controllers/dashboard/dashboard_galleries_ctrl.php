<?php
require_once __DIR__ . '/../../config/regex.php';
require_once __DIR__ . '/../../config/constant.php';
require_once __DIR__ . '/../../models/Galleries.php';

try {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    $archive = filter_input(INPUT_GET, 'archive', FILTER_SANITIZE_NUMBER_INT);
    $id_galleries = intval(filter_input(INPUT_GET, 'id_galleries', FILTER_SANITIZE_NUMBER_INT));
    $images = Galleries::get_all_archived();
    $imageobj = Galleries::get($id_galleries);

    $errors = [];
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
                throw new Exception("Veuillez entrer un fichier valide ( soit .png, .jpg, .jpeg, .gif, .pdf, .webp)", 3);
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

        // archive 
        switch ($action) {
            case 'archive':
                $archived = (int) Galleries::archived($id_galleries);
                header('location: /controllers/dashboard/dashboard_galleries_ctrl.php?archive=' . $archived);
                die;
            case 'restor':
                $restor = (int) Galleries::restored($id_galleries);
                header('location: /controllers/dashboard/dashboard_galleries_ctrl.php?restor=' . $restored);
                die;
        }

        if (empty($errors)) {
            $newImage = new Galleries();
            $newImage->set_name_img($nameimg);
            $newImage->set_image($newnamefile);
            $saved = $newImage->insert();
        }
        if (empty($errors)) {
            $newImage = new Galleries();
            $newImage->set_name_img($nameimg);
            $newImage->set_image($newnamefile);
            $newImage->set_id_galleries($id_galleries);
            $saved = $newImage->update();
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
include __DIR__ . '/../../views/dashboard/dashboard_galleries.php';
include __DIR__ . '/../../views/templates/footer.php';
