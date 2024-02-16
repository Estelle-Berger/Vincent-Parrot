<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
    $requete = $bdd->prepare("SELECT * FROM options");
    $requete->execute();
    $listeOptions = $requete->fetchAll();
?>
<div class="container-fluid">
    <form method="POST" action="./admin_car.php">
        <legend>Création de voitures d'ocassions</legend>
        <div class="p-2 border rounded-2">
            <div class="row">
                <div class="col">
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="Marque..." id="marque" name="marque" >
                </div>
                <div class="col">
                    <label for="model" class="form-label">Marque</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="Model..." id="model" name="model" >
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="kilometers" class="form-label">Kilomètrage</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="Kilomètrage..." id="kilometers" name="kilometers" >
                </div>
                <div class="col">
                    <label for="years" class="form-label">Mise en circulation</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="Année..." id="years" name="years" >
                </div>
                <div class="col">
                    <label for="price" class="form-label">Prix</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="Prix..." id="price" name="price" >
                </div>
            <div class="row">
                <div class="col">
                    <label for="color" class="form-label">Couleur</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="Couleur..." id="color" name="color" >
                </div>
                <div class="col">
                    <label for="energie" class="form-label">Energie</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="Energie..." id="energie" name="energie" >
                </div>
            </div>
            </div>
            <div class="py-2">
                <label for="file">Choix d'image principal</label>
                <input class="px-2" type="file" name="image">
            </div>
            <h3>Les options</h3>
            <div class="d-flex justify-content-evenly gap-2 flex-wrap">
                <?php foreach($listeOptions as $option){?>    
                    <div class="p-2 gap-2 d-flex justify-content-start flex-wrap">
                        <input type="checkbox" name="option_<?=$option['option_id'];?>" value="1"><?=$option['option_name'];?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="p-2 d-flex justify-content-end">
            <input class="btn btn-outline-secondary" type="submit" name="save_cars" value="Enregistrer" >
        </div>      
    </form>
</div>
<?php 
    require_once('./templates/footer.php');
?>