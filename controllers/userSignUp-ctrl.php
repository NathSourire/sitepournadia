<?php
require_once __DIR__  . '/../models/Users.php';
require_once __DIR__ . '/../helpers/init.php';
require_once __DIR__ . '/../helpers/JWT.php';

try {

    $dateNow = date('Y-m-d');
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $userObj = Users::get($id_user);
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        // $role_management = filter_input(INPUT_POST, 'role_management', FILTER_SANITIZE_NUMBER_INT);
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
        if (empty($firstname)) {
            $errors['firstname'] = 'Veuillez entrer un nom de famille ';
        } else {
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
            if (!$isOk) {
                $errors['firstname'] = 'Veuillez entrer un prénom valide';
            }
        }
        // récuperation de la date anniversaire nettoyage et validation
        $dateOfBirthday = filter_input(INPUT_POST, 'dateOfBirthday', FILTER_SANITIZE_NUMBER_INT);
        $isOk = filter_var($dateOfBirthday, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_BIRTHDAY . '/']]);
        if (!$isOk) {
            $errors['dateOfBirthday'] = 'Veuillez entrer une date de naissance valide';
        }
        //récuperation et nettoyage du message
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($message)) {
            if (strlen($message) > 500) {
                $errors['message'] = 'Veuillez entrer un message de moins de 500 caractéres';
            }
        }

        // récuperation du code postale  nettoyage et validation
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
        if (empty($zipcode)) {
            $errors['zipcode'] = 'Veuillez entrer un code postal';
        }

        // récuperation du pays de naissance nettoyage et validation
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($city)) {
            $errors['city'] = 'Veuillez choisir un nom de ville';
        }

        //récuperation et nettoyage du numero de telephone
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($phone)) {
            $errors['phone'] = 'Veuillez entrer un numéro de téléphone';
        } else {
            $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_TEL . '/']]);
            if (!$isOk) {
                $errors['phone'] = 'Veuillez entrer un numéro de téléphone valide';
            }
        }
        
        if (Users::isExist($email)){
            $errors['email'] = 'Cette adresse mail existe déjà!';
            header('location: /');
            die;
        }

        if (empty($errors)) {
            $pdo = Database::connect();
            $newUser = new Users();
            $newUser->set_lastname($lastname);
            $newUser->set_firstname($firstname);
            $newUser->set_date_of_birthday($dateOfBirthday);
            $newUser->set_zipcode($zipcode);
            $newUser->set_city($city);
            $newUser->set_phone($phone);
            $newUser->set_email($email);
            $newUser->set_message($message);
            $newUser->set_password($password);
            $isUserSaved = $newUser->insert();
            $id_user = $pdo->lastInsertId();
            if ($isUserSaved == true) {
                header('location: /controllers/userSignIn-ctrl.php');
                die;
            }

            if ($isUserSaved) {
                //envoi de mail
                $payload = (object) ['id_user' => $id_user];
                $jwt = JWT::create($payload);
                $to = $email;
                $subject = 'Confirmation de votre inscription!';
                $link = HOST . '/controllers/userConfirmed-ctrl.php?jwt=' . $jwt;
                $messages = '<p>
                            Veuillez cliquer sur ce lien pour valider votre inscription.<br>
                            <a href="' . $link . '">Confirmation</a>
                            </p>';
                mail($to, $subject, $messages);
                $messages  = '<p>
                Votre inscription est prise en compte. veuillez vérifier vos emails
                </p>';
            } else {
                throw new Exception("Erreur lors de votre inscription:");
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
include __DIR__ . '/../views/userSignUp.php';
include __DIR__ . '/../views/templates/footer.php';
