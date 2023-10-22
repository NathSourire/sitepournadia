<?php

require_once __DIR__ . '/../config/constant.php';
require_once __DIR__ . '/../config/regex.php';


try {

    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $email1 = filter_input(INPUT_POST, 'email1', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $errors['email1'] = 'Veuillez entrer un email';
        }
        // récuperation du mot de passe nettoyage et validation
        $password3 = filter_input(INPUT_POST, 'password3', FILTER_DEFAULT);
        if (empty($password3)) {
            $errors['password3'] = 'Veuillez entrer un mot de passe';
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
include __DIR__ . '/../views/userSignUp.php';
include __DIR__ . '/../views/templates/footer.php';
