/* Pagination infinie en Ajax */
let photos = document.querySelector(".photos");

async function addPhotos(){
    let response=await fetch("http://localhost:81/motaphoto/wp-json/wp/v2/photo?per_page=8&page=2", {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Cache-Control': 'no-cache',
        },

    })
    let data=await response.json()
    console.log(data)

    data.forEach((photo)=>{
        let lien=document.createElement("a")
        lien.href=photo.link
        let div=document.createElement("div")
        div.classList.add("photo")
        div.innerHTML=photo.content.rendered
        
        lien.appendChild(div)
        photos.appendChild(lien)
    })
}

document.addEventListener("DOMContentLoaded", ()=>{
    let boutonChargerPlus=document.querySelector("#boutonPagination")

boutonChargerPlus.addEventListener("click", ()=>{
    addPhotos()
})
})



let cataloguePhotos = document.getElementById('cataloguePhotos');

let ready = false;
let imagesLoaded = 0;
let totalImages = 0;
let photosArray = [];

// Unsplash API
const count = 30;
const apiUrl = "http://localhost:81/motaphoto/wp-json/wp/v2/photo";

// Check if all images were loaded
function imageLoaded() {
  imagesLoaded++;
  if (imagesLoaded === totalImages) {
    ready = true;
    loader.hidden = true;
  }
}

// Helper Function to Set Attributes on DOM Elements
function setAttributes(element, attributes) {
  for (const key in attributes) {
    element.setAttribute(key, attributes[key]);
  }
}

// Create Elements For Links & Photos, Add to DOM
function displayPhotos() {
  imagesLoaded = 0;
  totalImages = photosArray.length;
  // Run function for each object in photosArray
  photosArray.forEach((photo) => {
    // Create <a> to link to full photo
    const item = document.createElement('a');
    setAttributes(item, {
      href: photo.links.html,
      target: '_blank',
    });
    // Create <img> for photo
    const img = document.createElement('img');
    setAttributes(img, {
      src: photo.urls.regular,
      alt: photo.alt_description,
      title: photo.alt_description,
    });
    // Event Listener, check when each is finished loading
    img.addEventListener('load', imageLoaded);
    // Put <img> inside <a>, then put both inside imageContainer Element
    item.appendChild(img);
    imageContainer.appendChild(item);
  });
}
