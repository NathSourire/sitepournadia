
<form enctype="multipart/form-data" method="post">
<div class="container">
    <div class="row">
        <h3>Les illustration <a href="#craft">Ajouter</a> </h3> 
        <table class="table">
            <thead>
                <th class=" bg-transparent ">Nom de l'astuce</th>
                <th class=" bg-transparent ">Astuce</th>
                <!-- <th class=" bg-transparent ">Archivé le </th> -->
                <th class=" bg-transparent ">Modifier</th>
                <!-- <th class=" bg-transparent ">Archiver</th> -->
                <!-- <th class=" bg-transparent ">Restorer</th> -->
            </thead>
            <tbody>
                <?php
        foreach ($crafts as $craft) {
                ?>
                    <tr>
                        <td class=" bg-transparent "><?= $craft->name_craft ?></td>
                        <td class=" bg-transparent "><?= $craft->astuce ?></td>
                        <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard_change_craft-ctrl.php?id_crafts=<?= $craft->id_crafts ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <!-- <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard_galleries_ctrl.php?action=archive&id_galleries=<?= $image->id_galleries ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard_galleries_ctrl.php?action=restor&id_galleries=<?= $image->id_galleries ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container mt-5" id="craft">
    <div>
        <form class="row " id="astuceform" enctype="multipart/form-data" method="post" novalidate>
            <div class="offset-1 offset-md-1 col-10 col-md-10">
                <div>
                    <label class="form-label form-control-lg" for="name_craft">Nom de l'astuce</label>
                    <input class="form-control form-control-lg" type="text" name="name_craft" id="name_craft">
                </div>
                <div class="imgtext my-5">
                    <label class="form-label form-control-lg" for="astuce">Astuce</label>
                    <textarea class="form-control form-control-lg" name="astuce" id="astuce" cols="50" rows="10"></textarea>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-light my-3" type="submit">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>