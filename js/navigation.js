
// Affiche la prévisualisation au survol
thumbnails.forEach((thumbnail) => {
thumbnail.addEventListener("mouseover", function () {
    const index = parseInt(thumbnail.getAttribute("data-index"));
    previewImage.src = thumbnail.href;
    currentIndex = index;
    preview.style.display = "block";
});

thumbnail.addEventListener("mouseout", function () {
    preview.style.display = "none";
});
});

// Navigation vers la photo précédente
prevButton.addEventListener("click", function (event) {
event.preventDefault();
if (currentIndex > 0) {
    currentIndex--;
    updatePreview();
}
});

// Navigation vers la photo suivante
nextButton.addEventListener("click", function (event) {
event.preventDefault();
if (currentIndex < thumbnails.length - 1) {
    currentIndex++;
    updatePreview();
}
});

// Met à jour la prévisualisation en fonction de l'index actuel
function updatePreview() {
const thumbnail = thumbnails[currentIndex];
previewImage.src = thumbnail.href;
};
