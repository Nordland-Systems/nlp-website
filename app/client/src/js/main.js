import GLightbox from "glightbox";

document.addEventListener("DOMContentLoaded", function (event) {

    const menu_button = document.querySelector('[data-behaviour="toggle-menu"]');
    const totopbutton = document.querySelector('[data-behaviour="totopbutton"');
    const sticky_menu = document.querySelector('[data-behaviour="sticky-header"]');

    //Mobile Menubutton
    menu_button.addEventListener('click', () => {
        document.body.classList.toggle('body--show');
    })

    totopbutton.addEventListener('click', () => {
        topFunction();
    })

    //Gallery
    const lightbox = GLightbox({
        selector: '[data-gallery="gallery"]',
        touchNavigation: true,
        loop: true,
    });

    //ListToggleElement
    let listToggleElements = [...document.querySelectorAll('[data-behaviour="list-toggle"]')];
    listToggleElements.forEach((element) => {
        element.addEventListener("click", (e) => {
            e.preventDefault();
            const item = element.parentNode.parentNode;
            item.classList.toggle("list_item--visible")

            listToggleElements.filter(e => e.parentNode.parentNode != item).forEach((e) => {
                e.parentNode.parentNode.classList.remove("list_item--visible")
            });
        })
    });

    //Dark Mode Toggle
    var checkbox = document.querySelector('input[name=darkmode]');
    checkbox.addEventListener('change', function() {
        if(this.checked) {
            document.body.classList.add('theme--dark');
        } else {
            document.body.classList.remove('theme--dark');
        }
    });

    let dark_mode_wanted = window.matchMedia('(prefers-color-scheme: dark)').matches;
    if(dark_mode_wanted){
        document.body.classList.add('theme--dark');
        checkbox.checked = true;
    }

    //SelfToggleElement
    let parentToggleElements = [...document.querySelectorAll('[data-behaviour="parent-toggle"]')];
    parentToggleElements.forEach((element) => {
        element.addEventListener("click", (e) => {
            e.preventDefault();
            const item = element.parentNode;
            item.classList.toggle("list_item--visible")

            listToggleElements.filter(e => e.parentNode.parentNode != item).forEach((e) => {
                e.parentNode.parentNode.classList.remove("list_item--visible")
            });
        })
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

    //Table of Contents
    const textContent = document.querySelector('[data-behaviour="textContent"]');
    const tableofcontents = document.querySelector('[data-behaviour="tableofcontents"]');
    window.onload = function () {
        TableOfContents();
    };
});

function TableOfContents() {
    var toc = "";
    var level = 0;
    var container = document.querySelector(container) || document.querySelector('#contents');
    var output = output || '#toc';
    const textContent = document.querySelector('[data-behaviour="textContent"]');
    const tableofcontents = document.querySelector('[data-behaviour="tableofcontents"]');

    if(textContent != null){
        textContent.innerHTML =
            textContent.innerHTML.replace(
                /<h([\d])>([^<]+)<\/h([\d])>/gi,
                function (str, openLevel, titleText, closeLevel) {
                    if (openLevel != closeLevel) {
                        return str;
                    }

                    if (openLevel > level) {
                        toc += (new Array(openLevel - level + 1)).join('<ul>');
                    } else if (openLevel < level) {
                        toc += (new Array(level - openLevel + 1)).join('</li></ul>');
                    } else {
                        toc += (new Array(level+ 1)).join('</li>');
                    }

                    level = parseInt(openLevel);

                    var anchor = titleText.replace(/ /g, "_");
                    toc += '<li><a href="'+window.location.href+'#' + anchor + '">' + titleText
                        + '</a>';

                    return '<h' + openLevel + '><a href="'+window.location.href+'#' + anchor + '" id="' + anchor + '">'
                        + titleText + '</a></h' + closeLevel + '>';
                }
            );

        if (level) {
            toc += (new Array(level + 1)).join('</ul>');
        }
        tableofcontents.innerHTML += toc;
    }
};

function parallax() {

    let listParallaxElements = [...document.querySelectorAll('[data-behaviour="parallax"]')];
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
