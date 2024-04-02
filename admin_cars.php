<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');

#----------------récuperation des cars-----------------
$requete = $bdd->prepare("SELECT car_id, brand, model, price FROM cars");
$requete->execute();
$cars =$requete->fetchAll();
?>

<div class="p-3 d-flex justify-content-start">
    <a href="./admin_car.php" class="btn btn-outline-secondary" type="submit">Nouvelle voiture</a>
</div>
<?php if(isset($_SESSION['message_delete'])){?>
        <div class="alert alert-danger" role="alert"><?=$_SESSION['message_delete'];?></div>
        <?php 
    unset($_SESSION["message_delete"]);
} ?>
<?php if(isset($_SESSION['message_save'])){?>
        <div class="alert alert-success" role="alert"><?=$_SESSION['message_save'];?></div>
        <?php 
    unset($_SESSION["message_save"]);
} ?>
<div class="px-5">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Marque</th>
            <th scope="col">Modele</th>
            <th scope="col">Tarif</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        foreach ($cars as $car) {
            foreach($car as $key => $value)
            $car[$key] = htmlspecialchars($value, ENT_QUOTES,'UTF-8');?>
        <tr>
            <td><?=$car['brand'];?></td>
            <td><?=$car['model'];?></td>
            <td><?=$car['price']; ?> €</td>
            <td><a href="./lib/delete_car.php?id=<?=$car['car_id']?>"class="header-a">Supprimer</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<?php 
    require_once('./templates/footer.php');
?>