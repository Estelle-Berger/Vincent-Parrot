<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
?>
<div class="p-2 container-fluid">
    <form method="post" action="">
        <legend>Nouvel employé</legend>
            <div class="d-flex justify-content-center">
                <div class="p-2 border rounded d-flex justify-content-center">
                    <div class="row">
                        <div class="col-4">
                            <label for="lastname"class="form-label">Nom*</label>
                            <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                            placeholder="Nom" id="lastname" name="lastname" required>
                        </div>
                        <div class="col-4">
                            <label for="firstname"class="form-label">Prénom*</label>
                            <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                            placeholder="Prénom" id="firstname" name="firstname" required>
                        </div>
                        <div class="col-4">
                            <label for="email"class="form-label">Email*</label>
                            <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                            placeholder="email" id="email" name="email" required>
                        </div>
                        <div class="col-4">
                            <label for="profil" class="form-label">Profil</label>
                            <select class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2" name="profil" id="profil">
                                <option value="1">Administrateur</option>
                                <option value="2">Employé</option>
                            </select>
                        </div>
                        <div class="p-2 d-flex justify-content-center">
                            <input class="btn btn-outline-secondary" type="submit" name="save_employe" value="Envoyer" >
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>

<?php 
    require_once('./templates/footer.php');
?>