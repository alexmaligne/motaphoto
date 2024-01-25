function lightbox() {
    let photoVisionneeNext = ''
    let photoVisionneePrev = ''
    let lightboxClose = document.querySelector('.lightbox__close')
    let iconFullScreenAll = document.querySelectorAll('.iconFullScreen')
    let lightboxNext = document.querySelector('.lightbox__next')
    let lightboxPrev = document.querySelector('.lightbox__prev')

    let lightbox = document.querySelector('.lightbox')

    lightboxClose.addEventListener('click',() => {
        lightbox.style.display = 'none'
    })

    iconFullScreenAll.forEach((iconFullScreen) => {
        iconFullScreen.addEventListener('click', (event) => {
            event.preventDefault()
            lightbox.style.display = 'block'

            let photo = event.target.parentNode
            printCurrentPhoto(photo.parentNode)
            photoVisionneeNext = photo.parentNode.nextSibling
            photoVisionneePrev = photo.parentNode.previousSibling
        })
    })

    lightboxNext.addEventListener('click',() => {
        printCurrentPhoto(photoVisionneeNext)
        photoVisionneePrev = photoVisionneeNext.previousSibling
        photoVisionneeNext = photoVisionneeNext.nextSibling
    })

    lightboxPrev.addEventListener('click',() => {
        printCurrentPhoto(photoVisionneePrev)
        photoVisionneeNext = photoVisionneePrev.nextSibling
        photoVisionneePrev = photoVisionneePrev.previousSibling
    })
}

function printCurrentPhoto(photo) {
    let lightboxNext = document.querySelector('.lightbox__next')
    let lightboxPrev = document.querySelector('.lightbox__prev')
    let lightboxImg = document.querySelector('.lightbox__container img')
    let lightboxPhotoReference = document.querySelector('.lightbox .photoReference')
    let lightboxPhotoCategorie = document.querySelector('.lightbox .photoCategorie')

    if (photo.previousSibling.nodeName != 'A') {
        lightboxPrev.style.display = 'none';
    } else {
        lightboxPrev.style.display = 'flex';
    }

    if (photo.nextSibling.nodeName != 'A') {
        lightboxNext.style.display = 'none';
    } else {
        lightboxNext.style.display = 'flex';
    }

    let imgSource = photo.querySelector('.wp-block-image img')

    lightboxImg.src = imgSource.src

    let referencePhoto = photo.querySelector('.photoReference')
    lightboxPhotoReference.innerText = referencePhoto.innerText
    let categoriePhoto = photo.querySelector('.photoCategorie')
    lightboxPhotoCategorie.innerText = categoriePhoto.innerText
}

function activeLightbox() {

    lightbox()
}

document.addEventListener('DOMContentLoaded', activeLightbox());