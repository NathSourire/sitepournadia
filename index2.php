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

<body>
    <nav id="headNav" class="navbar navbar-expand-lg ">
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
                    <li class="nav-item"><a class="nav-link" href="#">Connection</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <h2>Votre identité</h2>
        <form id="form" enctype="multipart/form-data" method="post" novalidate>
            <fieldset class="container-fluid ident">
                <div class="row results my-5 row-gap-4">
                    <div class="">
                        <label class="form-label" for="email">E-mail *</label>
                        <input class="form-control" type="email" id="email" name="email" value="" required>
                        <p class="red">
                            <?= $errors['email'] ?? '' ?>
                        </p>
                    </div>
                    <div>
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
                </div    
                        
                
                <!-- <ol>
                <li><input type="text" placeholder="Nom"></li>
                <li><input type="text" placeholder="Prénom"></li>
                <li><input type="tel" placeholder="Téléphone"></li>
                <li><input type="email" placeholder="Adresse mail"></li>
                <li><textarea name="adresse" id="" cols="15" rows="5"></textarea></li>
                <li><input type="tel" placeholder="Code postal"></li>
                <li><input type="text" placeholder="Ville"></li>
                </ol>  -->
            </fieldset>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>