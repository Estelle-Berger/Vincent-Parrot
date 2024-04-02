<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
    $requete = $bdd->prepare("SELECT* FROM cars LIMIT 3");
    $requete->execute();
    $cars = $requete->fetchAll();
    $requete = $bdd->prepare("SELECT * FROM avis WHERE is_valid = 0 LIMIT 5");
    $requete->execute();
    $save_avis = $requete->fetchAll();
?>
<div class="container-fluid">
    <div>
        <div class="p-2">
            <div class="d-flex flex-wrap justify-content-center">
                <div class= "align-self-center flex-wrap">
                    <h1 class="p-2 d-flex justify-content-center">Vincent Parrot</h1>
                    <p class="fs-4 d-flex justify-content-center flex-wrap border rounded-2 p-2" style="max-width: 50rem;">Vincent Parrot, fort de ses 15 années d'expérience dans la réparation automobile, a ouvert son propre garage à Toulouse en 2021.<br>
                Depuis 2 ans, il propose une large gamme de services : réparation de la carrosserie et de la mécanique des voitures ainsi que leur entretien 
                régulier pour garantir leur performance et leur sécurité. De plus, le Garage V.Parrot met en vente des véhicules d'occasion.<br>
                Vincent Parrot considère son atelier comme un véritable lieu de confiance pour ses clients et leurs voitures doivent,selon lui, à tout prix être entre de bonnes mains.
                </p>
                </div>
                
                <div class="p-5 col-md-4 d-flex align-items-center justify-content-center">
                        <img src="./assets/images/vincent.parrot.jpg" alt="image vincent" width="70%">
                </div>
            </div>
        </div>
        <div class="fond">
            <h2 class="p-2">Les services</h2>
            <div  class="p-2 row d-flex justify-content-evenly gap-2 flex-wrap">
                <div class="p-2 d-flex justify-content-evenly gap-2 flex-wrap">
                    <div class="card" style="width: 20rem;">
                        <img src="./assets/images/services_carrosserie.jpg" class="card-img-top" alt="services carrosserie">
                        <div class="card-body">
                            <h5 class="fw-bold">Services carrosserie</h5>
                            <p class="card-text">Le garage propose des travaux de carrosserie et de réparation de l'intérieur de la voiture ainsi que des jantes.</p>
                        </div>
                    </div>
                    <div class="card" style="width: 20rem;">
                        <img src="./assets/images/services_mecanique2.jpg" class="card-img-top" alt="services mécanique">
                        <div class="card-body">
                            <h5 class="fw-bold">Services mécanique</h5>
                            <p class="card-text">Une panne, une casse, un accident ? On s'occupe d'effectuer les diagnostics et réparations mécaniques de votre voiture.</p>
                        </div>
                    </div>
                    <div class="card" style="width: 20rem;">
                        <img src="./assets/images/services_entretien.jpg" class="card-img-top" alt="services entretien">
                        <div class="card-body">
                            <h5 class="fw-bold">Services entretien</h5>
                            <p class="card-text">Besoin d'effectuer une révision ? Notre service rapide vous accueille pour l'ensemble des interventions concernant l'entretien de votre véhicule.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <h2 class="p-2">Les voitures d'occasion</h2>
            <div class="d-flex justify-content-center flex-wrap">
                <?php foreach ($cars as $car ){
                    foreach ($car as $key => $value)
                    $car[$key] = htmlspecialchars($value, ENT_QUOTES,'UTF-8');?>
            <div class="p-2 col">
                <div class="card" style="width: 18rem;">
                    <img src="<?=$car["picture"];?>" class="card-img-top" alt="...">
                    <div class="px-2 card-body">
                        <h5><?=$car["brand"];?></h5>
                        <h6><?=$car["model"];?></h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="px-2 list-group-item"><div><?=$car["years"];?> Mise en circulation<br><?=$car["kilometers"];?> kilomètres</div></li>
                        <li class="px-2 list-group-item"><div><?=$car["fuel"];?></div></li>
                        <li class="px-2 list-group-item"><?=$car["price"];?> €</li>
                    </ul>
                    <div class="card-body">
                        <a href="car.php?car_id=<?=$car["car_id"];?>" class="card-link header-a">Voir le véhicule</a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        </div>
        <div class="fond">
            <h2 class="p-2">Les avis</h2>
            <div class="p-2 d-flex justify-content-center">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner justify-content-center">
                    <?php foreach($save_avis as $avis){
                    foreach ($avis as $key => $value)
                        $avis[$key] = htmlspecialchars($value, ENT_QUOTES,'UTF-8');?>
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center flex-wrap">
                                <div class="p-2 col">
                                    <div class="card" style="width: 18em;">
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
                        </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon border" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon border" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> 
            </div>
        </div>
        <div class="">
            <?php require_once('form_rdv.php');?>
        </div>
    </div>
</div>


<?php 
    require_once('./templates/footer.php');
?>