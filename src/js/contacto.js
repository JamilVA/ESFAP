const inputs = document.querySelectorAll(".input");

inputs.forEach(i =>{
    i.addEventListener('focus', ()=>{
        console.log(i.parentElement)
        console.log(i.parentNode)
        i.parentNode.classList.add("focus")
        i.parentNode.classList.add("not-empty")
    })
    i.addEventListener('blur', ()=>{
        if(i.value == ""){
            i.parentNode.classList.remove("not-empty")
        }

        i.parentNode.classList.remove("focus")
        
    })
})