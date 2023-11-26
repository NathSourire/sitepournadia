
<form enctype="multipart/form-data" method="post">
<div class="container mt-5">
    <div class="row">
        <h3>Les illustration <a href="#illustration">Ajouter</a> </h3> 
        <table class="table">
            <thead>
                <th class=" bg-transparent ">Nom du produit</th>
                <th class=" bg-transparent ">Photo</th>
                <th class=" bg-transparent ">Archivé le </th>
                <th class=" bg-transparent ">Modifier</th>
                <th class=" bg-transparent ">Archiver</th>
                <th class=" bg-transparent ">Restorer</th>
            </thead>
            <tbody>
                <?php
                foreach ($images as $image) {
                ?>
                    <tr>
                        <td class=" bg-transparent "><?= $image->name_img ?></td>
                        <?php if (isset($image->image)) { ?>
                        <td class=" bg-transparent "><a href="/public/uploads/image/<?= $image->image?>" target="_blank" ><?= $image->image ?></a></td>
                        <?php }?>
                        <td class=" bg-transparent "><?= $image->archived_at ?></td>
                        <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard_galleries_ctrl.php?id_galleries=<?= $image->id_galleries ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard_galleries_ctrl.php?action=archive&id_galleries=<?= $image->id_galleries ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard_galleries_ctrl.php?action=restor&id_galleries=<?= $image->id_galleries ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="offset-1 offset-md-1 col-10 col-md-10" id="illustration" >
        <label class="form-label form-control-lg" for="nameimg">Nom de l'image</label>
        <input class="form-control form-control-lg" type="text" id="nameimg" name="nameimg" value="<?= isset($imageobj->name_img) ? htmlspecialchars($imageobj->name_img) : '' ?>" pattern="<?= REGEX_NAME ?>" required placeholder="Ex: carotte">
        <p class="red">
            <?= $errors['nameimg'] ?? '' ?>
        </p>
    </div>
    <div class="offset-1 offset-md-1 col-10 col-md-10">
        <label class="form-label" for="picture"></label>
        <input class="form-control form-control-lg" type="file" id="picture" name="picture" accept=".webp, .png, .jpeg, .jpg">
        <p class="red">
            <?= $errors['picture'] ?? '' ?>
        </p>
    </div>
    <div class="d-flex justify-content-center">
        <button class="btn btn-light my-3" type="submit">Ajouter</button>
    </div>
</form>