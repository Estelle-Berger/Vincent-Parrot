<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
    require_once('./lib/auth.php');
    check_auth();
    $requete = $bdd->prepare("SELECT * FROM rdv WHERE deal = 1");
    $requete->execute();
    $rdvAll = $requete->fetchAll();
?>
<div class="p-3 d-flex justify-content-start">
    <a href="./rdv.php" class="btn btn-outline-secondary bouton" type="submit">Liste des rendez-vous traité</a>
</div>
<div class="d-flex justify-content-evenly gap-2 flex-wrap">
    <?php foreach ($rdvAll as $rdv){
        foreach($rdv as $key => $value)
        $rdv[$key] = htmlspecialchars($value, ENT_QUOTES,'UTF-8');?>

        <div class="d-flex justify-content-center flex-wrap">
            <div class="p-2 col">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item fw-bold"><?=$rdv['lastname'];?></li>
                        <li class="list-group-item"><?=$rdv['category'];?></li>
                        <li class="list-group-item"><?=$rdv['comment'];?></li>
                        <li class="list-group-item"><?=$rdv['phone'];?></li>
                        <li class="list-group-item"><a class="header-a" href="mailto:<?=$rdv['email'];?>"><?=$rdv['email'];?></a></li>
                        
                    </ul>
                    <div class="d-flex justify-content-between card-footer">
                    <div class="d-flex flex-row-reverse p-2 gap-2">        
                            <a href="./lib/save_rdv.php?id=<?=$rdv['rdv_id']; ?>" class="btn btn-outline-secondary" role="button">Traité</a>
                        </div>
                        <div class="d-flex flex-row-reverse p-2 gap-2">
                            <a href="./lib/delete_rdv.php?id=<?=$rdv['rdv_id'];?>" class="btn btn-outline-danger" role="button">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</div>
<?php 
    require_once('./templates/footer.php');
?>