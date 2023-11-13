<div class="container">
    <div class="row">
        <h3>Les images</h3>
        <table class="table">
            <thead>
                <th>Id user</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>date anniversaire</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Message</th>
                <th>Rôle</th>
                <th>Modifier</th>
                <th>Archiver</th>
                <th>Restorer</th>
            </thead>
            <tbody>
                <?php
                foreach ($images as $image) {
                ?>
                    <tr>
                        <td><?= $image->name_img ?></td>
                        <td><?= $image->image ?></td>
                        <td><?= $image->archived_at ?></td>
                        <td><a href="/controllers/dashboard/dashboard_galleries_ctrl.php?id_galleries=<?= $image->id_galleries ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/dashboard_galleries_ctrl.php?action=archive&id_galleries=<?= $image->id_galleries ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/dashboard_galleries_ctrl.php?action=restor&id_galleries=<?= $image->id_galleries ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
