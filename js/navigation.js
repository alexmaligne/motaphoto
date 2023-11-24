const slides = [
	{
		"image":"nathalie-0.jpeg",
		"tagLine":""
	},
	{
		"image":"nathalie-1.jpeg",
		"tagLine":""
	},
	{
		"image":"nathalie-2.jpeg",
		"tagLine":""
	},
	{
		"image":"nathalie-3.jpeg",
		"tagLine":""
	}
]

let diaporama = 0
let arrowLeft = document.querySelector("#banner .fleche_precedente");
let arrowRight = document.querySelector("#banner .fleche_suivante");
let imageSlider = document.querySelector(".banner-img");


function bulletPoints() {
	let codeHtml =""

for(let images = 0; images<slides.length; images++){ 

	if(images == diaporama){codeHtml}
	else{
		codeHtml
	}
}

innerHTML = codeHtml
}

bulletPoints()

	arrowLeft.addEventListener("click", function () {
		diaporama = diaporama - 1;

		if(diaporama < 0) {
			diaporama = 3
		}

		imageSlider.src = "/img/slideshow/" + slides[diaporama].image;
		bulletPoints();
});

	arrowRight.addEventListener("click", function () {
		diaporama = diaporama + 1;

		if(diaporama > 3) {
			diaporama = 0
		}

		imageSlider.src = "/img/slideshow/" + slides[diaporama].image;
		bulletPoints();
});