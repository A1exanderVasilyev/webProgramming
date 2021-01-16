//"use strict";
//
//window.addEventListener('load', function () {
//    setBodyLoaded();
//    setAnimatedBlockLoaded();
//});
//
//function setBodyLoaded() {
//    let body = document.getElementsByTagName('body')[0];
//    body.classList.add('loaded');
//}
//
//function setAnimatedBlockLoaded() {
//    let reached = false;
//    const ANIMATED_BLOCK_OFFSET = 300;
//    const animatedBlock = document.getElementById('animatedBlock');
//    const animatedBlockOffset = animatedBlock.offsetTop;
//    const windowHeight = window.innerHeight;
//
//    window.addEventListener('scroll', function () {
//        let scrolled = window.pageYOffset;
//        if (scrolled + windowHeight > animatedBlockOffset + ANIMATED_BLOCK_OFFSET) {
//            if (!reached) {
//                animatedBlock.classList.add('loaded');
//                reached = true;
//            }
//
//        }
//    })
//}

//let name = prompt('Как к вам обращаться?');
//if (!name) {
//    name = 'мой друг';
//}
//alert('Привет, ' + name + '! Добро пожаловать на сайт университета!');

var fonWrapper = window.document.getElementById('top_background');
var age = prompt('Сколько Вам лет?');
if (age < 18) {
    fonWrapper.classList.add('young_age_fon')
} else if (age >= 18 && age < 35) {
    fonWrapper.classList.add('middle_age_fon');
} else {
    fonWrapper.classList.add('old_age_fon');
}