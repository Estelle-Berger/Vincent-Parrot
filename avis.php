<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
    $requete = $bdd->prepare("SELECT * FROM avis WHERE is_valid = 0");
    $requete->execute();
    $save_avis = $requete->fetchAll();
?>

<div class="container-fluid">
    <div class="d-flex justify-content-evenly gap-2 flex-wrap">
        <?php foreach($save_avis as $avis){  ?>
        <div class="d-flex justify-content-center flex-wrap">
            <div class="p-2 col">
                <div class="card" style="width: 20rem;">
                    <div class="d-flex jutify-content-between card-header">
                        <div class="col-10 d-flex align-items-center"><h2><?=$avis['avis'];?></h2></div>
                        <div class="col-1 text-end">
                            <div class="d-flex align-self-center">
                                <p class="border rounded p-2"><?=$avis['note'];?>/5</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?=$avis['name'];?></h5>
                        <p class="card-text avis">" <?=$avis['comment'];?> "</p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div>
        <?php require_once('./form_avis.php'); ?>
    </div>
    
</div>

<?php 
    require_once('./templates/footer.php');
?>