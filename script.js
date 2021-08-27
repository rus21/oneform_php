const accordions = document.getElementsByClassName("accordion");

console.log(document.getElementsByTagName('head'));

for (var i = 0; i < accordions.length; i++) {
    accordions[i].onclick = function() {
        this.classList.toggle('is-open');
        if (this.parentElement.classList.contains('accordion-content')) {
            this.parentElement.style.maxHeight = '100%';
        }
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    }
}

function addElementsInHead() {
    let link = document.createElement('link');
    link.setAttribute('rel', 'shortcut icon');
    link.setAttribute('href', './images/itg.svg');
    link.setAttribute('type', 'image/x-icon');
    document.head.appendChild(link);
}

addElementsInHead();

function renderPartials() {
    renderHtml('header', '/partial/header');
    renderHtml('footer', '/partial/footer');
    renderHtml('actual', '/partial/actual-price');
    renderHtml('lead', '/partial/lead');
    renderHtml('hire', '/partial/hire');
    renderHtml('joinlist', '/partial/joinlist');
    renderHtml('comments', '/partial/comments');
    renderHtml('copy', '/partial/copyandshare');
    renderHtml('tip-chrome', '/partial/tipchrome');
    renderHtml('seealso', '/partial/seealso');
    renderHtml('search', '/partial/search');
}

function renderDOMHtmlElement(elementId, partialHTML) {
    var element = document.getElementById(elementId);
    if (element == null) {
        console.log("[renderDOMHtmlElement] Element not found. ElementID: ", elementId);
        element = document.getElementsByClassName(elementId);

        if (element.length > 0) {
            element = element[0];
        } else {
            console.log("[renderDOMHtmlElement] Element not found. ElementClass: ", elementId);
            return;
        }
    }

    element.insertAdjacentHTML('afterbegin', partialHTML);
}

function renderHtml(elementId, path) {
    if (!path || path === "" || typeof path === "undefined") {
        return;
    }

    var request = new XMLHttpRequest();
    request.open('GET', path, true);

    request.onload = function() {
        if (this.status >= 200 && this.status < 400) {
            var resp = this.response;
            renderDOMHtmlElement(elementId, resp);
            if (elementId == 'header') {
                let script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = '/partial/header.js';
                document.getElementsByTagName('head')[0].appendChild(script);
            }
            if (elementId == 'copy' && document.querySelector('.copy-share')) {
                let script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = '/partial/copyandshare.js';
                document.getElementsByTagName('head')[0].appendChild(script);
            }
            if (elementId == 'footer' && document.querySelector('.footer')) {
                let script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = '/partial/footer.js';
                document.getElementsByTagName('head')[0].appendChild(script);
            }
        } else {
            if (this.status === 404) {
                console.log("Error: " + path + " Not Found");
            } else {
                console.log(this.response);
            }
        }
        return;
    };
    request.onerror = function() {
        console.log(this.error);
    };
    request.send();
}

renderPartials();

window.addEventListener('load', function() {
    if (document.querySelector('.glider')) {
        new Glider(document.querySelector('.glider'), {
            slidesToScroll: 3,
            slidesToShow: 3,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        })
    }
})

document.addEventListener("DOMContentLoaded", function(event) {
    window.onresize = function() {
        let tabSize = '768';
        if (window.innerWidth <= tabSize) {
            burgerButton.style.display = 'flex';
        }
        if (window.innerWidth > tabSize) {
            burgerButton.style.display = 'none';
            closeButton.style.display = 'none';
        }

    };
});