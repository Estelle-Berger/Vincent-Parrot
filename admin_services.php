<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');

#----------------récuperation des services-----------------

$requete = $bdd->prepare("SELECT b.categorie_name, a.service_title, a.service_price, a.service_id FROM services a
left join categories b on a.service_categorie = b.categorie_id");
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
        foreach ($services as $service) {?>
        <tr>
            <td><?=$service['categorie_name'];?></td>
            <td><?=$service['service_title'];?></td>
            <td><?=$service['service_price']; ?></td>
            <td><a href="./lib/delete_service.php?id=<?=$service['service_id']?>">Supprimer</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<?php 
    require_once('./templates/footer.php');
?>