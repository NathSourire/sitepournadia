<h1> Lister / Modifier / Archiver / Supprimer</h1>

<div class="container">
    <div class="productsheet row">

        <form class="row " id="productform" enctype="multipart/form-data" method="post" novalidate>
            <div class="offset-1 offset-md-1 col-10 col-md-10">

                <div class="text-center fs-2" id="productname">
                    <p value="<?= isset($productobj->name_img) ? htmlspecialchars($productobj->name_img) : '' ?>" ></p>
                </div>
                <div class="imgtext my-5 row">
                    <!-- <img class="col-10 col-md-5 ms-5" src="/public/uploads/image/<?= $productobj->image ?>" alt="<?= $productobj->name_img ?>"> -->
                    <!-- value="<?= isset($productobj->name_img) ? htmlspecialchars($productobj->name_img) : '' ?>" -->
                    <textarea class="col-10 col-md-5 ms-5 my-3 " name="description" id="description" cols="50" rows="10" value="<?= isset($productobj->description) ? htmlspecialchars($productobj->description) : '' ?>"></textarea>
                    <label class="form-label" for="description"></label> <br>
                </div>
                <div>
                    <label class="form-label ms-3" for="price">Prix</label>
                    <input class="form-control form-control-lg ms-3" type="text" name="price" id="price" value="<?= isset($productobj->price) ? htmlspecialchars($productobj->price) : '' ?>" readonly>
                </div>

                <div>
                    <label class="form-label ms-3 my-3 " for="quantity">Quantité</label>
                    <input class="form-control form-control-lg ms-3" type="text" name="quantity" id="quantity">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success my-3 ms-3" type="submit">Validation</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="row">
        <h3>Les produits</h3>
        <table class="table">
            <thead>
                <th>Nom du produit</th>
                <th>Photo</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Archivé le </th>
                <th>Modifier</th>
                <th>Archiver</th>
                <th>Restorer</th>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) {
                ?>
                    <tr>
                        <td><?= $product->name_product ?></td>
                        <?php if (isset($product->image)) { ?>
                        <td><a href="/public/uploads/image/<?= $product->image?>" target="_blank" ><?= $product->image ?></a></td>
                        <?php }?>
                        <td><?= $product->price ?></td>
                        <td><?= $product->description ?></td>
                        <td><?= $product->archived_product_at ?></td>
                        <td><a href="/controllers/dashboard/dashboard_product_ctrl.php?id_product=<?= $product->id_product ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/dashboard_product_ctrl.php?action=archive&id_product=<?= $product->id_product ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/dashboard_product_ctrl.php?action=restor&id_product=<?= $product->id_product ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>