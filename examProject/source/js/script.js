window.addEventListener('load', function () {
    headSlideBackground();
});

$(document).ready(function () {
    $('.slider__content').slick({
        infinite: true,
        adaptiveHeight: true,
        variableWidth: true,
    });
});

function headSlideBackground() {
    let headBlock = document.querySelector(".head");
    let sliderButtons = document.querySelectorAll(".slider__button");
    headBlock.classList.add('head__background-first');
    sliderButtons[0].classList.add('active');



    let currentBackground = headBlock.querySelector(".head.active");
    console.log(currentBackground);
    /*     let currentAccordionText = document.querySelector(".accordion_block_text.active");
        let accordionText = accordionHeader.nextElementSibling; */

    sliderButtons[0].onclick = function () {
        sliderButtons[1].classList.remove('active');
        sliderButtons[2].classList.remove('active');
        headBlock.classList.remove('head__background-third');
        headBlock.classList.remove('head__background-second');
        headBlock.classList.add('head__background-first');
        this.classList.add('active');
    };
    sliderButtons[1].onclick = function () {
        sliderButtons[0].classList.remove('active');
        sliderButtons[2].classList.remove('active');
        headBlock.classList.remove('head__background-first');
        headBlock.classList.remove('head__background-third');
        headBlock.classList.add('head__background-second');
        this.classList.add('active');
    };
    sliderButtons[2].onclick = function () {
        sliderButtons[1].classList.remove('active');
        sliderButtons[0].classList.remove('active');
        headBlock.classList.remove('head__background-first');
        headBlock.classList.remove('head__background-second');
        headBlock.classList.add('head__background-third');
        this.classList.add('active');
    };

    /* 
    currentActiveAccordionHeader.classList.toggle("active");
    currentToggleIcon.classList.toggle("active");
    currentAccordionText.classList.toggle("active");
    currentActiveAccordionHeader.nextElementSibling.style.maxHeight = 0;

    accordionHeader.classList.toggle("active");
    console.log(toggleIcon);
    toggleIcon.classList.toggle("active");
    accordionText.classList.toggle("active");

    if (accordionHeader.classList.contains("active")) {
        accordionText.style.maxHeight = accordionText.scrollHeight + "px";
    } else {
        accordionText.style.maxHeight = 0;
    } */

}


let textarea = document.querySelector('textarea');

textarea.addEventListener('keyup', function () {
    if (this.scrollTop > 0) {
        this.style.height = this.scrollHeight + "px";
    }
});