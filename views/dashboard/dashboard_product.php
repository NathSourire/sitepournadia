<h1> Lister / Modifier / Archiver / Supprimer</h1>

<div class="container">
<!-- 
    <div class="row">
        <table class="table tablelist">
            <thead>
                <th><a href="?column=type&order=<?= ($order == 'DESC') ? 'ASC' : 'DESC'; ?>">Numero du produit             
                <th><a href="?column=brand&order=<?= ($order == 'DESC') ? 'ASC' : 'DESC'; ?>">Nom du produit
                <img src="/public/assets/img/flèche_haut.png" alt="fleche vers le haut"><img src="/public/assets/img/flèche_bas.png" alt="fleche vers le bas"></a></th>
                <th><a href="?column=model&order=<?= ($order == 'DESC') ? 'ASC' : 'DESC'; ?>">Prix
                <th>Description</th>
                <th>Photo</th>
                <th>Modifier</th>
                <th>Archiver</th>
            </thead>
            <tbody>
                <?php
                foreach ($vehicles as $vehicle) {
                ?>
                    <tr>
                        <td title="<?= 'date de création '. date("d/m/Y H:i", strtotime($vehicle->created_at)) .' date de mise à jour '. date("d/m/Y H:i", strtotime($vehicle->updated_at)) ?>"><?= $vehicle->type ?></td>
                        <td><?= $vehicle->brand ?></td>
                        <td><?= $vehicle->model ?></td>
                        <td><?= $vehicle->registration ?></td>
                        <td><?= $vehicle->mileage ?></td>
                        <?php if (isset($vehicle->picture)) { ?>
                        <td><a href="/public/uploads/vehicles/<?= $vehicle->picture?>" target="_blank" ><?= $vehicle->picture ?></a></td>
                        <?php } else { ?>
                        <td></td>
                        <?php } ?>
                        <td><a href="/controllers/dashboard/vehicle/update_vehicle_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/vehicle/delete_vehicle_ctrl.php?action=archive&id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p>
            <?php 
            if($delete == '1'){
                echo 'Véhicule bien supprimée';
            }else if($delete === '0'){
                echo 'suppression échouée';
            }
            ?>
        </p>

    </div> -->
    
<!-- 
    <div class="row">
        <h3>Les véhicules archivés</h3>
        <table class="table tablearchived">
            <thead>
                <th>Catégorie</th>                
                <th>Marque</th>
                <th>Modèle</th>
                <th>Immatriculation</th>
                <th>Kilométrage</th>
                <th>Photo</th>
                <th>Archivé le</th>
                <th>Modifier</th>
                <th>Archiver</th>
                <th>Supprimer</th>
            </thead>
            <tbody>
                <?php
                foreach ($archived as $vehicle) {
                ?>
                    <tr>
                        <td><?= $vehicle->type ?></td>
                        <td><?= $vehicle->brand ?></td>
                        <td><?= $vehicle->model ?></td>
                        <td><?= $vehicle->registration ?></td>
                        <td><?= $vehicle->mileage ?></td>
                        <td><?= $vehicle->picture ?></td>
                        <td><?= date("d/m/Y H:i", strtotime($vehicle->deleted_at)) ?></td>
                        <td><a href="/controllers/dashboard/vehicle/update_vehicle_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/vehicle/delete_vehicle_ctrl.php?action=restor&id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/vehicle/delete_vehicle_ctrl.php?action=delete&id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div> -->

</div>
