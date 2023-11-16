<?php
require_once __DIR__  . '/../../models/Users.php';
require_once __DIR__ . '/../../helpers/init.php';



try {

    $dateNow = date('Y-m-d');
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    // permet d'afficher sur la liste si bien supprimer
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
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
    switch ($action) {
            // case 'archive':
            //     $archived = (int) Vehicle::archived($id_vehicles);
            //     header('location: /controllers/dashboard/vehicle/list_vehicle_ctrl.php?archive='.$archived);
            //     die;
            // case 'restor':
            //     $restor = (int) Vehicle::restored($id_vehicles);
            //     header('location: /controllers/dashboard/vehicle/list_vehicle_ctrl.php?restor='.$restored);
            //     die; 
        case 'delete':
            $isDeleted = (int) Users::delete($id_user);
            if ($isDeleted) {
                FlashMessage::set('La suppression s\'est bien déroulée!', SUCCESS); 
            } else {
                FlashMessage::set('La suppression s\'est mal passée!', ERROR); 
            }
    }
    
} catch (\Throwable $th) {

    $errors = $th->getMessage();


    include __DIR__ . '/../../views/templates/dashboardheader.php.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}



include __DIR__ . '/../../views/templates/dashboardheader.php';
include __DIR__ . '/../../views/dashboard/dashboard_users.php';
include __DIR__ . '/../../views/templates/footer.php';
