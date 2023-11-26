    <div class=" mt-5">
<h3>Les Utilisateurs <a href="/controllers/userSignUp-ctrl.php">Ajouter</a></h3>
        <table class="table mt-5">
            <thead>
                <th class="bg-transparent">Id user</th>
                <th class="bg-transparent">Nom</th>
                <th class="bg-transparent">Prénom</th>
                <th class="bg-transparent">Date anniversaire</th>
                <th class="bg-transparent">Code postal</th>
                <th class="bg-transparent">Ville</th>
                <th class="bg-transparent">Téléphone</th>
                <th class="bg-transparent">Email</th>
                <!-- <th class="bg-transparent">Mot de pass</th> -->
                <th class="bg-transparent">Message</th>
                <th class="bg-transparent">Date de confirmation</th>
                <th class="bg-transparent">Modifier</th>
                <!-- <th class="bg-transparent">Archiver</th>
                <th class="bg-transparent">Restorer</th> -->
                <th class="bg-transparent">Supprimer</th>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <td class="bg-transparent"><?= $user->id_user ?></td>
                        <td class="bg-transparent"><?= $user->lastname ?></td>
                        <td class="bg-transparent"><?= $user->firstname ?></td>
                        <td class="bg-transparent"><?= $user->date_of_birthday ?></td>
                        <td class="bg-transparent"><?= $user->zipcode ?></td>
                        <td class="bg-transparent"><?= $user->city ?></td>
                        <td class="bg-transparent"><?= $user->phone ?></td>
                        <td class="bg-transparent"><?= $user->email ?></td>
                        <!-- <td class="bg-transparent"><?= $user->password ?></td> -->
                        <td class="bg-transparent"><?= $user->message ?></td>
                        <td class="bg-transparent"><?= $user->confirmed_at ?></td>
                        <td class="bg-transparent"><a href="/controllers/dashboard/dashboard_change_user-ctrl.php?id_user=<?= $user->id_user ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <!-- <td class=" bg-transparent "><a href="/controllers/dashboard/dashboard/dashboard_users_ctrl.php?action=archive&id_user=<?= $user->id_user ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td> class=" bg-transparent "<a href="/controllers/dashboard/dashboard/dashboard_users_ctrl.php?action=restor&id_user=<?= $user->id_user ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="poubelle">
                            </a>
                        </td> -->
                        <td class="bg-transparent"><a href="/controllers/dashboard/dashboard_users_ctrl.php?action=delete&id_user=<?= $user->id_user ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>