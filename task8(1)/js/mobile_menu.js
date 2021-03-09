/*let burger = document.querySelector('.menu_burger');
let nav = document.querySelector('.menu');
console.log(burger);
console.log(nav);

function mobileMenuOn() {
    burger.addEventListener('click', () => {
        let newMenu = nav.classList.toggle('.mobile_menu');
        console.log(newMenu);
        burger.addClass('.open_menu')
        
    })
}*/

/*window.onload = function() {
    let mainMenu = document.querySelector('.menu');
    let burger = document.querySelector('.menu_burger');
    burger.addEventListener('click', function() {
        console.log(mainMenu);
        console.log(burger);
        burger.toggleClass('open');
        mainMenu.toggleClass('mobile_menu');
        
})
}*/

$(document).ready(function() {
    $('.menu_burger').click(function(event) {
        $('.menu_burger, .menu').toggleClass('active')
    })
})