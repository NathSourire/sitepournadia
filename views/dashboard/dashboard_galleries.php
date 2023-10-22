
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