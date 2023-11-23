<div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="card col">
        <?php
        foreach ($crafts as $craft) {
        ?>
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h3 class="card-title"><?= $craft->name_craft ?></h3>
                <h5 class="card-text"><?= $craft->astuce ?></h5>
            </div>
            <?php } ?>
        </div>
    </div>

