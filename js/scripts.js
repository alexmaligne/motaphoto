let contactForm = document.querySelector("#contactForm")
let contactLink = document.querySelector("#menu-item-68 a")
let contactBouton = document.querySelector("#contactBTNWithPhotoRef")
let photoRef = document.querySelector(".photoReference")
let refPhotoContactForm = document.querySelector("#refPhotoCForm")
let formulaire = document.querySelector(".wpcf7-form")

contactForm.addEventListener('click', function(event) {
    if (!formulaire.contains(event.target)) {
      closeModal();
    }
  });

function closeModal() {
    contactForm.style.display = 'none';
}

contactLink.addEventListener("click", function (){
    contactForm.style.display = "block"
})

contactBouton.addEventListener("click", function (){
    contactForm.style.display = "block"
    refPhotoContactForm.value = photoRef.innerText
})