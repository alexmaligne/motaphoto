/* Pagination infinie en Ajax */
let photos = document.querySelector(".photos");

async function addPhotos(){
    let response = await fetch("http://localhost:81/motaphoto/wp-json/wp/v2/photo?per_page=8&page=2", {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Cache-Control': 'no-cache',
        },

    })
    let data = await response.json()

    let categorieResponse = await fetch("http://localhost:81/motaphoto/wp-json/wp/v2/categorie/", {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Cache-Control': 'no-cache',
        },
    })
    let categorieData = await categorieResponse.json()
    console.log(categorieData)

    data.forEach((photo)=>{
        let lien = document.createElement("a")
        lien.href=photo.link
        let div = document.createElement("div")
        div.classList.add("photo")
        div.innerHTML = photo.content.rendered
        
        let divFilterEye = document.createElement("div")
        divFilterEye.classList.add("filterEye")
        let imgIconEye = document.createElement("img")
        imgIconEye.classList.add("iconEye")
        imgIconEye.src = "http://localhost:81/motaphoto/wp-content/themes/theme-motaphoto/img/Icon_eye.png "
        let imgIconFullScreen = document.createElement("img")
        imgIconFullScreen.classList.add("iconFullScreen")
        imgIconFullScreen.src = "http://localhost:81/motaphoto/wp-content/themes/theme-motaphoto/img/Icon_fullscreen.png "

        let spanPhotoReference = document.createElement("span")
        spanPhotoReference.innerText=photo.acf.reference
        spanPhotoReference.setAttribute("class","photoReference")
        let spanPhotoCategorie = document.createElement("span")

        categorieData.forEach((categorie)=>{
            if(categorie.id==photo.categorie[0]){
                spanPhotoCategorie.innerText=categorie.name
            }
        });
        spanPhotoCategorie.setAttribute("class","photoCategorie")

        div.appendChild(divFilterEye)
        divFilterEye.appendChild(imgIconEye)
        div.appendChild(imgIconFullScreen)
        div.appendChild(spanPhotoReference)
        div.appendChild(spanPhotoCategorie)

        lien.appendChild(div)
        photos.appendChild(lien)
    })

    activeLightbox()
}

document.addEventListener("DOMContentLoaded", ()=>{
    let boutonChargerPlus=document.querySelector("#boutonPagination")

boutonChargerPlus.addEventListener("click", ()=>{
    addPhotos()
})
})

function masquerBouton() {
    let bouton = document.getElementById('boutonPagination');
    bouton.style.display = 'none';
}

document.getElementById('boutonPagination').addEventListener('click', function() {
    masquerBouton();
});