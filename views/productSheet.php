<div class="container">
    <div class="productsheet row">
            <div class="text-center fs-2" id="productname">
                <p><?= $product->name_product ?></p>
            </div>
            <div class="imgtext my-5 row">
                <img class="col-10 col-md-5 ms-5" src="/public/uploads/image/<?= $images->image ?>" alt="<?= $images->name_img ?>">
                <p class="col-10 col-md-5 ms-5">
                    <?= $product->description ?>
                </p>
            </div>
            <form class="row " id="productform" enctype="multipart/form-data" method="post" novalidate>
                <div class="offset-1 offset-md-1 col-10 col-md-10">
                    <div>
                        <p>Le prix est <?= $product->price ?> €</p>
                    </div>
                    <div>
                        <label class="form-label ms-3 my-3 " for="quantity">Quantité</label>
                        <input class="form-control form-control-lg ms-3" type="text" name="quanTity" id="quantity">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success my-3 ms-3" type="submit">Validation</button>
                    </div>
                </div>
            </form>
    </div>
</div>
