<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
$requete = $bdd->prepare("SELECT * FROM options");
$requete->execute();
$listeOptions = $requete->fetchAll();
?>

<div class="container-fluid">
    <div class="p-3">
        <h1>Les options</h1>
        <div class="d-flex justify-content-evenly gap-2 flex-wrap">
            <?php foreach($listeOptions as $option){
                    foreach($option as $key => $value)
                $option[$key] = htmlspecialchars($value, ENT_QUOTES,'UTF-8');?>
                <div class="p-2 gap-2 d-flex justify-content-start">
                    <p type="checkbox" name="- Option : <?=$option['option_id'];?>" value="1">- <?=$option['option_name'];?></p>
                </div>
            <?php } ?>
        </div>
    </div>
    <form method="POST" action="">
        <legend>Création d'option</legend>
        <div class="p-2 border rounded-2">
            <div class="row">
            <input type="hidden" name="token" value="<?=htmlspecialchars($_SESSION['token']);?>">
                <div class="col">
                    <label for="option" class="form-label">Nouvelle option</label>
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2"
                    placeholder="nouvelle option..." id="option" name="option">
                </div>
                <div class="p-2">
                    <button type="submit" class="btn btn-outline-secondary" name="save_options">Valider</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php 
    require_once('./templates/footer.php');
?>