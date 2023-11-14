    <div class="">
        <h3>Les Utilisateurs</h3>
        <table class="table">
            <thead>
                <th>Id user</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date anniversaire</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Téléphone</th>
                <th>Email</th>
                <!-- <th>Mot de pass</th> -->
                <th>Message</th>
                <th>Date de confirmation</th>
                <th>Modifier</th>
                <th>Archiver</th>
                <th>Restorer</th>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <td><?= $user->id_user ?></td>
                        <td><?= $user->lastname ?></td>
                        <td><?= $user->firstname ?></td>
                        <td><?= $user->date_of_birthday ?></td>
                        <td><?= $user->zipcode ?></td>
                        <td><?= $user->city ?></td>
                        <td><?= $user->phone ?></td>
                        <td><?= $user->email ?></td>
                        <!-- <td><?= $user->password ?></td> -->
                        <td><?= $user->message ?></td>
                        <td><?= $user->confirmed_at ?></td>
                        <td><a href="/controllers/dashboard/dashboard_change_user-ctrl.php?id_user=<?= $user->id_user ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/dashboard_user_ctrl.php?action=archive&id_user=<?= $user->id_user ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/dashboard_user_ctrl.php?action=restor&id_user=<?= $user->id_user ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>