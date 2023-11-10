
    
    <div>
        <h2>Votre identité</h2>
        <form id="form" enctype="multipart/form-data" method="post" >
            <fieldset class="container  ident">
                <div class="row">
                    <div class="inputform offset-1 offset-md-1 col-10 col-md-10" >
                        <div>
                            <label class="form-label" for="lastnames">Nom *</label>
                            <input class="form-control form-control-lg " type="text" id="lastnames" name="lastname" pattern="<?= REGEX_NAME ?>" required>
                            <p class="red">
                                <?= $errors['lastname'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="firstnames">Prénom *</label>
                            <input class="form-control form-control-lg " type="text" id="firstnames" name="firstname" pattern="<?= REGEX_NAME ?>" require>
                            <p class="red">
                                <?= $errors['firstname'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="birthdaydate">Date de naissance </label>
                            <input class="form-control form-control-lg " type="date" id="birthdaydate" name="dateOfBirthday" max="<?= $dateNow ?>">
                            <p class="red">
                                <?= $errors['dateOfBirthday'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="zipcode">Code postal</label>
                            <input class="form-control form-control-lg " type="text" id="zipcode" name="zipCode" pattern="<?= REGEX_POSTAL ?>">
                            <p class="red">
                                <?= $errors['zipCode'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="city">Ville</label>
                            <input class="form-control form-control-lg " type="text" id="city" name="cities" pattern="<?= REGEX_NAME ?>">
                            <p class="red">
                                <?= $errors['cities'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="tel">Téléphone *</label>
                            <input class="form-control form-control-lg " type="tel" id="tel" name="numbertel" pattern="<?= REGEX_TEL ?>" required>
                            <p class="red">
                                <?= $errors['numbertel'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="email">E-mail *</label>
                            <input class="form-control form-control-lg " type="email" id="email" name="email" value="" required>
                            <p class="red">
                                <?= $errors['email'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="passWord1">Mot de passe *</label>
                            <input class="form-control form-control-lg " id="passWord1" type="password" name="password1" pattern="<?= REGEX_PASSWORD ?>" required><br>
                            <p class="red">
                                <?= $errors['password1'] ?? '' ?>
                            </p>
                            <label class="form-label" for="passWord2">Vérification du mot de pass *</label>
                            <input class="form-control form-control-lg  my-3" id="passWord2" type="password" name="password2" pattern="<?= REGEX_PASSWORD ?>" required>
                            <p>Le mot de passe doit contenir au moins 8 caractères, une lettre en majuscule, une lettre en minuscule, un chiffre et un caractère spécial.<br>
                                Les deux doivent être identique.</p>
                            <p class="red" id="passwordMessage"></p>
                        </div>
                        <div>
                            <label class="form-label" for="message">Votre message</label> <br>
                            <textarea name="message" id="message" cols="50" rows="10" maxlength="500" placeholder="Racontez une expérience avec la programmation et/ou l'informatique que vous auriez pu avoir."></textarea>
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
