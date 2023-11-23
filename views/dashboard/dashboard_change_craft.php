<div class="container mt-5" id="craft">
    <div>
        <form class="row " id="astuceform" enctype="multipart/form-data" method="post" novalidate>
            <div class="offset-1 offset-md-1 col-10 col-md-10">
                <div>
                    <label class="form-label form-control-lg" for="name_craft">Nom de l'astuce</label>
                    <input class="form-control form-control-lg" type="text" name="name_craft" id="name_craft"  
                    value="<?= isset($productobj->name_product) ? htmlspecialchars($productobj->name_product) : '' ?>">
                </div>
                <div class="imgtext my-5">
                    <label class="form-label form-control-lg" for="astuce">Astuce</label>
                    <textarea class="form-control form-control-lg" name="astuce" id="astuce" cols="50" rows="10"><?= isset($productobj->name_product) ? htmlspecialchars($productobj->name_product) : '' ?></textarea>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-light my-3" type="submit">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</div>