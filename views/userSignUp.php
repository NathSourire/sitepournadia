<div>
    <h2>connection</h2>
    <form id="form" enctype="multipart/form-data" method="post">
        <div class="container conect">
            <div class="row results my-5 row-gap-4">
                <div class="inputform ">
                    <div class="col-12" >
                    <label class="form-label col-3" for="email1">E-mail *</label>
                    <input class="form-control col-9" type="email" id="email1" name="email1" value="" required>
                    </div>
                    <div class="col-12 my-3" >
                    <label class="form-label col-3" for="passWord3">Mot de passe *</label>
                    <input class="form-control col-9" id="passWord3" type="password" name="password3" pattern="<?= REGEX_PASSWORD ?>" required>
                </div>
                </div>
            </div>
            <button class="btn btn-light my-2" type="submit">Envoyer !</button>
    </form>
</div>