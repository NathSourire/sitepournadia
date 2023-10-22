<?php 
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../config/constant.php';
require_once __DIR__ . '/../models/Galleries.php';

try {
    $images = Galleries::get_all();

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
        throw new Exception ('Veuillez entrer un fichier avec une taille inferieur', 4);
    }
    $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
    $newnamefile = uniqid('img_') . '.' . $extension;
    $from = $picture['tmp_name'];
    $to = __DIR__ . '/../public/uploads/image/' . $newnamefile;
    move_uploaded_file($from, $to);
            
    } catch (\Throwable $th) {
        $errors ['picture']= $th->getMessage();
    }

    if (empty($errors)) {
        $newImage = new Galleries();
        $newImage->set_name_img($nameimg);
        $newImage->set_image($newnamefile);
        $saved = $newImage->insert();
    }
    
    }
} catch (\Throwable $th) {

    $errors = $th->getMessage();

    
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/gallery.php';
include __DIR__ . '/../views/templates/footer.php';