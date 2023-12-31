<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/assets/img/iconsfav.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="/public/assets/js/script1.js"></script>
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title>Site Nadia !</title>
</head>

<body class="container-fluide">
    <nav id="headNav" class="navbar sticky-top navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/controllers/home-ctrl.php">
                <img class="logonav" src="/public/assets/img/Logo.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="/controllers/gallery-ctrl.php">Galerie</a></li>
                    <li class="nav-item"><a class="nav-link <?= (isset($_SESSION['users']) ? 'd-block' : 'd-none') ?>" aria-current="page" href="/controllers/crafts-ctrl.php">Astuces</a></li>
                    <li class="nav-item"><a class="nav-link <?= (isset($_SESSION['users']) ? 'd-block' : 'd-none') ?>" aria-current="page" href="/controllers/userSheet-ctrl.php">Mon compte</a></li>
                    <li class="nav-item"><a class="nav-link <?= (isset($_SESSION['users']) ? 'd-none' : 'd-block') ?>" aria-current="page" href="/controllers/userSignIn-ctrl.php">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link <?= (isset($_SESSION['users']) ? 'd-none' : 'd-block') ?>" aria-current="page" href="/controllers/userSignUp-ctrl.php">Inscription</a></li>
                    <li class="nav-item"><a class="nav-link <?= (isset($_SESSION['users']) ? 'd-block' : 'd-none') ?>" aria-current="page" href="/controllers/userSignOut-ctrl.php">Deconnexion</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="/controllers/basket-ctrl.php"><img src="/public/assets/img/basket.png" alt=""></a></li>
                    <?php
                    // Vérifiez si l'utilisateur est connecté
                    if (isset($_SESSION['users'])) {
                        // Vérifiez le rôle de l'utilisateur (supposons que le rôle est stocké dans la clé 'id_role')
                        $userRole = $_SESSION['users']->role_management;
                        // Affichez le bouton Dashboard si le rôle est égal à 1
                        if ($userRole == 1) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dashboard
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="dropdown-item" href="/controllers/dashboard/dashboard_product_ctrl.php">Fiches Produits</a></li>
                                    <li class="nav-item"><a class="dropdown-item" href="/controllers/dashboard/dashboard_galleries_ctrl.php">Illustration</a></li>
                                    <li class="nav-item"><a class="dropdown-item" href="/controllers/dashboard/dashboard_users_ctrl.php">Utilisateurs</a></li>
                                    <li class="nav-item"><a class="dropdown-item" href="/controllers/dashboard/dashboard_add_craft-ctrl.php">Astuces</a></li>
                                </ul>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>

    <div>
        <?php
        FlashMessage::display();
        ?>
    </div>