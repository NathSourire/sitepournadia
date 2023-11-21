<div class="container">
    <div class="productsheet row">
        <form class="row " id="productform" enctype="multipart/form-data" method="post" novalidate>
            <div class="offset-1 offset-md-1 col-10 col-md-10">
                <div>
                    <label class="form-label form-control-lg" for="name_product">Nom du produit</label>
                    <input class="form-control form-control-lg" type="text" name="name_product" id="name_product" 
                    value="<?= isset($productobj->name_product) ? htmlspecialchars($productobj->name_product) : '' ?>">
                </div>
                <div class="imgtext my-5">     
                    <label class="form-label form-control-lg" for="description">Description</label>
                    <textarea class="form-control form-control-lg" name="description" id="description" cols="50" rows="10" 
                    value="<?= isset($productobj->description) ? htmlspecialchars($productobj->description) : '' ?>"><?= isset($productobj->description) ? htmlspecialchars($productobj->description) : '' ?></textarea>

                </div>
                <div>
                    <label class="form-label form-control-lg" for="price">Prix</label>
                    <input class="form-control form-control-lg" type="text" name="price" id="price" 
                    value="<?= isset($productobj->price) ? htmlspecialchars($productobj->price) : '' ?>">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-light my-3" type="submit">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="row ">
        <h3>Les produits</h3>
        <table class="table my-5">
            <thead>
                <th>Nom du produit</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Archivé le </th>
                <th>Modifier</th>
                <th>Archiver</th>
                <th>Restorer</th>
                <th>Supprimer</th>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) {
                ?>
                    <tr>
                        <td><?= $product->name_img ?></td>
                        <?php if (isset($product->image)) { ?>
                        <td><a href="/public/uploads/image/<?= $product->image?>" target="_blank" ><?= $product->image ?></a></td>
                        <?php }?>
                        <td><?= $product->price ?></td>
                        <td><?= $product->description ?></td>
                        <td><?= $product->archived_product_at ?></td>
                        <td><a href="/controllers/dashboard/dashboard_change_product-ctrl.php?id_product=<?= $product->id_product ?>&id_galleries=<?= $product->id_galleries ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/dashboard_product_ctrl.php?action=archive&id_product=<?= $product->id_product ?>&id_galleries=<?= $product->id_galleries ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/dashboard_product_ctrl.php?action=restor&id_product=<?= $product->id_product ?>&id_galleries=<?= $product->id_galleries ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/dashboard_product_ctrl.php?action=delete&id_product=<?= $product->id_product ?>&id_galleries=<?= $product->id_galleries ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

<!-- 
            <thead>
                <th>Nom du produit</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Archivé le </th>
                <th>Modifier</th>
            </thead>
            <tbody>
                <?php
                foreach ($products1 as $product1) {
                ?>
                    <tr>
                        <td><?= $product1->name_product ?></td>
                        <td>Null</td>
                        <td><?= $product1->price ?></td>
                        <td><?= $product1->description ?></td>
                        <td><?= $product1->archived_product_at ?></td>
                        <td><a href="/controllers/dashboard/dashboard_change_product-ctrl.php?id_product=<?= $product1->id_product ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody> -->



        </table>
    </div>
</div>