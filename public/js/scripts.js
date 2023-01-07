/**
 * Fonction qui s'occupe d'afficher un dropDown pour choisir sa langue
 */
function dropdownFlags(){
    const flagDropdown = document.querySelector('div.dropdown-flags');
    const flagButton = document.querySelector('button.btn-flag');
    flagDropdown.style.display = "none";
    flagButton.addEventListener('click',()=>{

        if ( flagDropdown.style.display === "none" ){
            flagDropdown.style.display = "block";
            flagDropdown.style.transition = "backgroundColor 0.5s ";

        }else{
            flagDropdown.style.display = "none";
        }
        //flagDropdown.classList.toggle("show");

    })

    const frFlagButton = document.querySelector('button.btn-flag-fr');
    const usFlagButton = document.querySelector('button.btn-flag-us');

    frFlagButton.addEventListener('click',()=>{
        let currentFlag = document.querySelector('img.btn-img');
        currentFlag.src = "image/flags/france.png";
        flagDropdown.style.display = "none";

    })

    usFlagButton.addEventListener('click',()=>{
        let currentFlag = document.querySelector('img.btn-img');
        currentFlag.src = "image/flags/united-states.png";
        flagDropdown.style.display = "none";

    })

}

dropdownFlags();

// Fereme le dropdown si on clique autre part que sur le bouton
window.onclick = function(event) {
    if (!event.target.matches('.btn-flag') && !event.target.matches('.btn-img')&& !event.target.matches('.btn-flag-fr')
        && !event.target.matches('.btn-img-fr') && !event.target.matches('.btn-flag-fr') && !event.target.matches('.btn-img-fr')) {
        const flagDropdown = document.querySelector('div.dropdown-flags');
        flagDropdown.style.display = "none";


    }
}