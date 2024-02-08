<?php 
    require_once('../templates/header.php');
?>
<div class="container-fluid">
        <form method="POST" action="">
            <legend>Création de voitures d'ocassions</legend>
            <div class="p-2 border rounded-2">
                <div>
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="marque..." id="marque" name="marque" required>
                    <label for="model" class="form-label">Marque</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="model..." id="model" name="model" required>
                </div>
                <div>
                    <label for="km" class="form-label">Kilomètrage</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="Kilomètrage..." id="km" name="km" required>
                    <label for="annee" class="form-label">Mise en circulation</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="marque..." id="annee" name="annee" required>
                    <label for="price" class="form-label">Prix</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="Prix..." id="price" name="price" required>
                </div>
                <label for="price" class="form-label">Tarif</label>
                <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                placeholder="Tarif..." id="price" name="price" required>
                <div class="py-2">
                    <label for="file">Choix d'image principal</label>
                    <input class="px-2" type="file" name="file">
                </div>
            </div>
            <div class="p-2 d-flex justify-content-end">
                <input class="btn btn-outline-secondary" type="submit" name="valide_cars" value="Enregistrer" >
        </div>
        </form>
</div>
<?php 
    require_once('../templates/footer.php');
?>