<?php 
require_once __DIR__ . '/../../helpers/init.php';
require_once __DIR__ . '/../../models/Crafts.php';

try {
    $crafts = Craft::get_all();
    
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name_craft = filter_input(INPUT_POST, 'name_craft', FILTER_SANITIZE_SPECIAL_CHARS);
        $astuce = filter_input(INPUT_POST, 'astuce', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($errors)) {
            $newCrafts = new Craft();
            $newCrafts->set_name_craft($name_craft);
            $newCrafts->set_astuce($astuce);
            $saved = $newCrafts->insert();
            }

            if ($saved == true) {
                header('location: /controllers/dashboard/dashboard_add_craft-ctrl.php');
                FlashMessage::set('L\'enregistrement s\'est bien déroulée!', SUCCESS);
            } else {
                FlashMessage::set('L\'enregistrement s\'est mal passée!', ERROR);
            }
        }


    }  
catch (\Throwable $th) {

    $errors = $th->getMessage();

    
    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/dashboard/dashboard_add_craft.php';
include __DIR__ . '/../../views/templates/footer.php';