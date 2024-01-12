let lightbox = document.querySelector('.lightbox')
let lightboxClose = document.querySelector('.lightbox__close')
let iconFullScreenAll = document.querySelectorAll('.iconFullScreen')
let lightboxImg = document.querySelector('.lightbox__container img')
let lightboxNext = document.querySelector('.lightbox__next')
let photoVisionnee = ''


lightboxClose.addEventListener('click',() => {
    lightbox.style.display = 'none'
})

iconFullScreenAll.forEach((iconFullScreen) => {
    iconFullScreen.addEventListener('click', (event) => {
        event.preventDefault()
        lightbox.style.display = 'block'

        let photo = event.target.parentNode
        photoVisionnee = photo
        let imgSource = photo.querySelector('.wp-block-image img')
        
        lightboxImg.src = imgSource.src
    })
})

lightboxNext.addEventListener('click',() => {
    let photoSuivante = photoVisionnee.parentNode.nextSibling
    let imgPhotoSuivante = photoSuivante.querySelector('.wp-block-image img')
    lightboxImg.src = imgPhotoSuivante.src
    photoVisionnee = photoSuivante.querySelector('.photo')
})

