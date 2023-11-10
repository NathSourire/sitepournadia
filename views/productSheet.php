<div class="productsheet row">
    <div class="text-center fs-2" id="productname">
        <p>Nom du produit</p>
    </div>
    <div class="imgtext my-5 row">
        <img class="col-10 col-md-5 ms-5" src="/public/assets/img/Tartecitronmeringué.jpg" alt="">
        <p class="col-10 col-md-5 ms-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam aperiam amet suscipit laudantium vel.
            Consequatur deserunt id voluptate error corporis? Adipisci culpa consequatur ratione quaerat labore
            fugit nihil ipsam perspiciatis?
        </p>
    </div>
    <form class="row " id="productform" enctype="multipart/form-data" method="post" novalidate>
        <div class="offset-1 offset-md-1 col-10 col-md-10" >
            <div>
                <label class="form-label ms-3" for="price">Prix</label>
                <input class="form-control form-control-lg ms-3" type="text" name="priCe" id="price" value="somme" readonly>
            </div>

            <div>
                <label class="form-label ms-3 my-3 " for="quantity">Quantité</label>
                <input class="form-control form-control-lg ms-3" type="number" name="quanTity" id="quantity">
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success my-3 ms-3" type="submit">Validation</button>
            </div>
        </div>
    </form>
</div>