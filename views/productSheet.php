<div id="productsheet" class="container ">
    <div class="row align-items-center mb-5 mt-5">
        <div class="col-12 col-md-6 "><img class="w-100" src="/public/uploads/image/<?= $images->image ?>" alt="<?= $images->name_img ?>"></div>
        <div class="col-8 col-md-5 ms-5">
            <h3 class="mt-5 mb-3 "><?= $product->name_product ?></h3>
            <p class="text-justify"><?= nl2br(html_entity_decode($product->description))  ?></p>
            <form class="row" id="productform" enctype="multipart/form-data" method="post">
                <div>
                <?php
                    // Vérifiez si l'utilisateur est connecté
                    if (isset($_SESSION['users'])) {
                        // Vérifiez le rôle de l'utilisateur (supposons que le rôle est stocké dans la clé 'id_role')
                        $userRole = $_SESSION['users'];?>
                    <div>
                        <p><?= $product->price ?></p>
                    </div>
                    <label class="form-label ms-3 my-3 " for="quantity">Quantité</label>
                    <select class="form-label ms-3 my-3 " id="quantity" name="quantity">
                            <option selected disabled>0</option>
                            <?php
                            foreach (QUANTITY as $key => $value) { ?>
                                <option>
                                    <?= $value ?>
                                </option>
                            <?php } ?>
                        </select>
                        <p class="red">
                            <?= $errors['nativeCountry'] ?? '' ?>
                        </p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success my-3 ms-3" type="submit">Ajout au panier</button>
                    </div>
                </div>
                <?php
                        }
                    ?>
            </form>
        </div>
    </div>
</div>
