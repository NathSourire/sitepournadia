<div>
    <?php
    FlashMessage::display();
    ?>
</div>
<div class="imgBackground opacity-100">
    <img class="w-100" src="/public/assets/img/legume_page_accueil.jpg" alt="Legume page d'accueil">
</div>
<div id="nadHistory" class="container">
    <div class="row align-items-center mt-2 p-1">
        <h2 class=" text-center my-5">Qui suis-je</h2>
        <div class="col-12 mt col-md-6 "><img class="w-100" src="/public/assets/img/mettez-vous-au-jardinage-c-est-bon-pour-la-sante.jpeg" alt="Photo de Nad"></div>
        <div class="col-12 col-md-6">
            <h5 class="text-justify mt-3">Je suis passionnée de jardinage depuis plus de 30 ans et j'ai acquis de nombreuses techniques et 
                savoir-faire au fil du temps. Grâce à mes années d'expérience, ma production de fruits et de légumes est plutôt généreuse. 
                Afin de partager cette abondance, je propose le surplus à des personnes qui apprécient les produits de qualité.<br>
                Ma philosophie repose sur une approche naturelle de la culture : je privilégie une alimentation saine sans pesticides, 
                en cultivant mes plantes avec des engrais naturels. Cette méthode garantit la qualité et la fraîcheur de mes produits, 
                tout en préservant la santé et l'environnement.<br>
                C'est avec passion et engagement que je mets à disposition mes récoltes, offrant ainsi à ceux qui apprécient les bienfaits 
                d'une alimentation saine la possibilité de savourer des produits cultivés avec soin et respect de la nature.</h5>
        </div>
    </div>
</div>
<h2 class="text-center my-5">Les Produits du moment</h2>
<section class="container-fluid mb-5">
    <div class="row justify-content-center ">
        <div id="carouselExampleAutoplaying" class="carousel slide col-md-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $firstItem = true; // Ajout d'une variable pour suivre le premier élément
                foreach ($images as $image) {
                ?>
                    <div class="carousel-item <?php echo $firstItem ? 'active' : ''; ?>">
                        <a href="/controllers/productSheet-ctrl.php?id_galleries=<?= $image->id_galleries ?>&id_product=<?= $image->id_product ?>">
                            <img class="d-block w-100" src="/public/uploads/image/<?= $image->image ?>" alt="<?= $image->name_img ?>"></a>
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
