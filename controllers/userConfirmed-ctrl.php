<?php

require_once __DIR__ . '/../helpers/init.php';
require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../helpers/JWT.php';


try {
    $errors = [];

    $jwt = filter_input(INPUT_GET, 'jwt');
    
    $payload = JWT::get($jwt);
    
    if(!$payload){
        throw new Exception("Lien non valide ou expiré!", 1);
    }
    $id_user = $payload->id_user;
    
    $user = Users::get($id_user);
    if (!$user) {
        throw new Exception("Ce compte n'existe pas", 2);
    }
    if (!is_null($user->confirmed_at)) {
        throw new Exception("Vous avez déjà confirmé votre inscription", 3);
    }

    $isConfirmed = Users::confirmSignUp($id_user);
    if(!$isConfirmed){
        throw new Exception("Problème lors de la validation de votre inscription", 4);
    }
    $messageConf = "Votre inscription est confirmée";

} catch (\Throwable $th) {

    $errors = $th->getMessage();


    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/userConfirmed.php';
include __DIR__ . '/../views/templates/footer.php';




