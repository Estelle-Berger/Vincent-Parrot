<?php
require_once('config.php');

    //$data = $_POST["data"];
    $minKm = intval($_POST["mininum_kilometer"]);
    $maxKm = intval($_POST["maximum_kilometer"]);
    $minYear = intval($_POST["mininum_year"]);
    $maxYear = intval($_POST["maximum_year"]);
    $minPrice = intval($_POST["mininum_price"]);
    $maxPrice = intval($_POST["maximum_price"]);
    $requete = $bdd->prepare("SELECT * FROM cars WHERE (convert(kilometers,int)>=:minKm AND convert(kilometers,int)<=:maxKm) AND (convert(years,int)>=:minYear AND convert(years,int)<=:maxYear) AND (convert(price,int)>=:minPrice AND convert(price,int)<=:maxPrice);");
    $requete->execute(
        array(
            "minKm" => $minKm,
            "maxKm" => $maxKm,
            "minYear" => $minYear,
            "maxYear" => $maxYear,
            "minPrice" => $minPrice,
            "maxPrice" => $maxPrice
        )
    );
    $cars=$requete->fetchAll();
    $returndata="";
    foreach ($cars as $car){
        $returndata = $returndata.'<div class="d-flex justify-content-center flex-wrap">
            <div class="p-2 col">
                <div class="card" style="width: 18rem;">
                    <img src="'.$car["image"].'" class="card-img-top" alt="...">
                    <div class="px-2 card-body">
                        <h5>'.$car["marque"].'</h5>
                        <h6>'.$car["model"].'</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="px-2 list-group-item"><div>'.$car["years"].' Mise en circulation<br>'.$car["kilometers"].' kilomètres</div></li>
                        <li class="px-2 list-group-item"><div>'.$car["energie"].'</div></li>
                        <li class="px-2 list-group-item">'.$car["price"].' €</li>
                    </ul>
                    <div class="card-body">
                        <a href="car.php?car_id='.$car["car_id"].'" class="card-link header-a">Voir le véhicule</a>
                    </div>
                </div>
            </div>
        </div>';
    }
    echo $returndata;
    //return $returndata;
    //header("Location: ../admin_rdv.php");
   // exit();


