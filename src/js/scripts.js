const menuBtn = document.querySelector(".menu-btn")



menuBtn.addEventListener("click", ()=>{
    menuBtn.classList.toggle("active"); 
    if(menuBtn.innerHTML=='<i class="bx bx-menu" id="menu-icon"></i>'){
        menuBtn.innerHTML='<i class="bx bx-x" id="close-icon"></i>';
    }else if(menuBtn.innerHTML=='<i class="bx bx-x" id="close-icon"></i>'){
        menuBtn.innerHTML='<i class="bx bx-menu" id="menu-icon"></i>';
    }
    navigation.classList.toggle("active");
})

const navigation = document.querySelector(".navigation")

