let popup = document.getElementById('popup');
let popupClose = document.querySelector('.popup_close');
let popupButtonForm = document.getElementById('popup_button');
let popupButtonEnrollment = document.querySelectorAll('.enrollment_button');
let menu = document.querySelector('.menu_burger');
console.log(popupButtonForm);
console.log(popupButtonEnrollment);


popupButtonForm.onclick = function() {
    popup.classList.add('open');
    menu.classList.add('hidden');
}

popupButtonEnrollment.forEach(popupButtonEnrollment => {
    popupButtonEnrollment.addEventListener('click', function() {
        popup.classList.add('open');
        menu.classList.add('hidden');
    })
})

popupClose.onclick = function() {
    popup.classList.remove('open');
    menu.classList.remove('hidden');
}
