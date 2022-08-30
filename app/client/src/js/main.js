import GLightbox from "glightbox";

document.addEventListener("DOMContentLoaded", function (event) {

    const menu_button = document.querySelector('[data-behaviour="toggle-menu"]');
    const totopbutton = document.querySelector('[data-behaviour="totopbutton"');
    const sticky_menu = document.querySelector('[data-behaviour="sticky-header"]');

    //Mobile Menubutton
    if(menu_button){
        menu_button.addEventListener('click', () => {
            document.body.classList.toggle('body--show');
        })
    }

    if(totopbutton){
        totopbutton.addEventListener('click', () => {
            topFunction();
        })
    }

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
    if(checkbox){
        checkbox.addEventListener('change', function() {
            if(this.checked) {
                document.body.classList.add('theme--dark');
                if(hasAcceptedCookieConsent) {
                    setCookie("darkmode", true, 30);
                }
            } else {
                document.body.classList.remove('theme--dark');
                if(hasAcceptedCookieConsent) {
                    setCookie("darkmode", false, 30);
                }
            }
        });
    }

    let dark_mode_wanted = window.matchMedia('(prefers-color-scheme: dark)').matches;

    if(hasAcceptedCookieConsent) {
        dark_mode_wanted = getCookie("darkmode");
    }

    if(dark_mode_wanted){
        document.body.classList.add('theme--dark');
        if(checkbox){
            checkbox.checked = true;
        }
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

    //Docs Navigation
    const docsNav = document.querySelector('[data-behaviour="docs-nav"]');
    if(docsNav){
        docsNav.addEventListener('click', (e) => {
            e.preventDefault();
            docsNav.parentElement.classList.toggle('docs-nav--open');
        });
    }

    //Parallax
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
    if(tableofcontents){
        window.onload = function () {
            TableOfContents();
        };
    }

    //Countdown
    const countdown = document.querySelector('[data-behaviour="countdown"]');
    const countdown_hours = document.querySelector('[data-behaviour="countdown_hours"]');
    const countdown_minutes = document.querySelector('[data-behaviour="countdown_minutes"]');
    const countdown_seconds = document.querySelector('[data-behaviour="countdown_seconds"]');
    if(countdown) {
        const countdownDate = new Date(countdown.getAttribute('data-time')).getTime();
        const countdownInterval = setInterval(function() {
            const now = new Date().getTime();
            const distance = countdownDate - now;
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            const totalhours = (days*24)+hours;

            if(totalhours > 0){
                var $countdownStringHours = '<p>' + totalhours + '</p> <p class="small">Stunden</p>';
                countdown_hours.innerHTML = $countdownStringHours;
            } else {
                countdown_hours.classList.add('countdown--hiddenpart');
            }

            if(totalhours < 1 && minutes < 1){
                countdown_minutes.classList.add('countdown--hiddenpart');
            } else {
                if(minutes > 9){
                    countdown_minutes.innerHTML = '<p>' + minutes + '</p> <p class="small">Minuten</p>';
                } else {
                    countdown_minutes.innerHTML = '<p>0' + minutes + '</p> <p class="small">Minuten</p>';
                }
            }

            if(seconds > 9){
                countdown_seconds.innerHTML = '<p>' + seconds + '</p> <p class="small">Sekunden</p>';
            } else {
                countdown_seconds.innerHTML = '<p>0' + seconds + '</p> <p class="small">Sekunden</p>';
            }

            if (distance < 0) {
                clearInterval(countdownInterval);
                countdown.innerHTML = "";
                document.body.classList.add('countdown--ended');
            }
        }, 1000);
    }
});

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/" + "; SameSite=Strict";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

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




//Cookie Consent
let ytelements = document.querySelectorAll('[data-behaviour="youtube_wrap"]');

if(hasAcceptedCookieConsent()){
    ytelements.forEach(element => {

        var yturl = element.children[0].getAttribute('data-src');
        console.log("accepted Cookie found " + yturl);
        element.innerHTML = '<iframe width="560" height="315" src="' + yturl + '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    });
} else {
    ytelements.forEach(element => {
        var yturl = element.getAttribute('data-src');
        element.innerHTML = `
        <div class="youtube_consent_missing">
            <p><b>Du hast unsere Cookies noch nicht akzeptiert!</p></b>
            <p>Deshalb können wir Dir hier kein Youtube-Video anzeigen</p>
            <a class="link--button hollow white" data-behaviour="youtube_accept">Cookies akzeptieren</a>
        </div>
        `;
    });
}

var ytAcceptBtn = document.querySelector('[data-behaviour="youtube_accept"]');
if(ytAcceptBtn){
    ytAcceptBtn.addEventListener("click", function() {
        setCookie('acceptedCookieConsent', 'yes', 30);
        window.location.reload();
        console.log("Cookies accepted!");
    }, false);
}

function hasAcceptedCookieConsent(){
    var hasCookie = false;

    if (document.cookie.split(';').some((item) => item.trim().startsWith('acceptedCookieConsent='))) {
        hasCookie = true;
    }
    return hasCookie;
}
