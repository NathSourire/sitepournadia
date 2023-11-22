<div class="container">
    <div class="row ">
        <h3>Les fiches produits <a href="#productsheet">Ajouter</a></h3>
        <table class="table my-5">
            <thead>
                <th class=" bg-transparent ">Nom du produit</th>
                <th class=" bg-transparent ">Image</th>
                <th class=" bg-transparent ">Prix</th>
                <th class=" bg-transparent ">Description</th>
                <!-- <th class=" bg-transparent ">Archivé le </th> -->
                <th class=" bg-transparent ">Modifier</th>
                <!-- <th class=" bg-transparent ">Archiver</th>
                <th class=" bg-transparent ">Restorer</th> -->
                <th class=" bg-transparent ">Supprimer</th>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) {
                ?>
                    <tr>
                        <td class=" bg-transparent "><?= $product->name_img ?></td>
                        <?php if (isset($product->image)) { ?>
                            <td class=" bg-transparent "><a href="/public/uploads/image/<?= $product->image ?>" target="_blank"><?= $product->image ?></a></td>
                        <?php } ?>
                        <td class=" bg-transparent "><?= $product->price ?></td>
                        <td class=" bg-transparent "><?= $product->description ?></td>
                        <!-- <td class=" bg-transparent "><?= $product->archived_product_at ?></td> -->
                        <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard_product_ctrl.php?id_product=<?= $product->id_product ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <!-- <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard_product_ctrl.php?action=archive&id_product=<?= $product->id_product ?>&id_galleries=<?= $product->id_galleries ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard_product_ctrl.php?action=restor&id_product=<?= $product->id_product ?>&id_galleries=<?= $product->id_galleries ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td> -->
                        <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard_product_ctrl.php?action=delete&id_product=<?= $product->id_product ?>&id_galleries=<?= $product->id_galleries ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="container" id="productsheet" >
            <div class="productsheet row">
                <form class="row " id="productform" enctype="multipart/form-data" method="post" novalidate>
                    <div class="offset-1 offset-md-1 col-10 col-md-10">
                        <div>
                            <label class="form-label form-control-lg" for="name_product">Nom du produit</label>
                            <input class="form-control form-control-lg" type="text" name="name_product" id="name_product">
                        </div>
                        <div class="imgtext my-5">
                            <label class="form-label form-control-lg" for="description">Description</label>
                            <textarea class="form-control form-control-lg" name="description" id="description" cols="50" rows="10"></textarea>

                        </div>
                        <div>
                            <label class="form-label form-control-lg" for="price">Prix</label>
                            <input class="form-control form-control-lg" type="text" name="price" id="price">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-light my-3" type="submit">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <h3>Fiche produit à relier à l'image</h3>
        <table class="table my-5">
            <thead>
                <th class=" bg-transparent ">Nom du produit</th>
                <!-- <th class=" bg-transparent ">Image</th>
                <th class=" bg-transparent ">Prix</th>
                <th class=" bg-transparent ">Description</th> -->
                <th class=" bg-transparent ">Archivé le </th>
                <th class=" bg-transparent ">Modifier</th>
            </thead>
            <tbody>
                <?php
                foreach ($products1 as $product1) {
                ?>
                    <tr>
                        <td class=" bg-transparent "><?= $product1->name_product ?></td>
                        <!-- <td class=" bg-transparent ">Null</td>
                        <td class=" bg-transparent "><?= $product1->price ?></td>
                        <td class=" bg-transparent "><?= $product1->description ?></td> -->
                        <td class=" bg-transparent "><?= $product1->archived_product_at ?></td>
                        <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard_change_product-ctrl.php?id_product=<?= $product1->id_product ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>