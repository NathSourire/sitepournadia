<?php

require_once __DIR__ . '/../helpers/init.php';
require_once __DIR__ . '/../models/Users.php';


try {
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        $datas = filter_input_array(INPUT_POST, [
            "email" => FILTER_SANITIZE_EMAIL,
            "password" => FILTER_DEFAULT
        ]);

        try {
            $users = Users::getByEmail($datas["email"]);
            if (!$users) {
                throw new Exception("Echec d'authentification", 1);
            }
            $isOk = password_verify($datas["password"], $users->password);

            if (!$isOk) {
                throw new Exception("Echec d'authentification", 2);
            }

            if (is_null($users->confirmed_at)) {
                throw new Exception("Vous n'avez pas encore validé votre inscription", 3);
            }
            unset($users->password);
            $_SESSION['users'] = $users;
            header('location: /');
            die;
        } catch (\Throwable $th) {
            $errors["email"] = $th->getMessage();
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
include __DIR__ . '/../views/userSignIn.php';
include __DIR__ . '/../views/templates/footer.php';
