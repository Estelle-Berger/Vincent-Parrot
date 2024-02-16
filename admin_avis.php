<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
    $requete = $bdd->prepare("SELECT * FROM send_avis");
    $requete->execute();
    $send_avis = $requete->fetchAll();

    if ($requete->rowCount()>=1){
?>

<div class="container-fluid">
    <div class="d-flex justify-content-evenly gap-2 flex-wrap">
        <?php foreach($send_avis as $avis){ ?>
        <div class="d-flex justify-content-center flex-wrap">
            <div class="p-2 col">
                <div class="card">
                    <div class="d-flex jutify-content-between card-header">
                        <div class="col-11 d-flex align-items-center"><h2 name="avis_save"><?=$avis['avis'];?></h2></div>
                        <div class="col-1 text-end">
                            <div class="d-flex align-self-center">
                                <p class="border rounded p-2" name="note_save"><?=$avis['note'];?>/5</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" name="name_save"><?=$avis['name'];?></h5>
                        <p class="card-text" name="comment_save">" <?=$avis['comment'];?> "</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="d-flex flex-row-reverse p-2 gap-2">        
                            <a href="./lib/save_avis.php?id=<?=$avis['send_avis_id']; ?>" class="btn btn-outline-secondary" role="button">Valider</a>
                        </div>
                        <div class="d-flex flex-row-reverse p-2 gap-2">
                            <a href="./lib/delete_avis.php?id=<?=$avis['send_avis_id'];?>" class="btn btn-outline-secondary" role="button">Supprimer</a>
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