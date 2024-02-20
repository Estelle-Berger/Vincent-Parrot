<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');


$id = $_GET['car_id'];
$requete = $bdd->prepare("SELECT * FROM cars WHERE cars.car_id = :id");
$requete->bindParam(':id', $id, PDO::PARAM_INT);
$requete->execute();
$cars =$requete->fetchAll();
?>

<div class="m-2 container-fluid">
    <div class="p-2 row d-flex justify-content-evenly flex-wrap">
        <div class="col">
            <div class="p-2">
                <?php foreach($cars as $car){?>
                <h1><?=$car['marque'];?></h1>
            </div>
            <div class="p-2 d-flex justify-content-center">
                <img src="<?=$car['image'];?>"  width="100%" height="100%" alt="<?=$car['marque'];?>">
            </div>
        </div>
        <div class="p-2 col">
            <div class="col">
                <label for="text"class="form-label">Modele</label>
                <p class="text-center border rounded"><?=$car['model'];?></p>
            </div>
            <div class="col">
                <label for="text"class="form-label">Mise en circulation</label>
                <p class="text-center border rounded"><?=$car['years'];?></p>
            </div>
            <div class="col">
                <label for="text"class="form-label">Kilomètres</label>
                <p class="text-center border rounded"><?=$car['kilometers'];?></p>
            </div>
            <div class="col">
                <label for="text"class="form-label">Couleur</label>
                <p class="text-center border rounded"><?=$car['color'];?></p>
            </div>
            <div class="col">
                <label for="text"class="form-label">Carburant</label>
                <p class="text-center border rounded"><?=$car['energie'];?></p>
            </div>
        </div>
            <?php }?>
            <?php 
            $requete = $bdd->prepare("SELECT DISTINCT o.option_name FROM options_cars oc LEFT JOIN options o ON o.option_id=oc.option_id WHERE car_id = :id");
                $requete->bindParam(':id', $id, PDO::PARAM_INT);
                $requete->execute();
                $options =$requete->fetchAll();
                ?>
            <div class="p-2 col">
                <label for="text"class="form-label">Options</label>
                <ul class="text-start border rounded">
                <?php foreach($options as $option){?>
                    <li><?=$option['option_name'];?></li>
                    <?php }?>
                </ul>
            </div>
    </div>
    <div>
        <?php require_once('./form_cars.php') ?>
    </div>
</div>
<?php 
    require_once('./templates/footer.php');
?>