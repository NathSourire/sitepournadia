<?php
require_once __DIR__  . '/../helpers/init.php';
require_once __DIR__ . '/../models/Users.php';



try {

    if (($_SESSION) == []) {
        header('location: /controllers/userSignIn-ctrl.php');
        die;
    }

    $dateNow = date('Y-m-d');
    $id_user = $_SESSION['users']->id_user;
    $userObj = Users::get($id_user);
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $role_management = filter_input(INPUT_POST, 'role_management', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $dateOfBirthday = filter_input(INPUT_POST, 'dateOfBirthday', FILTER_SANITIZE_NUMBER_INT);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
        // récuperation du mot de passe nettoyage et validation
        $password1 = filter_input(INPUT_POST, 'password1', FILTER_DEFAULT);
        $password2 = filter_input(INPUT_POST, 'password2', FILTER_DEFAULT);
        if ($password1 !== $password2) {
            $errors['password1'] = 'Veuillez entrer des mots de passe identique';
        } else {
            $password = password_hash($password1, PASSWORD_BCRYPT);
        }

        if (empty($errors)) {
            $newUser = new Users();
            $newUser->set_lastname($lastname);
            $newUser->set_firstname($firstname);
            $newUser->set_date_of_birthday($dateOfBirthday);
            $newUser->set_zipcode($zipcode);
            $newUser->set_city($city);
            $newUser->set_phone($phone);
            $newUser->set_email($email);
            $newUser->set_message($message);
            if (empty($password1 && $password2)) {
                // Si le champ est vide, on conserve l'ancien mot de passe
                $getPassword = $userObj->password;
                $newUser->set_password($getPassword);
            } else {
                // Si le champ n'est pas vide, on met à jour le mot de passe avec la nouvelle donnée
                $newUser->set_password($password);
            }
            $newUser->set_id_user($id_user);
            $saved = $newUser->update();
            if ($saved == true) {
                header('location: /controllers/userSignIn-ctrl.php');
                die;
            }
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
include __DIR__ . '/../views/userSheet.php';
include __DIR__ . '/../views/templates/footer.php';
