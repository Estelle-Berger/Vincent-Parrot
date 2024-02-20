<?php 
    require_once('./templates/header.php');
    require_once('lib/config.php');

    $requete = $bdd->prepare("SELECT * FROM rdv WHERE deal = 0");
    $requete->execute();
    $rdvAll = $requete->fetchAll();
?>
<div class="m-2 container-fluid">
    <h1>Gérer les rendez-vous des clients</h1>
    <div class="p-2 row d-flex justify-content-evenly gap-2 flex-wrap">
        <div class="d-flex justify-content-evenly gap-2 flex-wrap">
            <?php foreach ($rdvAll as $rdv){?>
                <div class="card" style="width: 18rem;">
                    <div class="d-flex jutify-content-between card-header">
                        <div class="col-6 d-flex align-items-center"><h2><?=$rdv['categorie'];?></h2></div>
                        <div class="col-6 text-end">
                            <div class="p-2">
                                <p><?=$rdv['dealby'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><b>Message :</b> <?=$rdv['comment'];?></p>
                        <p><b>Nom du client :</b> <?=$rdv['lastname'];?></p>
                        <p><b>Mail :</b> <a class="header-a" href="mailto:<?=$rdv['email'];?>"><?=$rdv['email'];?></a></p>
                        <p><b>Téléphone :</b> <?=$rdv['phone'];?></p>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <div class="p-2">   
                            <a href="#" class="btn btn-secondary">Supprimer</a>
                        </div> 
                    </div>
                </div>
            <?php }?>
        </div>
    
    </div>
</div>

<?php 
    require_once('./templates/footer.php');
?>