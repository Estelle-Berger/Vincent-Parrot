<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
?>
<div class="p-2 container-fluid">
    <form method="post" action="">
        <legend class="d-flex justify-content-center">Connexion</legend>
            <div class="d-flex justify-content-center">
                <div class="p-2 border rounded d-flex justify-content-center">
                    <div class="col">
                        <div class="p-2">
                            <label for="email"class="form-label">Email*</label>
                            <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark text-decoration-none border rounded-2"
                            placeholder="email" id="email" name="email" required>
                        </div>
                        <div class="p-2">
                            <label for="password"class="form-label">Mot de passe*</label>
                            <input type="password"class="form-control d-inline-flex focus-ring focus-ring-dark text-decoration-none border rounded-2"
                            placeholder="******" id="password" name="password" required>
                        </div>
                    </div>
                </div>
            </div>
        <div class="p-2 d-flex justify-content-center">
            <input class="btn btn-outline-secondary" type="submit" name="valid_login" value="Envoyer" >
        </div>
    </form>
</div>
<?php 
    require_once('./templates/footer.php');
?>