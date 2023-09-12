<?php 

// recupération des page regex.php et constante.php
require_once __DIR__ . '/../config/constant.php';
require_once __DIR__ . '/../config/regex.php';
// $currentdate = new DateTime();
// $currentdate -> format('Y-m-d');
$dateNow = date('Y-m-d');
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (empty($email)) {
        $errors['email'] = 'Veuillez entrer un email';
    } else {
        $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$isOk) {
            $errors['email'] = 'Veuillez entrer un email valide';
        }
    }
    // récuperation du mot de passe nettoyage et validation
    $password1 = filter_input(INPUT_POST, 'password1', FILTER_DEFAULT);
    $password2 = filter_input(INPUT_POST, 'password2', FILTER_DEFAULT);

    if (empty($password1)) {
        $errors['password1'] = 'Veuillez entrer un mot de passe';
    } elseif ($password1 !== $password2) {
        $errors['password1'] = 'Veuillez entrer des mots de passe identique';
    } else {
        $isOk = filter_var($password1, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_PASSWORD . '/']]);
        if (!$isOk) {
            $errors['password1'] = 'Veuillez entrer un mot de passe valide';
        }
        $password = password_hash($password1, PASSWORD_BCRYPT);
    }
    // récuperation du nom de famille nettoyage et validation
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($lastname)) {
        $errors['lastname'] = 'Veuillez entrer un nom de famille ';
    } else {
        $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
        if (!$isOk) {
            $errors['lastname'] = 'Veuillez entrer un nom de famille valide';
        }
    }
    // récuperation du prénom nettoyage et validation
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
    // if (empty($firstname)) {
    //     $errors['firstname'] = 'Veuillez entrer un nom de famille ';
    // } else {
        $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
        if (!$isOk) {
            $errors['firstname'] = 'Veuillez entrer un prénom valide';
        }
    // }
    // récuperation du code postale  nettoyage et validation
    $zipCode = filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_NUMBER_INT);
    if (empty($zipCode)) {
        $errors['zipCode'] = 'Veuillez entrer un code postal';
    } else {
        $isOk = filter_var($zipCode, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_POSTAL . '/']]);
        if (!$isOk) {
            $errors['zipCode'] = 'Veuillez entrer un code postale valide';
        }
    }
    // récuperation de la civilité nettoyage et validation
    $civility = filter_input(INPUT_POST, 'civility', FILTER_SANITIZE_NUMBER_INT);
    // if (empty($civility)) {
    //     if ($civility != 1 && $civility != 2) {
    //         $errors['$civility'] = 'Veuillez entrer un genre valide';
    //     }
    // }
    // récuperation de la date anniversaire nettoyage et validation
    $dateOfBirthday = filter_input(INPUT_POST, 'dateOfBirthday', FILTER_SANITIZE_NUMBER_INT);
    // if (empty($dateOfBirthday)) {
    //     $errors['dateOfBirthday'] = 'Veuillez entrer une date de naissance';
    // } else {
        $isOk = filter_var($dateOfBirthday, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_BIRTHDAY . '/']]);
        if (!$isOk) {
            $errors['dateOfBirthday'] = 'Veuillez entrer une date de naissance valide';
        }
    // }
    //récuperation et nettoyage du message
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($message)) {
        if (strlen($message) > 500) {
            $errors['message'] = 'Veuillez entrer un message de moins de 500 caractéres';
        }
    }
    //récupération et nettoyage du nom de la ville
    $cities = filter_input(INPUT_POST, 'cities', FILTER_SANITIZE_SPECIAL_CHARS);
    // if (empty($cities)) {
    //     $errors['cities'] = 'Veuillez entrer un nom de ville ';
    // } else {
        $isOk = filter_var($cities, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
        if (!$isOk) {
            $errors['cities'] = 'Veuillez entrer un prénom valide';
        }
    // }
    $numbertel = filter_input(INPUT_POST, 'numbertel', FILTER_SANITIZE_NUMBER_INT);
    if (empty($numbertel)) {
        $errors['numbertel'] = 'Veuillez entrer un numéro de téléphone';
    } else {
        $isOk = filter_var($numbertel, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_TEL . '/']]);
        if (!$isOk) {
            $errors['numbertel'] = 'Veuillez entrer un numéro de téléphone valide';
        }
    }
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/userSheet.php';
include __DIR__ . '/../views/templates/footer.php';