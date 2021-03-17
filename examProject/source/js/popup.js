let popup = document.getElementById('popup');
let popupClose = document.querySelector('.popup-close');
let popupButtonEnrollment = document.querySelectorAll('.popup-open');
let menu = document.querySelector('.menu_burger');

popupButtonEnrollment.forEach(popupButtonEnrollment => {
    popupButtonEnrollment.addEventListener('click', function () {
        popup.classList.add('open');
        /* menu.classList.add('hidden'); */
    })
})

popupClose.onclick = function () {
    popup.classList.remove('open');
    /* menu.classList.remove('hidden'); */
}
