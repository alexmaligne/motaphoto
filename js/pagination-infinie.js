/* Pagination infinie en Ajax */
async function addPhotos(){
    let response=await fetch("http://localhost:81/motaphoto/wp-json/wp/v2/photo", {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Cache-Control': 'no-cache',
        },
    })
    let data=await response.json()
    console.log(data)
}

document.addEventListener("DOMContentLoaded", ()=>{
    let boutonChargerPlus=document.querySelector("#boutonPagination")

boutonChargerPlus.addEventListener("click", ()=>{
    addPhotos()
})
})