
<form enctype="multipart/form-data" method="post">
    <div>
        <label class="form-label" for="nameimg">Nom de l'image*</label>
        <input class="form-control" type="text" id="nameimg" name="nameimg" value="<?= isset($imageobj->name_img) ? htmlspecialchars($imageobj->name_img) : '' ?>" pattern="<?= REGEX_NAME ?>" required placeholder="Ex: carotte">
        <p class="red">
            <?= $errors['nameimg'] ?? '' ?>
        </p>
    </div>
    <div>
        <label class="form-label" for="picture"></label>
        <input class="form-control" type="file" id="picture" name="picture" accept=".webp, .png, .jpeg, .jpg, .gif">
        <p class="red">
            <?= $errors['picture'] ?? '' ?>
        </p>
    </div>
    <div>
        <button class="btn btn-light" type="submit">Ajouter</button>
    </div>
</form>

<div class="container">
    <div class="row">
        <h3>Les images</h3>
        <table class="table">
            <thead>
                <th>Nom du produit</th>
                <th>Photo</th>
                <th>Archivé le </th>
                <th>Modifier</th>
                <th>Archiver</th>
                <th>Restorer</th>
            </thead>
            <tbody>
                <?php
                foreach ($images as $image) {
                ?>
                    <tr>
                        <td><?= $image->name_img ?></td>
                        <td><?= $image->image ?></td>
                        <td><?= $image->archived_at ?></td>
                        <td><a href="/controllers/dashboard/dashboard_galleries_ctrl.php?id_galleries=<?= $image->id_galleries ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/dashboard_galleries_ctrl.php?action=archive&id_galleries=<?= $image->id_galleries ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/dashboard_galleries_ctrl.php?action=restor&id_galleries=<?= $image->id_galleries ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p>
            <?php 
            if($archive == '1'){
                echo 'Image bien archivée';
            }else if($archive === '0'){
                echo 'Archivage échouée';
            }
            ?>
        </p>
        <p class="red"><?= isset($saved) ? 'Catégorie modifiée' : '' ?></p>
    </div>
</div>
