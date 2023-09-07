<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="./public/assets/js/script1.js"></script>
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title>Fiche produit</title>
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
            </div>
        </div>
    </nav>
    <div class="productsheet row">
        <div class="text-center fs-2" id="productname">
            <p>Nom du produit</p>
        </div>
        <div class="imgtext my-5 row">
            <img class="col-5 ms-5" src="./public/assets/img/Babarhum.jpg " alt="">
            <p class="col-5 ms-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam aperiam amet suscipit laudantium vel.
                Consequatur deserunt id voluptate error corporis? Adipisci culpa consequatur ratione quaerat labore
                fugit nihil ipsam perspiciatis?
            </p>
        </div>
        <form class="row " id="productform" enctype="multipart/form-data" method="post" novalidate>
            <div>
                <label class="form-label ms-3" for="price">Prix</label>
                <input class="form-control ms-3" type="text" name="priCe" id="price" value="somme" readonly>
            </div>

            <div>
                <label class="form-label ms-3 my-3 " for="quantity">Quantité</label>
                <input class="form-control ms-3" type="number" name="quanTity" id="quantity">
            </div>
            <div>
                <button class="btn btn-outline-danger my-3 ms-3" type="submit">Validation</button>
            </div>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>