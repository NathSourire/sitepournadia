<h1> Lister / Modifier / Archiver / Supprimer</h1>

<div class="container">
    <div class="productsheet row">

        <form class="row " id="productform" enctype="multipart/form-data" method="post" novalidate>
            <div class="offset-1 offset-md-1 col-10 col-md-10">

                <div class="text-center fs-2" id="productname">
                    <p>Nom du produit</p>
                </div>
                <div class="imgtext my-5 row">
                    <img class="col-10 col-md-5 ms-5" src="/public/assets/img/Tartecitronmeringué.jpg" alt="">
                    <textarea class="col-10 col-md-5 ms-5 my-3 " name="message" id="message" cols="50" rows="10" placeholder="Description"></textarea>
                    <label class="form-label" for="message"></label> <br>
                </div>
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
</div>