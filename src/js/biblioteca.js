/* BIBLIOTECA */
let list = document.querySelectorAll('.list');
let libro = document.querySelectorAll('.libro');
for(let i = 0; i<list.length;i++){
    list[i].addEventListener('click', ()=>{
        for(let j = 0;j<list.length;j++){
            list[j].classList.remove('active');
        }
        list[i].classList.add('active');

        let filtro = list[i].getAttribute('data-filter');
        
        console.log(filtro)

        for(let k = 0; k<libro.length;k++){
            libro[k].classList.remove('active');
            libro[k].classList.add('hide');

            if(libro[k].getAttribute('data-item') == filtro || filtro == 'all'){
                libro[k].classList.remove('hide');
                libro[k].classList.add('active');
            }
        }
    })
}