<div>
        <h2>connection</h2>
        <form id="form" enctype="multipart/form-data" method="post" >
            <fieldset class="container-fluid conect">
                <div class="row results my-5 row-gap-4">
                    <div class="inputform" >
                        <div>
                            <label class="form-label" for="email1">E-mail *</label>
                            <input class="form-control" type="email" id="email1" name="email1" value="" required>
                            <p class="red">
                                <?= $errors['email'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label class="form-label" for="passWord3">Mot de passe *</label>
                            <input class="form-control" id="passWord3" type="password" name="password3" pattern="<?= REGEX_PASSWORD ?>" required><br>
                        </div>
                </div>
            </fieldset>
        </form>
    </div>