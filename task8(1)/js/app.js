window.addEventListener('load', function () {
    setBodyLoaded();
    setToggleAccordion();
    initScrollButton();
    initScroll();
    initScrollTo();
});

function setBodyLoaded() {
    let body = document.getElementsByTagName('body')[0];
    body.classList.add('loaded');
}



function setToggleAccordion() {
    let accordionHeaders = document.querySelectorAll(".accordion_header");
    accordionHeaders.forEach(accordionHeader => {
        accordionHeader.addEventListener("click", event => {
            
            let toggleIcon = accordionHeader.querySelector(".toggle_plus");
            console.log(toggleIcon);
            let currentActiveAccordionHeader = document.querySelector(".accordion_header.active");
            let currentToggleIcon = document.querySelector(".toggle_plus.active");
            let currentAccordionText = document.querySelector(".accordion_block_text.active");
            let accordionText = accordionHeader.nextElementSibling;
            
            if(currentActiveAccordionHeader && currentActiveAccordionHeader !== accordionHeader) {
           
                currentActiveAccordionHeader.classList.toggle("active");
                currentToggleIcon.classList.toggle("active");
                currentAccordionText.classList.toggle("active");
                currentActiveAccordionHeader.nextElementSibling.style.maxHeight = 0;
            }
            accordionHeader.classList.toggle("active");
            console.log(toggleIcon);
            toggleIcon.classList.toggle("active");
            accordionText.classList.toggle("active");
            
            if(accordionHeader.classList.contains("active")) {
                accordionText.style.maxHeight = accordionText.scrollHeight + "px";
            } else {
                accordionText.style.maxHeight = 0;
            }
        })
    })
}

function initScrollButton() {
    $('#scroll_button').click(function () {
        $('html').animate({
            scrollTop: 0,
        }, 500)
    })
}

function initScroll() {
    $(window).scroll(() => {
        if ($(window).scrollTop() >= 400) {
            $('#scroll_button').addClass('visible')
        } else {
            $('#scroll_button').removeClass('visible')
        }
    })
}

function initScrollTo() {
    $('.js-scroll-to').click((event) => {
        const targetElement = $(event.target.hash);
        $.scrollTo(targetElement, 300);
    })
}