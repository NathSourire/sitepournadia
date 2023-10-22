<div class="gallery">
    <div class="row row-cols-1 row-cols-md-4 gap-5 d-flex justify-content-center my-5">
        <?php
        foreach ($images as $image) {
        ?>
            <div class="card col">
                <img class=" img-thumbnail " src="/public/uploads/image/<?= $image->image ?>" alt="<?= $image->name_img ?>">
                <h5 class="card-title my-3"><?= $image->name_img ?></h5>
            </div>
        <?php } ?>
    </div>
</div>

<form enctype="multipart/form-data" method="post">
    <div>
        <label class="form-label" for="nameimg">Nom de l'image*</label>
        <input class="form-control" type="text" id="nameimg" name="nameimg" value="" pattern="<?= REGEX_NAME ?>" required placeholder="Ex: carotte">
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
