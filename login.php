<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
?>
<div class="p-2 container-fluid">
    <form method="post" action="">
        <legend>Connexion</legend>
            <div class="d-flex justify-content-center">
                <div class="p-2 border rounded d-flex justify-content-center">
                    <div class="row">
                        <div class="col">
                            <label for="email"class="form-label">Email*</label>
                            <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                            placeholder="email" id="email" name="email" required>
                        </div>
                        <div class="col">
                            <label for="password"class="form-label">Mot de passe*</label>
                            <input type="password"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                            placeholder="******" id="password" name="password" required>
                        </div>
                    </div>
                </div>
            </div>
        <div class="p-2 d-flex justify-content-end">
            <input class="btn btn-outline-secondary" type="submit" name="valid_login" value="Envoyer" >
        </div>
    </form>
</div>
<?php 
    require_once('./templates/footer.php');
?>