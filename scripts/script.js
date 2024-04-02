

let toutesLesEtoiles = $('.stars .star');
toutesLesEtoiles.click(onStarClick);
function onStarClick(event) {
    let etoileClique = $(this);
    let indexClique = etoileClique.data("index");
    //document.getElementById('valeur_etoile').value=indexClique;
    document.cookie = "valeur_etoile = " + (parseInt(indexClique) + 1);
    let parent = $(this).parent();
    parent.find('.star').addClass('stargrey');
	parent.find('.star').removeClass('yellow');
    for (let i = 0; i <= indexClique; i++) {
        let etoile = parent.find('.star[data-index=' + i + ']');
        etoile.addClass('yellow');
		etoile.removeClass('stargrey');
	}
}
const mybutton = document.getElementById("mybutton");

// ------------------------------sécurité du mot de passe--------------------------------------------------
const bcrypt = require('bcryptjs');
// ------------------------------------filtre-----------------------------------------------
//récupération des données de la table et envoyer sur la page web
function filter_data() {
        //chargement de l'animation alors que le produit n'apparaît pas sur la page web
        let action = './lib/fetch.php';
        // Recupération des valeurs  mininum et maximum des sliders
        let mininum_kilometer = sliderOneKm.value;
        let maximum_kilometer = sliderTwoKm.value;
        let mininum_price = sliderOnePrice.value;
        let maximum_price = sliderTwoPrice.value;
        let mininum_year = sliderOneYear.value;
        let maximum_year = sliderTwoYear.value;

    $.ajax({
        url: "./lib/fetch.php",
        method: "POST",
        //defini avec les données que j'envoie
        data: {
            action: action,
            mininum_kilometer: mininum_kilometer,
            maximum_kilometer: maximum_kilometer,
            mininum_price: mininum_price,
            maximum_price: maximum_price,
            mininum_year: mininum_year,
            maximum_year: maximum_year
        },
        //if ajax request success, il reçoit les données du serveur
        success: function(data) {
            $('.filter_data').html(data);
        }
        })
    }

    $(document).ready(function() {
        slideOneKm();
        slideTwoKm();
        slideOneYear();
        slideTwoYear();
        slideOnePrice();
        slideTwoPrice();
});

let minGap = 0;
//------------------ Filtre Km ----------------------------
let sliderTrackKm = document.getElementById("slider-track-km");
let sliderOneKm = document.getElementById("slider-min-km");
let sliderTwoKm = document.getElementById("slider-max-km");
let displayValOneKm = document.getElementById("range1-km");
let displayValTwoKm = document.getElementById("range2-km");
let sliderMinValueKm = document.getElementById("slider-min-km").min;
let sliderMaxValueKm = document.getElementById("slider-min-km").max;

function slideOneKm(){
    if(parseInt(sliderTwoKm.value) - parseInt(sliderOneKm.value) <= minGap){
        sliderOneKm.value = parseInt(sliderTwoKm.value) - minGap;        
    }
    displayValOneKm.textContent = sliderOneKm.value;
    fillColorKm();
    filter_data();
}
function slideTwoKm(){
    if(parseInt(sliderTwoKm.value) - parseInt(sliderOneKm.value) <= minGap){
        sliderTwoKm.value = parseInt(sliderOneKm.value) + minGap;
    }
    displayValTwoKm.textContent = sliderTwoKm.value;
    fillColorKm();
    filter_data();
}
function fillColorKm(){
    percent1 = (sliderOneKm.value / sliderMaxValueKm) * 100;
    percent2 = (sliderTwoKm.value / sliderMaxValueKm) * 100;
    sliderTrackKm.style.background = `linear-gradient(to right, #ebe8e0 ${percent1}%,
        #ebe8e0 ${percent1}%, #ebe8e0 ${percent2}%, #ebe8e0 ${percent2}%)`;
}

function ResetSilderKm(){
    sliderOneKm.value=sliderMinValueKm;
    sliderTwoKm.value=sliderMaxValueKm;
    displayValOneKm.textContent = sliderOneKm.value;
    displayValTwoKm.textContent = sliderTwoKm.value;
    fillColorKm();
    filter_data();
}

