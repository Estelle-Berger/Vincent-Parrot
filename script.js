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
mybutton.addEventListener("click",() => {
    alert("Votre avis à bien été pris en compte !");
});