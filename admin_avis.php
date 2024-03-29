<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
    $requete = $bdd->prepare("SELECT * FROM avis WHERE deal = 1");
    $requete->execute();
    $avis_All = $requete->fetchAll();

    if ($requete->rowCount()>=1){
?>

<div class="container-fluid">
    <div class="d-flex justify-content-center gap-2 flex-wrap">
        <?php foreach($avis_All as $avis){ ?>
        <div class="d-flex justify-items-center flex-wrap">
            <div class="p-2">
                <div class="card">
                    <div class="d-flex jutify-content-between card-header">
                        <div class="col-10 d-flex align-items-center"><h2 name="avis"><?=$avis['avis'];?></h2></div>
                        <div class="col-1 text-end">
                            <div class="d-flex align-self-center">
                                <p class="border rounded p-2" name="note"><?=$avis['note'];?>/5</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" name="name"><?=$avis['name'];?></h5>
                        <p class="card-text" name="comment">" <?=$avis['comment'];?> "</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="d-flex flex-row-reverse p-2 gap-2">
                            <button type="checkbox" value="1" name="avis" class="btn btn-outline-secondary">Valider</button>        
                            <a href="./lib/save_avis.php?id=<?=$avis['avis_id']; ?>" class="btn btn-outline-secondary" role="button">Valider</a>
                        </div>
                        <div class="d-flex flex-row-reverse p-2 gap-2">
                            <a href="./lib/delete_avis.php?id=<?=$avis['avis_id'];?>" class="btn btn-outline-danger" role="button">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php }
    else { ?>
    <div class="p-2 d-flex justify-content-center">
        <p class="border rounded p-2"> AUCUN COMMENTAIRE A MONDERER</p>
    </div>
</div>

<?php
} 
    require_once('./templates/footer.php');
?>