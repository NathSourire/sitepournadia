<?php
require_once __DIR__  . '/../../models/Users.php';
require_once __DIR__ . '/../../config/constant.php';
require_once __DIR__ . '/../../config/regex.php';


try {

    $dateNow = date('Y-m-d');
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $users = Users::get_all();
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $dateOfBirthday = filter_input(INPUT_POST, 'dateOfBirthday', FILTER_SANITIZE_NUMBER_INT);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);

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
            $newUser->set_password($password);
            $saved = $newUser->insert();
        }
    }

} catch (\Throwable $th) {

    $errors = $th->getMessage();
    var_dump($th);


    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}



include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/dashboard/dashboard_users.php';
include __DIR__ . '/../../views/templates/footer.php';
