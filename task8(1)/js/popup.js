let popup = document.getElementById('popup');
let popupClose = document.querySelector('.popup_close');
let popupButtonForm = document.getElementById('popup_button');
let popupButtonEnrollment = document.querySelectorAll('.enrollment_button');
console.log(popupButtonForm);
console.log(popupButtonEnrollment);


popupButtonForm.onclick = function() {
    popup.classList.add('open');
}

popupButtonEnrollment.forEach(popupButtonEnrollment => {
    popupButtonEnrollment.addEventListener('click', () => popup.classList.add('open'));
})

popupClose.onclick = function() {
    popup.classList.remove('open');
}
