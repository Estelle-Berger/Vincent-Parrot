<?php 
    require_once('../templates/header.php');
?>
<div class="m-2 container-fluid">
    <h1 class="p-2">Voiture d'occasion</h1>
    <div class="filter-cars">
        <div class="filter">
            <div class="text-center"><h6 class="fw-bold text-decoration-underline">Kilométrage</h6></div>
            <div class="values">
                <span class="" id="range1"></span>
                <span>km - </span>
                <span class="" id="range2"></span>
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


    <div class="row">
        <div class="d-flex justify-content-center flex-wrap">
            <div class="p-2 col">
                <div class="card" style="width: 18rem;">
                    <img src="./assets/images/voiture.jpg" class="card-img-top" alt="...">
                    <div class="px-2 card-body">
                        <h5>Marque</h5>
                        <h6>Modèle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="px-2 list-group-item"><div>1985 Mise en circulation<br>15000 kilomètres</div></li>
                        <li class="px-2 list-group-item"><div>Diesel<br>Automatique</div></li>
                        <li class="px-2 list-group-item">45 000 €</li>
                    </ul>
                    <div class="card-body">
                        <a href="car.php" class="card-link">Voir le véhicule</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
    require_once('../templates/footer.php');
?>