//------------------ Filtre Year ----------------------------
let sliderTrackYear = document.getElementById("slider-track-Year");
let sliderOneYear = document.getElementById("slider-min-Year");
let sliderTwoYear = document.getElementById("slider-max-Year");
let displayValOneYear = document.getElementById("range1-Year");
let displayValTwoYear = document.getElementById("range2-Year");
let sliderMinValueYear = document.getElementById("slider-min-Year").min;
let sliderMaxValueYear = document.getElementById("slider-min-Year").max;

function slideOneYear(){
    if(parseInt(sliderTwoYear.value) - parseInt(sliderOneYear.value) <= minGap){
        sliderOneYear.value = parseInt(sliderTwoYear.value) - minGap;        
    }
    displayValOneYear.textContent = sliderOneYear.value;
    fillColorYear();
    filter_data();
}
function slideTwoYear(){
    if(parseInt(sliderTwoYear.value) - parseInt(sliderOneYear.value) <= minGap){
        sliderTwoYear.value = parseInt(sliderOneYear.value) + minGap;
    }
    displayValTwoYear.textContent = sliderTwoYear.value;
    fillColorYear();
    filter_data();
}
function fillColorYear(){
    percent1 = (sliderOneYear.value / sliderMaxValueYear) * 100;
    percent2 = (sliderTwoYear.value / sliderMaxValueYear) * 100;
    sliderTrackYear.style.background = `linear-gradient(to right, #ebe8e0 ${percent1}%,
        #ebe8e0 ${percent1}%, #ebe8e0 ${percent2}%, #ebe8e0 ${percent2}%)`;
}

function ResetSilderYear(){
    sliderOneYear.value=sliderMinValueYear;
    sliderTwoYear.value=sliderMaxValueYear;
    displayValOneYear.textContent = sliderOneYear.value;
    displayValTwoYear.textContent = sliderTwoYear.value;
    fillColorYear();
    filter_data();
}


//------------------ Filtre Price ----------------------------
let sliderTrackPrice = document.getElementById("slider-track-Price");
let sliderOnePrice = document.getElementById("slider-min-Price");
let sliderTwoPrice = document.getElementById("slider-max-Price");
let displayValOnePrice = document.getElementById("range1-Price");
let displayValTwoPrice = document.getElementById("range2-Price");
let sliderMinValuePrice = document.getElementById("slider-min-Price").min;
let sliderMaxValuePrice = document.getElementById("slider-min-Price").max;

function slideOnePrice(){
    if(parseInt(sliderTwoPrice.value) - parseInt(sliderOnePrice.value) <= minGap){
        sliderOnePrice.value = parseInt(sliderTwoPrice.value) - minGap;        
    }
    displayValOnePrice.textContent = sliderOnePrice.value;
    fillColorPrice();
    filter_data();
}
function slideTwoPrice(){
    if(parseInt(sliderTwoPrice.value) - parseInt(sliderOnePrice.value) <= minGap){
        sliderTwoPrice.value = parseInt(sliderOnePrice.value) + minGap;
    }
    displayValTwoPrice.textContent = sliderTwoPrice.value;
    fillColorPrice();
    filter_data();
}
function fillColorPrice(){
    percent1 = (sliderOnePrice.value / sliderMaxValuePrice) * 100;
    percent2 = (sliderTwoPrice.value / sliderMaxValuePrice) * 100;
    sliderTrackPrice.style.background = `linear-gradient(to right, #ebe8e0 ${percent1}%,
        #ebe8e0 ${percent1}%,#ebe8e0 ${percent2}%, #ebe8e0 ${percent2}%)`;
}

function ResetSilderPrice(){
    sliderOnePrice.value=sliderMinValuePrice;
    sliderTwoPrice.value=sliderMaxValuePrice;
    displayValOnePrice.textContent = sliderOnePrice.value;
    displayValTwoPrice.textContent = sliderTwoPrice.value;
    fillColorPrice();
    filter_data();
}