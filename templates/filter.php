<?php 
    require_once('./templates/header.php');
?>
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
    <div class="filter">
        <div class="text-center"><h6 class="fw-bold text-decoration-underline">Prix</h6></div>
            <div class="values">
                <span class="" id="range1-price"></span>
                <span>€ - </span>
                <span class="" id="range2-price"></span>
                <span>€</span>
            </div>
            <div class="container d-flex justify-content-center">
                <div class="slider-track-price"></div>
                <input type="range-price" min="0" max="15000" 
                value="0" id="slider-min-price" oninput="slideOnePrice()">
                <input type="range-price" min="0" max="15000" 
                value="15000" id="slider-max-price" oninput="slideTwoPrice()">
            </div>
            <div class="d-flex justify-content-center">
                <input class="d-flex justify-content-center" type="reset" value="Reinisialiser">
            </div>
    </div>
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


<?php 
    require_once('../templates/footer.php');
?>