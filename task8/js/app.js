//window.addEventListener('load', function () {
//    setBodyLoaded();
//    initScrollButton();
//    setAnimatedBlockLoaded();
//});

$(window).on('load', function () {
    setBodyLoaded();
    initScrollButton();
    setAnimatedBlockLoaded();
})

//$(window).scroll(() => {
//    if ($(window).scrollTop() => 400) {
//        $('#scrollUpButton').addClass('visible');
//    } else {
//        $('#scrollUpButton').removeClass('visible');
//    }
//})

function setBodyLoaded() {
    let body = document.getElementsByTagName('body')[0];
    body.classList.add('loaded');
}

function setAnimatedBlockLoaded() {
    let reached = false;
    const ANIMATED_BLOCK_OFFSET = 300;
    const animatedBlock = document.getElementById('animatedBlock');
    const animatedBlockOffset = animatedBlock.offsetTop;
    const windowHeight = window.innerHeight;

    window.addEventListener('scroll', function () {
        let scrolled = window.pageYOffset;
        if (scrolled + windowHeight > animatedBlockOffset + ANIMATED_BLOCK_OFFSET) {
            if (!reached) {
                animatedBlock.classList.add('loaded');
                reached = true;
            }

        }
    })
}

function initScrollButton() {
    $('#scrollUpButton').click(function () {
        $('html').animate({
            scrollTop: 0,
        }, 500)
    })
}
