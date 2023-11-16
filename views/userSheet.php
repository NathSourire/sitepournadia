<div>
    <?php
    FlashMessage::display();
    ?>
</div>
<div>
    <h2>Votre identité</h2>
    <form id="form" enctype="multipart/form-data" method="post">
        <fieldset class="container  ident">
            <div class="row">
                <div class="inputform offset-1 offset-md-1 col-10 col-md-10">
                    <div>
                        <label class="form-label" for="lastname">Nom *</label>
                        <input class="form-control form-control-lg " type="text" id="lastname" name="lastname" autocomplete="family-name" pattern="<?= REGEX_NAME ?>" value="<?= isset($userObj->lastname) ? htmlspecialchars($userObj->lastname) : '' ?>">
                        <p class="red">
                            <?= $errors['lastname'] ?? '' ?>
                        </p>
                    </div>
                    <div>
                        <label class="form-label" for="firstnames">Prénom *</label>
                        <input class="form-control form-control-lg " type="text" id="firstnames" name="firstname" autocomplete="given-name" pattern="<?= REGEX_NAME ?>" value="<?= isset($userObj->firstname) ? htmlspecialchars($userObj->firstname) : '' ?>">
                        <p class="red">
                            <?= $errors['firstname'] ?? '' ?>
                        </p>
                    </div>
                    <div>
                        <label class="form-label" for="birthdaydate">Date de naissance </label>
                        <input class="form-control form-control-lg " type="date" id="birthdaydate" name="dateOfBirthday" max="<?= $dateNow ?>" value="<?= isset($userObj->date_of_birthday) ? htmlspecialchars($userObj->date_of_birthday) : '' ?>">
                        <p class="red">
                            <?= $errors['dateOfBirthday'] ?? '' ?>
                        </p>
                    </div>
                    <div>
                        <label class="form-label" for="zipcode">Code postal *</label>
                        <input class="form-control form-control-lg " maxlength="5" type="text" placeholder="Entrez un code postal" name="zipcode" value="<?= isset($userObj->zipcode) ? htmlspecialchars($userObj->zipcode) : '' ?>" autocomplete="postal-code" id="zipcode">
                        <p class="red">
                            <?= $errors['zipcode'] ?? '' ?>
                        </p>
                    </div>
                    <div>
                        <label class="form-label" for="city">ville *</label>
                        <select class="form-select form-select-lg " name="city" id="city">
                            <option selected>Ville</option>
                        </select>
                        <p class="red">
                            <?= $errors['city'] ?? '' ?>
                        </p>
                    </div>
                    <div>
                        <label class="form-label" for="phone">Téléphone *</label>
                        <input class="form-control form-control-lg " type="text" id="phone" name="phone" pattern="<?= REGEX_TEL ?>" value="<?= isset($userObj->phone) ? htmlspecialchars($userObj->phone) : '' ?>">
                        <p class="red">
                            <?= $errors['phone'] ?? '' ?>
                        </p>
                    </div>
                    <div>
                        <label class="form-label" for="email">E-mail *</label>
                        <input class="form-control form-control-lg " type="email" id="email" name="email" autocomplete="email" value="<?= isset($userObj->email) ? htmlspecialchars($userObj->email) : '' ?>">
                        <p class="red">
                            <?= $errors['email'] ?? '' ?>
                        </p>
                    </div>
                    <div>
                        <label class="form-label" for="passWord1">Mot de passe *</label>
                        <input class="form-control form-control-lg " id="passWord1" type="password" name="password1" pattern="<?= REGEX_PASSWORD ?>"><br>
                        <p class="red">
                            <?= $errors['password1'] ?? '' ?>
                        </p>
                        <label class="form-label" for="passWord2">Vérification du mot de pass *</label>
                        <input class="form-control form-control-lg  my-3" id="passWord2" type="password" name="password2" pattern="<?= REGEX_PASSWORD ?>">
                        <p>Le mot de passe doit contenir au moins 8 caractères, une lettre en majuscule, une lettre en minuscule, un chiffre et un caractère spécial.<br>
                            Les deux doivent être identique.</p>
                        <p class="red" id="passwordMessage"></p>
                    </div>
                    <div>
                        <label class="form-label" for="message">Votre message</label> <br>
                        <textarea class="form-control form-control-lg  my-3" name="message" id="message" cols="50" rows="10" maxlength="500" placeholder="Message" value="<?= isset($userObj->message) ? htmlspecialchars($userObj->message) : '' ?>"></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-light my-3 ms-5">Envoie !</button>
                        <p class="ms-2 text-end">* Champ obligatoire</p>
                    </div>
                </div>

            </div>
        </fieldset>
    </form>
</div>

<script src="/public/assets/js/city.js"></script>