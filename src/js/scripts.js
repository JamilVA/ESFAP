/* NAVBAR RESPONSIVE */
const menuBtn = document.querySelector(".menu-btn");

const menu = document.querySelector(".menu");

menuBtn.addEventListener("click", () => {
    menuBtn.classList.toggle("active");
    if (menuBtn.innerHTML == '<i class="bx bx-menu" id="menu-icon"></i>') {
        menuBtn.innerHTML = '<i class="bx bx-x" id="close-icon"></i>';
    } else if (menuBtn.innerHTML == '<i class="bx bx-x" id="close-icon"></i>') {
        menuBtn.innerHTML = '<i class="bx bx-menu" id="menu-icon"></i>';
    }
    menu.classList.toggle("active");
})


const dropdown = document.querySelectorAll(".dropdown");

for (let i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", () => {
        dropdown[i].classList.toggle("active");
    })
};

/* LAZY LOAD VIDEOS */

document.addEventListener("DOMContentLoaded", function() {
    var lazyVideos = document.querySelectorAll("video[data-src]");

    lazyVideos.forEach(function(video) {
        video.src = video.getAttribute("data-src");
        video.load();
    });
});

/* VIDEO SLIDER */

const btns = document.querySelectorAll(".nav-btn");
const videos = document.querySelectorAll(".video-slider");
const contents = document.querySelectorAll(".content-slider");

let currentSlider = 0;

var sliderNav = function (manual) {
    btns.forEach((btn) => {
        btn.classList.remove("active");
    });

    videos.forEach((video) => {
        video.classList.remove("active");
        video.pause();
        video.currentTime = 0;
    });

    contents.forEach((content) => {
        content.classList.remove("active");
    });

    btns[manual].classList.toggle("active");
    videos[manual].classList.toggle("active");
    contents[manual].classList.toggle("active");
    videos[manual].play();

    currentSlider = manual;
};

btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        sliderNav(i);
    });
});

// Cambio automático cada 15 segundos
setInterval(() => {
    const nextSlider = (currentSlider + 1) % btns.length;
    sliderNav(nextSlider);
}, 12500);

/* PAUSAR SI NO ESTAN EN VISTA */

document.addEventListener("DOMContentLoaded", function() {
    var lazyVideos = document.querySelectorAll(".lazy-video");

    function checkIfInView() {
        lazyVideos.forEach(function(video) {
            var rect = video.getBoundingClientRect();

            // Si el video está en la vista
            if (rect.top >= -300 && rect.bottom <= window.innerHeight+300) {
                if (!video.getAttribute("data-loaded")) {
                    video.src = video.getAttribute("data-src");
                    video.load();
                    video.setAttribute("data-loaded", true);
                }
                video.play();
            } else {
                // Si el video está fuera de la vista, pausar la reproducción
                video.pause();
            }
        });
    }

    // Verificar cuando se carga la página y al desplazarse
    window.addEventListener("scroll", checkIfInView);
    window.addEventListener("resize", checkIfInView);
    document.addEventListener("DOMContentLoaded", checkIfInView);
});





