<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
    $requete = $bdd->prepare("SELECT * FROM cars");
    $requete->execute();
    $cars=$requete->fetchAll();
?>

<div class="m-2 container-fluid">
    <h1 class="p-2">Voiture d'occasion</h1>
    <div class="filter-cars">
        <div class="filter">
            <div class="text-center"><h6 class="fw-bold text-decoration-underline">Kilométrage</h6></div>
            <div class="values">
                <span id="range1"></span>
                <span>km - </span>
                <span id="range2"></span>
                <span>km</span>
            </div>
            <div class="container d-flex justify-content-center">
                <div class="slider-track"></div>
                <input type="range" min="10020" max="255065" 
                value="10020" id="slider-min" oninput="slideOne()">
                <input type="range" min="10020" max="255065" 
                value="255065" id="slider-max" oninput="slideTwo()">
            </div>
            <div class="d-flex justify-content-center">
                <input class="d-flex justify-content-center" type="reset" value="Reinisialiser">
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-evenly gap-2 flex-wrap">
    <?php foreach ($cars as $car){?>
        <div class="d-flex justify-content-center flex-wrap">
            <div class="p-2 col">
                <div class="card" style="width: 18rem;">
                    <img src="<?=$car['image'];?>" class="card-img-top" alt="...">
                    <div class="px-2 card-body">
                        <h5><?=$car['marque'];?></h5>
                        <h6><?=$car['model'];?></h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="px-2 list-group-item"><div><?=$car['years'];?> Mise en circulation<br><?=$car['kilometers'];?> kilomètres</div></li>
                        <li class="px-2 list-group-item"><div><?=$car['energie'];?><br>Automatique</div></li>
                        <li class="px-2 list-group-item"><?=$car['price'];?></li>
                    </ul>
                    <div class="card-body">
                        <a href="car.php?car_id=<?=$car['car_id'];?>" class="card-link">Voir le véhicule</a>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>


<?php 
    require_once('./templates/footer.php');
?>