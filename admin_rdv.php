<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
    $requete = $bdd->prepare("SELECT * FROM rdv");
    $requete->execute();
    $rdvAll = $requete->fetchAll();
?>

<div class="d-flex justify-content-evenly gap-2 flex-wrap">
    <?php foreach ($rdvAll as $rdv){?>
        <div class="d-flex justify-content-center flex-wrap">
            <div class="p-2 col">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?=$rdv['lastname'];?></li>
                        <li class="list-group-item"><?=$rdv['categorie'];?></li>
                        <li class="list-group-item"><?=$rdv['comment'];?></li>
                        <li class="list-group-item"><?=$rdv['phone'];?></li>
                        <li class="list-group-item"><a href="mailto:<?=$rdv['email'];?>"><?=$rdv['email'];?></a></li>
                        
                    </ul>
                    <div class="d-flex justify-content-between card-footer">
                    <div class="d-flex flex-row-reverse p-2 gap-2">        
                            <a href="./lib/save_rdv.php?id=<?=$rdv['rdv_id']; ?>" class="btn btn-outline-secondary" id="traiter_rdv" role="button">Traité</a>
                        </div>
                        <div class="d-flex flex-row-reverse p-2 gap-2">
                            <a href="./lib/delete_rdv.php?id=<?=$rdv['rdv_id'];?>" class="btn btn-outline-secondary" role="button">Supprimer</a>
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