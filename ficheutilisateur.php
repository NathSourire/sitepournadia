<?php
// recupération des page regex.php et constante.php
require './constante.php';
require './regex.php';
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
    $lastname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($firstname)) {
        $errors['firstname'] = 'Veuillez entrer un nom de famille ';
    } else {
        $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
        if (!$isOk) {
            $errors['firstname'] = 'Veuillez entrer un prénom valide';
        }
    }
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
    if (empty($civility)) {
        if ($civility != 1 && $civility != 2) {
            $errors['$civility'] = 'Veuillez entrer un genre valide';
        }
    }
    // récuperation de la date anniversaire nettoyage et validation
    $dateOfBirthday = filter_input(INPUT_POST, 'dateOfBirthday', FILTER_SANITIZE_NUMBER_INT);
    if (empty($dateOfBirthday)) {
        $errors['dateOfBirthday'] = 'Veuillez entrer une date de naissance';
    } else {
        $isOk = filter_var($dateOfBirthday, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_BIRTHDAY . '/']]);
        if (!$isOk) {
            $errors['dateOfBirthday'] = 'Veuillez entrer une date de naissance valide';
        }
    }
    //récuperation et nettoyage du message
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($message)) {
        if (strlen($message) > 500) {
            $errors['message'] = 'Veuillez entrer un message de moins de 500 caractéres';
        }
    }
    //récupération et nettoyage du nom de la ville
    $cities = filter_input(INPUT_POST, 'cities', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($cities)) {
        $errors['cities'] = 'Veuillez entrer un nom de famille ';
    } else {
        $isOk = filter_var($cities, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
        if (!$isOk) {
            $errors['cities'] = 'Veuillez entrer un prénom valide';
        }
    }
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

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="./public/assets/js/script2.js"></script>
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <title>Site Nad !</title>
</head>

<body class="container-fluid">
    <nav id="headNav" class="navbar sticky-top navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Produits</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Astuces</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Galerie</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">déconnection</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <h2>Votre identité</h2>
        <form id="form" enctype="multipart/form-data" method="post" novalidate>
            <fieldset class="container-fluid ident">
                <div class="row results my-5 row-gap-4">
                    <div>
                        <div>
                            <label class="form-label" for="civility1">Civilité :</label><br>
                            <input class="ms-5" type="radio" value="1" id="civility1" name="civility">Mr
                            <label class="form-label" for="civility2"></label><br>
                            <input class="ms-5" type="radio" value="2" id="civility2" name="civility">Mme
                            <p class="red">
                                <?= $errors['civility'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="lastnames">Nom *</label>
                            <input class="form-control" type="text" id="lastnames" name="lastname" pattern="<?= REGEX_NAME ?>" required>
                            <p class="red">
                                <?= $errors['lastname'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="firstnames">PréNom *</label>
                            <input class="form-control" type="text" id="firstnames" name="firstname" pattern="<?= REGEX_NAME ?>" required>
                            <p class="red">
                                <?= $errors['firstname'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="birthdaydate">Date de naissance *</label>
                            <input class="form-control" type="date" id="birthdaydate" name="dateOfBirthday" max="<?= $dateNow ?>" required>
                            <p class="red">
                                <?= $errors['dateOfBirthday'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="zipcode">Code postal</label>
                            <input class="form-control" type="text" id="zipcode" name="zipCode" pattern="<?= REGEX_POSTAL ?>">
                            <p class="red">
                                <?= $errors['zipCode'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="city">Ville</label>
                            <input class="form-control" type="text" id="city" name="cities" pattern="<?= REGEX_NAME ?>">
                            <p class="red">
                                <?= $errors['cities'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="tel">Téléphone *</label>
                            <input class="form-control" type="tel" id="tel" name="numbertel" pattern="<?= REGEX_TEL ?>" required>
                            <p class="red">
                                <?= $errors['numbertel'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="email">E-mail *</label>
                            <input class="form-control" type="email" id="email" name="email" value="" required>
                            <p class="red">
                                <?= $errors['email'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="passWord1">Mot de passe *</label>
                            <input class="form-control" id="passWord1" type="password" name="password1" pattern="<?= REGEX_PASSWORD ?>" required><br>
                            <p class="red">
                                <?= $errors['password1'] ?? '' ?>
                            </p>
                            <label class="form-label" for="passWord2">Vérification du mot de pass *</label>
                            <input class="form-control my-3" id="passWord2" type="password" name="password2" pattern="<?= REGEX_PASSWORD ?>" required>
                            <p>Le mot de passe doit contenir au moins 8 caractères, une lettre en majuscule, une lettre en minuscule, un chiffre et un caractère spécial.<br>
                                Les deux doivent être identique.</p>
                            <p class="red" id="passwordMessage"></p>
                        </div>
                        <div>
                            <label class="form-label" for="message">Votre message</label> <br>
                            <textarea name="message" id="message" cols="50" rows="10" maxlength="500" placeholder="Racontez une expérience avec la programmation et/ou l'informatique que vous auriez pu avoir."></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-outline-secondary my-3 ms-5">Envoie !</button>
                        </div>
                    </div>
                    <p class="ms-2">* Champ obligatoire</p>
                </div>
            </fieldset>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>