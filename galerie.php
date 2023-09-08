<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="./public/assets/js/script1.js"></script>
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <title>Galerie</title>
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
                    <li class="nav-item"><a class="nav-link" href="#">Panier</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Mon compte</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Connection</a></li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>


        </div>
    </nav>

    <div class="gallery">
        <div class="row row-cols-1 row-cols-md-4 gap-5 d-flex justify-content-center my-5">
            <div class="card col">
                <img class=" img-fluid" src="./public/assets/img/Gateauchocolat.jpg" alt="Gateau au chocolat">
                <h5 class="card-title my-3">Card title</h5>
            </div>
            <div class="card col">
                <img class=" img-fluid" src="./public/assets/img/Cakeorange.jpg" alt="Cake à orange">
                <h5 class="card-title my-3">Card title</h5>
            </div>
            <div class="card col">
                <img class=" img-fluid" src="./public/assets/img/Tartecitronmeringué.jpg" alt="Tarte au citron meringué">
                <h5 class="card-title my-3">Card title</h5>
            </div>
            <div class="card col">
                <img class=" img-fluid" src="./public/assets/img/Tartecitronmeringué.jpg" alt="Tarte au citron meringué">
                <h5 class="card-title my-3">Card title</h5>
            </div>
            <div class="card col">
                <img class=" img-fluid" src="./public/assets/img/Cakeorange.jpg" alt="Cake à orange">
                <h5 class="card-title my-3">Card title</h5>
            </div>
            <div class="card col">
                <img class=" img-fluid" src="./public/assets/img/Gateauchocolat.jpg" alt="Gateau au chocolat">
                <h5 class="card-title my-3">Card title</h5>
            </div>
            <div class="card col">
                <img class=" img-fluid" src="./public/assets/img/Tartecitronmeringué.jpg" alt="Tarte au citron meringué">
                <h5 class="card-title my-3">Card title</h5>
            </div>
            <div class="card col">
                <img class=" img-fluid" src="./public/assets/img/Cakeorange.jpg" alt="Cake à orange">
                <h5 class="card-title my-3">Card title</h5>
            </div>
            <div class="card col">
                <img class=" img-fluid" src="./public/assets/img/Gateauchocolat.jpg" alt="Gateau au chocolat">
                <h5 class="card-title my-3">Card title</h5>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>