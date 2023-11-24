<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <?php foreach ($crafts as $craft) { ?>
            <div class="card astucecard col-10 col-md-5 m-5 mb-5">
                <div class="row">
                    <h3 class="mt-5"><?= $craft->name_craft ?></h3>
                    <div class="card-body ">
                        <p class="card-text mb-4">
                        <!-- <h5 class="card-text"><?= $craft->astuce ?></h5> -->
                        <h5 class="card-text"><?= nl2br(html_entity_decode($craft->astuce)) ?></h5>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>