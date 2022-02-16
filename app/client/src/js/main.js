import GLightbox from "glightbox";

document.addEventListener("DOMContentLoaded", function (event) {

    const menu_button = document.querySelector('[data-behaviour="toggle-menu"]');

    menu_button.addEventListener('click', () => {
        document.body.classList.toggle('body--show');
    })

    const lightbox = GLightbox({
        selector: '[data-gallery="gallery"]',
        touchNavigation: true,
        loop: true,
    });

    const sticky_menu = document.querySelector('[data-behaviour="sticky-header"]');

    window.onscroll = function (){
        if (document.documentElement.scrollTop > 30 || document.body.scrollTop > 30){
            sticky_menu.classList.add('menu--fixed');
        } else {
            sticky_menu.classList.remove('menu--fixed');
        }
    }

    window.addEventListener('scroll', () => {
        parallax();
    })
});

function parallax() {

    let listParallaxElements = [...document.querySelectorAll('[data-behaviour="parallax"]')];

    //var parallax = document.querySelector('[data-behaviour="parallax"]');
    listParallaxElements.forEach((parallax, i) => {
        var scrolled = window.pageYOffset - (parallax.parentElement.offsetTop);

        // You can adjust the 0.4 to change the speed
        var coords = (scrolled * parallax.dataset.speed) + 'px'
        parallax.style.transform = 'translateY(' + coords + ')';
    })
  };
