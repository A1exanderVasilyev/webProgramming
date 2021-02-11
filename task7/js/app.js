window.addEventListener('load', function () {
    setBodyLoaded();
    setToggleAccordion();
});

function setBodyLoaded() {
    let body = document.getElementsByTagName('body')[0];
    body.classList.add('loaded');
}



function setToggleAccordion() {
    let accordionHeaders = document.querySelectorAll(".accordion_header");
    accordionHeaders.forEach(accordionHeader => {
        accordionHeader.addEventListener("click", event => {
            accordionHeader.classList.toggle("active");
            let toggleIcon = accordionHeader.querySelector(".toggle_plus");
            console.log(toggleIcon);
            toggleIcon.classList.toggle("active");
            let accordionText = accordionHeader.nextElementSibling;
            console.log(accordionText);
            if(accordionHeader.classList.contains("active")) {
                accordionText.style.maxHeight = accordionText.scrollHeight + "px";
            } else {
                accordionText.style.maxHeight = 0;
            }
        })
    })
}