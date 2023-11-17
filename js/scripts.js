let contactForm = document.querySelector("#contactForm")
let contactLink = document.querySelector("#menu-item-68 a")
let contactBouton = document.querySelector("#contactBTNWithPhotoRef")
let photoRef = document.querySelector("#photoReference")
let refPhotoContactForm = document.querySelector("#refPhotoCForm")

contactLink.addEventListener("click", function (){
    contactForm.style.display = "block"
})

contactBouton.addEventListener("click", function (){
    contactForm.style.display = "block"
    refPhotoContactForm.value = photoRef.innerText
    console.log(photoRef)
})

window.onclick = function(event) {
    if (event.target == contactForm) {
        contactForm.style.display = "none";
    }
}
