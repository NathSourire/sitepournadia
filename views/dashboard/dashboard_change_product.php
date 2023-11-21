<div class="container">
    <div class="productsheet row">
        <form class="row " id="productform" enctype="multipart/form-data" method="post" novalidate>
            <div class="offset-1 offset-md-1 col-10 col-md-10">
                <div>
                    <label class="form-label form-control-lg my-3" for="name_product">Nom du produit</label>
                    <input class="form-control form-control-lg" type="text" name="name_product" id="name_product" value="<?= isset($productobj->name_product) ? htmlspecialchars($productobj->name_product) : '' ?>">
                </div>
                <div class="imgtext my-5 row">
                    <textarea class="form-label form-control-lg my-3 " name="description" id="description" cols="50" rows="10" value="<?= isset($productobj->description) ? htmlspecialchars($productobj->description) : '' ?>"><?= isset($productobj->description) ? htmlspecialchars($productobj->description) : '' ?></textarea>
                    <label class="form-label " for="description"></label> <br>
                </div>
                <div>
                    <label class="form-label form-control-lg" for="price">Prix</label>
                    <input class="form-control form-control-lg" type="text" name="price" id="price" value="<?= isset($productobj->price) ? htmlspecialchars($productobj->price) : '' ?>">
                </div>
            </div>
            <div>
                <label class="form-label form-control-lg" for="nameimg">Nom de l'image*</label>
                <input class="form-control form-control-lg" type="text" id="nameimg" name="nameimg" value="<?= isset($imageobj->name_img) ? htmlspecialchars($imageobj->name_img) : '' ?>" pattern="<?= REGEX_NAME ?>" required placeholder="Ex: carotte">
                <p class="red">
                    <?= $errors['nameimg'] ?? '' ?>
                </p>
            </div>
            <div>
                <label class="form-label" for="picture"></label>
                <input class="form-control" type="file" id="picture" name="picture" accept=".webp, .png, .jpeg, .jpg" value="<?= isset($imageobj->image) ? htmlspecialchars($imageobj->image) : '' ?>">
                <p class="red">
                    <?= $errors['picture'] ?? '' ?>
                </p>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-light my-3" type="submit">Ajouter</button>
            </div>
        </form>
    </div>
</div>