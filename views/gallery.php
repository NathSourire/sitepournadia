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

