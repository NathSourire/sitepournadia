<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="./public/assets/js/script1.js"></script>
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <title>Site Nadia !</title>
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
                    <li class="nav-item"><a class="nav-link" href="#">panier</a></li>
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
    <div class="imgBackground opacity-75 row p-5">
        <img src="./public/assets/img/legume_page_accueil.jpg" alt="Legume page d'accueil">
        <p>je teste du texte sur mon image</p>
    </div>
    <div id="nadHistory" class="container-fluid">
        <div class="row align-items-center mt-2 p-1">
            <div class="col-12 col-md-6 "><img class="w-100" src="./public/assets/img/photoaremplacer.jpg" alt="Photo de Nad"></div>
            <div class="col-12 col-md-6">
                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente rem deserunt
                    nesciunt iure doloribus dolorum ex, architecto similique dolor provident itaque esse. Soluta esse
                    commodi, voluptatibus quas
                    sapiente modi aliquam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt iste
                    obcaecati debitis unde aut
                    esse nisi, eius temporibus ullam cum cumque! Sint cumque sit illo similique asperiores, numquam
                    ullam aut!
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente libero incidunt temporibus fugiat
                    iure nam ipsa suscipit molestias? Iusto maiores molestias asperiores aperiam ad modi quos magni
                    omnis
                    distinctio sapiente! Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati eveniet
                    maiores blanditiis ea
                    distinctio ipsa et deleniti? Accusamus unde eaque nihil, quod totam voluptas optio debitis quia
                    aliquam, dolore
                    quos.</p>
            </div>
        </div>
    </div>
    <h2 class="text-center my-5" >Produit du moment</h2>
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./public/assets/img/Cakeorange.jpg" class="d-block w-100" alt="Cake à orange">
            </div>
            <div class="carousel-item">
                <img src="./public/assets/img/Tartecitronmeringué.jpg" class="d-block w-100" alt="Tarte au citron meringué">
            </div>
            <div class="carousel-item">
                <img src="./public/assets/img/Gateauchocolat.jpg" class="d-block w-100" alt="Gateau au chocolat">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <footer>
        <p>bla bla bla</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>