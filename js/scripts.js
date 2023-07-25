let contactForm = document.querySelector("#contactForm")
let contactLink = document.querySelector("#menu-item-68 a")

contactLink.addEventListener("click", function (){
    contactForm.style.display = "block"
})

window.onclick = function(event) {
    if (event.target == contactForm) {
        contactForm.style.display = "none";
    }
}