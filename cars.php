<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
    $requete = $bdd->prepare("SELECT MIN(CONVERT(Years,int)) as minYear, MAX(CONVERT(Years,int)) as maxYear, MIN(CONVERT(Price,float)) as minPrice, MAX(CONVERT(Price,float)) as maxPrice, MIN(CONVERT(Kilometers,float)) as minKm, MAX(CONVERT(Kilometers,float)) as maxKm FROM cars");
    $requete->execute();
    $filters = $requete->fetch();
?>

<div class="m-2 container-fluid">
    <h1 class="p-2">Voitures d'occasion</h1>
    <div class="filter-cars d-flex justify-content-evenly flex-wrap">
        <div class="row filter d-flex flex-wrap">
<!-- ------------------ Filtre Km ---------------------------- -->
            <div class="col-4">
                <div class="text-center">
                    <h6 class="fw-bold text-decoration-underline">Kilométrage</h6>
                </div>
                <div class="values">
                    <span id="range1-km"></span>
                    <span>km - </span>
                    <span id="range2-km"></span>
                    <span>km</span>
                </div>
                <div class="container d-flex justify-content-center">
                    <div id="slider-track-km" class="slider-track"></div>
                    <input type="range" min="<?= $filters['minKm']?>" max="<?= $filters['maxKm']?>" 
                    value="<?= $filters['minKm']?>" id="slider-min-km" oninput="slideOneKm()">
                    <input type="range" min="<?= $filters['minKm']?>" max="<?= $filters['maxKm']?>" 
                    value="<?= $filters['maxKm']?>" id="slider-max-km" oninput="slideTwoKm()">
                </div>
                <div class="d-flex justify-content-center">
                    <input class="d-flex justify-content-center" type="reset" value="Réinitialiser" onclick="ResetSilderKm()">
                </div>
            </div>
<!-- ------------------ Filtre Year ---------------------------- -->
            <div class="col-4">
                <div class="text-center">
                    <h6 class="fw-bold text-decoration-underline">Année</h6>
                </div>
                <div class="values">
                    <span id="range1-Year"></span>
                    <span> - </span>
                    <span id="range2-Year"></span>
                </div>
                <div class="container d-flex justify-content-center">
                    <div id="slider-track-Year" class="slider-track"></div>
                    <input type="range" min="<?= $filters['minYear']?>" max="<?= $filters['maxYear']?>" 
                    value="<?= $filters['minYear']?>" id="slider-min-Year" oninput="slideOneYear()">
                    <input type="range" min="<?= $filters['minYear']?>" max="<?= $filters['maxYear']?>" 
                    value="<?= $filters['maxYear']?>" id="slider-max-Year" oninput="slideTwoYear()">
                </div>
                <div class="d-flex justify-content-center">
                    <input class="d-flex justify-content-center" type="reset" value="Réinitialiser" onclick="ResetSilderYear()">
                </div>
            </div>
<!-- ------------------ Filtre Price ---------------------------- -->
            <div class="col-4">
                <div class="text-center">
                    <h6 class="fw-bold text-decoration-underline">Prix</h6>
                </div>
                <div class="values">
                    <span id="range1-Price"></span>
                    <span> € - </span>
                    <span id="range2-Price"></span>
                    <span> €</span>
                </div>
                <div class="container d-flex justify-content-center">
                    <div id="slider-track-Price" class="slider-track"></div>
                    <input type="range" min="<?= $filters['minPrice']?>" max="<?= $filters['maxPrice']?>" 
                    value="<?= $filters['minPrice']?>" id="slider-min-Price" oninput="slideOnePrice()">
                    <input type="range" min="<?= $filters['minPrice']?>" max="<?= $filters['maxPrice']?>" 
                    value="<?= $filters['maxPrice']?>" id="slider-max-Price" oninput="slideTwoPrice()">
                </div>
                <div class="d-flex justify-content-center">
                    <input class="d-flex justify-content-center" type="reset" value="Réinitialiser" onclick="ResetSilderPrice()">
                </div>
            </div>
        </div> 
    </div>             
    <div class="filter_data d-flex justify-content-evenly gap-2 flex-wrap">
        
    </div>
</div>


<?php 
    require_once('./templates/footer.php');
?>