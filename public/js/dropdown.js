

export function dropdownFlags(){
    const flagDropdown = document.querySelector('div.dropdown-flags');
    const flagButton = document.querySelector('button.btn-flag');
    flagButton.addEventListener('click',()=>{
        flagDropdown.classList.toggle("show");
    })
}