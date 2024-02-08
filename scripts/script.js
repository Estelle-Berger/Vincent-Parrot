let toutesLesEtoiles = $('.stars .star');
toutesLesEtoiles.click(onStarClick);
function onStarClick(event) {
    let etoileClique = $(this);
    let indexClique = etoileClique.data("index");
    //document.getElementById('valeur_etoile').value=indexClique;
    document.cookie = "valeur_etoile = " + (parseInt(indexClique) + 1);
    let parent = $(this).parent();
    parent.find('.star').addClass('stargrey');
	parent.find('.star').removeClass('orange');
    for (let i = 0; i <= indexClique; i++) {
        let etoile = parent.find('.star[data-index=' + i + ']');
        etoile.addClass('orange');
		etoile.removeClass('stargrey');
	}
}
const mybutton = document.getElementById("mybutton");
// mybutton.addEventListener("click",() => {
//     alert("Votre avis à bien été pris en compte !");
// });

// ---------filtre--------
window.onload = function(){
    slideOne();
    slideTwo();
}
let sliderOne = document.getElementById("slider-min");

let sliderTwo = document.getElementById("slider-max");
let displayValOne = document.getElementById("range1");
let displayValTwo = document.getElementById("range2");
let minGap = 0;
let sliderTrack = document.querySelector(".slider-track");
let sliderMaxValue = document.getElementById("slider-min").max;

function slideOne(){
    if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
        sliderOne.value = parseInt(sliderTwo.value) - minGap;        
    }
    displayValOne.textContent = sliderOne.value;
    fillColor();
}
function slideTwo(){
    if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
        sliderTwo.value = parseInt(sliderOne.value) + minGap;
    }
    displayValTwo.textContent = sliderTwo.value;
    fillColor();
}
function fillColor(){
    percent1 = (sliderOne.value / sliderMaxValue) * 100;
    percent2 = (sliderTwo.value / sliderMaxValue) * 100;
    sliderTrack.style.background = `linear-gradient(to right, #ebe8e0 ${percent1}%,
        #a8bbb0 ${percent1}%, #a8bbb0 ${percent2}%, #ebe8e0 ${percent2}%)`;
}

window.onload = function(){
    slideOnePrice();
    slideTwoPrice();
}
let sliderOnePrice = document.getElementById("slider-min-price");

let sliderTwoPrice = document.getElementById("slider-max-price");
let displayValOnePrice = document.getElementById("range1-price");
let displayValTwoPrice = document.getElementById("range2-price");
let minGapPrice = 0;
let sliderTrackPrice = document.querySelector(".slider-track-price");
let sliderMaxValuePrice = document.getElementById("slider-min-price").max;

function slideOnePrice(){
    if(parseInt(sliderTwoPrice.value) - parseInt(sliderOnePrice.value) <= minGapPrice){
        sliderOnePrice.value = parseInt(sliderTwoPrice.value) - minGapPrice;        
    }
    displayValOnePrice.textContent = sliderOnePrice.value;
    fillColorPrice();
}
function slideTwoPrice(){
    if(parseInt(sliderTwoPrice.value) - parseInt(sliderOnePrice.value) <= minGapPrice){
        sliderTwoPrice.value = parseInt(sliderOnePrice.value) + minGapPrice;
    }
    displayValTwoPrice.textContent = sliderTwoPrice.value;
    fillColorPrice();
}
function fillColorPrice(){
    percent1 = (sliderOnePrice.value / sliderMaxValuePrice) * 100;
    percent2 = (sliderTwoPrice.value / sliderMaxValuePrice) * 100;
    sliderTrackPrice.style.background = `linear-gradient(to right, #ebe8e0 ${percent1}%,
        #a8bbb0 ${percent1}%, #a8bbb0 ${percent2}%, #ebe8e0 ${percent2}%)`;
}