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
            <div class="d-flex justify-content-center">
                <button class="btn btn-light my-3" type="submit">Modifier</button>
            </div>
        </form>
    </div>
</div>
