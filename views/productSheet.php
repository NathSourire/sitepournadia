
    <div class="productsheet row">
        <div class="text-center fs-2" id="productname">
            <p>Nom du produit</p>
        </div>
        <div class="imgtext my-5 row">
            <img class="col-5 ms-5" src="/public/assets/img/Babarhum.jpg " alt="">
            <p class="col-5 ms-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam aperiam amet suscipit laudantium vel.
                Consequatur deserunt id voluptate error corporis? Adipisci culpa consequatur ratione quaerat labore
                fugit nihil ipsam perspiciatis?
            </p>
        </div>
        <form class="row " id="productform" enctype="multipart/form-data" method="post" novalidate>
            <div>
                <label class="form-label ms-3" for="price">Prix</label>
                <input class="form-control ms-3" type="text" name="priCe" id="price" value="somme" readonly>
            </div>

            <div>
                <label class="form-label ms-3 my-3 " for="quantity">Quantité</label>
                <input class="form-control ms-3" type="number" name="quanTity" id="quantity">
            </div>
            <div>
                <button class="btn btn-success my-3 ms-3" type="submit">Validation</button>
            </div>
        </form>
    </div>
