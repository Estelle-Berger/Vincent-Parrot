<?php 
    require_once('templates/header.php');
    require_once('lib/config.php');

// ------------------------------récuperation des services carrosserie-----------------------------

$id_1 = 1;
$requete = $bdd->prepare("SELECT * FROM services WHERE service_category = :id");
$requete->bindParam(':id', $id_1, PDO::PARAM_INT);
$requete->execute();
$services_carro = $requete->fetchAll();

// ------------------------------récuperation des services mecanique----------------------------------

$id_2 = 2;
$requete = $bdd->prepare("SELECT * FROM services WHERE service_category = :id");
$requete->bindParam(':id', $id_2, PDO::PARAM_INT);
$requete->execute();
$services_meca = $requete->fetchAll();

// ------------------------------récuperation des services entretien----------------------------------

$id_3 = 3;
$requete = $bdd->prepare("SELECT * FROM services WHERE service_category = :id");
$requete->bindParam(':id', $id_3, PDO::PARAM_INT);
$requete->execute();
$services_ent = $requete->fetchAll();

?>

<div class="m-2 container-fluid">
    <h1>Services</h1>
        <div class="p-2 row d-flex justify-content-evenly gap-2 flex-wrap">
            <h2 class="p-3 px-5 text-decoration-underline">Carrosserie</h2>
            <div class="p-2 d-flex justify-content-evenly gap-2 flex-wrap">
                <?php foreach ($services_carro as $service_carro) {
                        foreach($service_carro as $key => $value)
                        $service_carro[$key] = htmlspecialchars($value, ENT_QUOTES,'UTF-8');?>
                <div class="border rounded-2 card" style="width: 18rem;">
                    <img src="<?=$service_carro['service_picture']?>" class="card-img-top" width="200" height="200" style="object-fit: cover;" alt="<?=$service_carro['service_title']?>">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?=$service_carro['service_title']?></h5>
                        <p class="card-text"><?=$service_carro['service_description']?></p>
                        <p class="fw-bold"><?=$service_carro['service_price']?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
            <h2 class="p-3 px-5 text-decoration-underline">Mécanique</h2>
            <div class="p-2 d-flex justify-content-evenly gap-2 flex-wrap">
            <?php foreach ($services_meca as $service_meca) {
                        foreach($service_meca as $key => $value)
                    $service_meca[$key] = htmlspecialchars($value, ENT_QUOTES,'UTF-8');?>
            <div class="border rounded-2 card" style="width: 18rem;">
                <img src="<?=$service_meca['service_picture']?>" class="card-img-top" width="200" height="200" style="object-fit: cover;" alt="<?=$service_meca['service_title']?>">
                <div class="card-body">
                    <h5 class="card-title fw-bold"><?=$service_meca['service_title']?></h5>
                    <p class="card-text"><?=$service_meca['service_description']?></p>
                    <p class="fw-bold"><?=$service_meca['service_price']?></p>
                </div>
            </div>
            <?php } ?>
            </div>
            <h2 class="p-3 px-5 text-decoration-underline">Entretien</h2>
            <div class="p-2 d-flex justify-content-evenly gap-2 flex-wrap">
            <?php foreach ($services_ent as $service_ent) {
                        foreach($service_ent as $key => $value)
                    $service_ent[$key] = htmlspecialchars($value, ENT_QUOTES,'UTF-8');?>
            <div class="border rounded-2 card" style="width: 18rem;">
                <img src="<?=$service_ent['service_picture']?>" class="card-img-top" width="200" height="200" style="object-fit: cover;" alt="<?=$service_ent['service_title']?>">
                <div class="card-body">
                    <h5 class="card-title fw-bold"><?=$service_ent['service_title']?></h5>
                    <p class="card-text"><?=$service_ent['service_description']?></p>
                    <p class="fw-bold"><?=$service_ent['service_price']?></p>
                </div>
            </div>
            <?php } ?>
            </div>
            <div>
                <?php require_once('./form_rdv.php'); ?>
            </div>
        </div>
</div>

<?php 
    require_once('templates/footer.php');
?>