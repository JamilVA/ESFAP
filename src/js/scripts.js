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

/* VIDEO SLIDER */

const btns = document.querySelectorAll(".nav-btn")
const videos = document.querySelectorAll(".video-slider")

var sliderNav = function (manual) {
    btns.forEach((btn) => {
        btn.classList.remove("active")
    })

    videos.forEach((video) => {
        video.classList.remove("active")
        video.pause();
        video.currentTime = 0;
    })

    btns[manual].classList.toggle("active");
    videos[manual].classList.toggle("active");
    videos[manual].play();
}

btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        sliderNav(i);
    })
})


