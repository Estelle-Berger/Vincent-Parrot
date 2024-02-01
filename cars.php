<?php 
    require_once('header.php');
?>
<div class="m-2 container-fluid">
    <h1 class="p-2">Voiture d'occasion</h1>
    <div class="d-flex justify-content-evenly">
        <div class="card" style="width: 18rem;">
            <img src="./assets/images/voiture.jpg" class="card-img-top" alt="...">
            <div class="px-2 card-body">
                <h5 class="card-title">Marque</h5>
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


<?php 
    require_once('footer.php');
?>