// Animazione reveal
ScrollReveal().reveal('.reveal',{ distance: '50px',duration: 2000,easing:'cubic-bezier(.215,.61,.355, 1)',interval: 600});





// DROPDOWN CATEGORIE PERSONALIZZATO 
let buttonCat = document.querySelector('#buttonCat')
let menuCat = document.querySelectorAll('.menuCat')
let isClicked =true;

function creaCategory() {

    for (let i = 0; i < menuCat.length; i++) {
        
        menuCat[i].classList.remove('d-none');
        menuCat[i].classList.remove('categoryBtnOut');
        menuCat[i].classList.add('categoryBtn');
        menuCat[i].style.animationDelay = `${i * 0.2}s`
        
    }
}
function removeCategory() {

    for (let i = 0; i < menuCat.length; i++) {
        
        menuCat[i].classList.remove('categoryBtn');
        menuCat[i].classList.add('categoryBtnOut');
        menuCat[i].classList.add('d-none');
        // menuCat[i].style.animationDelay = `${i * 0.3}s`
        
    }
}

buttonCat.addEventListener('click', () => {

    if(isClicked){
        creaCategory();
        isClicked = false;
    } else {
        removeCategory();
        isClicked =true;
    }

})


let menuButton = document.querySelector('#menuButton')
let DropdownMenuPhone = document.querySelector('.Dropdown-menuPhone')
let isClickedPhone =true;


menuButton.addEventListener('click', () => {

    if(isClickedPhone){
        DropdownMenuPhone.classList.remove('d-none');
        DropdownMenuPhone.classList.remove('fadePhoneOut');
        DropdownMenuPhone.classList.add('fadePhone');
        isClickedPhone = false;
    } else {
        DropdownMenuPhone.classList.remove('fadePhone');
        DropdownMenuPhone.classList.add('fadePhoneOut');
        DropdownMenuPhone.classList.add('d-none');
        isClickedPhone =true;
    }

})

