import GLightbox from "glightbox";

document.addEventListener("DOMContentLoaded", function (event) {

    const menu_button = document.querySelector('[data-behaviour="toggle-menu"]');
    const totopbutton = document.querySelector('[data-behaviour="totopbutton"');
    const sticky_menu = document.querySelector('[data-behaviour="sticky-header"]');
    let listParallaxElements = [...document.querySelectorAll('[data-behaviour="parallax"]')];

    menu_button.addEventListener('click', () => {
        document.body.classList.toggle('body--show');
    })

    const lightbox = GLightbox({
        selector: '[data-gallery="gallery"]',
        touchNavigation: true,
        loop: true,
    });

    window.addEventListener('scroll', () => {
        parallax();

        if (document.documentElement.scrollTop > 30 || document.body.scrollTop > 30){
            sticky_menu.classList.add('menu--fixed');
            totopbutton.classList.add('totop--visible');
        } else {
            sticky_menu.classList.remove('menu--fixed');
            totopbutton.classList.remove('totop--visible');
        }
    })
    parallax();
});

function parallax() {
    //var parallax = document.querySelector('[data-behaviour="parallax"]');
    listParallaxElements.forEach((parallax, i) => {
        var scrolled = window.pageYOffset - (parallax.parentElement.offsetTop);

        // You can adjust the data-speed dataset to set the scroll speed
        var coords = (scrolled * parallax.dataset.speed) + 'px'
        parallax.style.transform = 'translateY(' + coords + ')';
    })
};

function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}