<div>
    <?php
    FlashMessage::display();
    ?>
</div>
<div class="imgBackground opacity-75 row p-5">
    <img src="/public/assets/img/legume_page_accueil.jpg" alt="Legume page d'accueil">
    <p>je teste du texte sur mon image</p>
</div>
<div id="nadHistory" class="container">
    <div class="row align-items-center mt-2 p-1">
        <div class="col-12 col-md-6 "><img class="w-100" src="/public/assets/img/photoaremplacer.jpg" alt="Photo de Nad"></div>
        <div class="col-12 col-md-6">
            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente rem deserunt
                nesciunt iure doloribus dolorum ex, architecto similique dolor provident itaque esse. Soluta esse
                commodi, voluptatibus quas
                sapiente modi aliquam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt iste
                obcaecati debitis unde aut
                esse nisi, eius temporibus ullam cum cumque! Sint cumque sit illo similique asperiores, numquam
                ullam aut!
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente libero incidunt temporibus fugiat
                iure nam ipsa suscipit molestias? Iusto maiores molestias asperiores aperiam ad modi quos magni
                omnis
                distinctio sapiente! Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati eveniet
                maiores blanditiis ea
                distinctio ipsa et deleniti? Accusamus unde eaque nihil, quod totam voluptas optio debitis quia
                aliquam, dolore
                quos.</p>
        </div>
    </div>
</div>
<h2 class="text-center my-5">Produit du moment</h2>
<section class="container-fluid">
    <div class="row justify-content-center ">
        <div id="carouselExampleAutoplaying" class="carousel slide col-md-6" data-bs-ride="carousel">
            <div class="carousel-inner" >
                <?php
                $firstItem = true; // Ajout d'une variable pour suivre le premier élément
                foreach ($images as $image) {
                ?>
                    <div class="carousel-item <?php echo $firstItem ? 'active' : ''; ?>">
                    <a href="/controllers/productSheet-ctrl.php?id_galleries=<?= $image->id_galleries ?>&id_product=<?= $image->id_product ?>">
                        <img src="/public/uploads/image/<?= $image->image ?>" class="d-block w-100" alt="<?= $image->name_img ?>"></a>
                    </div>
                <?php
                    $firstItem = false; // Marquer le premier élément comme traité après la première itération
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
