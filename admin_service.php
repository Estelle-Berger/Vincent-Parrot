<?php 
    require_once('./templates/header.php');
?>
<div class="container-fluid">
        <form method="POST" action="./admin_services.php" enctype="multipart/form-data">
            <legend class="p-3 px-5 text-decoration-underline">Création de services</legend>
            <div class="p-2 border rounded-2">
                <label for="categorie"class="form-label">Type de service</label>
                <select class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    id="categorie" name="categorie">
                    <option value="1">Services carrosserie</option>
                    <option value="2">Services mécanique</option>
                    <option value="3">Services entretien</option>
                </select>
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                placeholder="Titre..." id="title" name="title" required>

                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                placeholder="Description..." id="description" name="description" required></textarea>

                <label for="price" class="form-label">Tarif</label>
                <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                placeholder="Tarif..." id="price" name="price" required>

                <div class="py-2">
                    <label for="file">Choix d'image pour le service</label>
                    <input class="px-2" type="file" name="file">
                </div>
            </div>
            <div class="p-2 d-flex justify-content-end">
                <input class="btn btn-outline-secondary" type="submit" name="save_service" value="Enregistrer" >
        </div>
        </form>
</div>
<?php 
    require_once('./templates/footer.php');
?>