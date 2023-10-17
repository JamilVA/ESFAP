const menuBtn = document.querySelector(".menu-btn");

const menu = document.querySelector(".menu");

menuBtn.addEventListener("click", ()=>{
    menuBtn.classList.toggle("active"); 
    if(menuBtn.innerHTML=='<i class="bx bx-menu" id="menu-icon"></i>'){
        menuBtn.innerHTML='<i class="bx bx-x" id="close-icon"></i>';
    }else if(menuBtn.innerHTML=='<i class="bx bx-x" id="close-icon"></i>'){
        menuBtn.innerHTML='<i class="bx bx-menu" id="menu-icon"></i>';
    }
    menu.classList.toggle("active");
})


const dropdown = document.querySelectorAll(".dropdown");

for(let i = 0; i< dropdown.length;i++){
    dropdown[i].addEventListener("click",()=>{
        dropdown[i].classList.toggle("active");
    })
};






// menu.querySelectorAll(".dropdown").forEach((arrow => {
//     arrow.addEventListener("click",()=>{
//         this.closest(".dropdown").classList.toggle("active");
//     })
// }))
