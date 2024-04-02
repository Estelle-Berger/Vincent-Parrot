<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');

#----------------récuperation des services-----------------

$requete = $bdd->prepare("SELECT b.category_name, a.service_title, a.service_price, a.service_id FROM services a
left join categories b on a.service_category = b.category_id");
$requete->execute();
$services =$requete->fetchAll();
?>

<div class="p-3 d-flex justify-content-start">
    <a href="./admin_service.php" class="btn btn-outline-secondary bouton" type="submit">Nouveau service</a>
</div>
<?php if(isset($_SESSION['message_save'])){?>
        <div class="alert alert-success" role="alert"><?=$_SESSION['message_save'];?></div>
        <?php 
    unset($_SESSION["message_save"]);
} ?>
<?php if(isset($_SESSION['message_erreur'])){?>
        <div class="alert alert-danger" role="alert"><?=$_SESSION['message_erreur'];?></div>
        <?php 
    unset($_SESSION["message_erreur"]);
} ?>
<?php if(isset($_SESSION['message_delete'])){?>
        <div class="alert alert-danger" role="alert"><?=$_SESSION['message_delete'];?></div>
        <?php 
    unset($_SESSION["message_delete"]);
} ?>
<div class="px-5">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Catégorie de service</th>
            <th scope="col">Titre</th>
            <th scope="col">Tarif</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        foreach ($services as $service) {
            foreach($service as $key => $value)
            $service[$key]= htmlspecialchars($value, ENT_QUOTES,'UTF-8');?>
        <tr>
            <td><?=$service['category_name'];?></td>
            <td><?=$service['service_title'];?></td>
            <td><?=$service['service_price']; ?></td>
            <td><a href="./lib/delete_service.php?id=<?=$service['service_id']?>" class="header-a">Supprimer</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<?php 
    require_once('./templates/footer.php');
?>