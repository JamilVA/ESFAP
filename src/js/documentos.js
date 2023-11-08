/* BIBLIOTECA */
let list = document.querySelectorAll('.list');
let docs = document.querySelectorAll('.doc');
for(let i = 0; i<list.length;i++){
    list[i].addEventListener('click', ()=>{
        for(let j = 0;j<list.length;j++){
            list[j].classList.remove('active');
        }
        list[i].classList.add('active');

        let filtro = list[i].getAttribute('data-filter');
        
        console.log(filtro)

        for(let k = 0; k<docs.length;k++){
            docs[k].classList.remove('active');
            docs[k].classList.add('hide');

            if(docs[k].getAttribute('data-item') == filtro || filtro == 'all'){
                docs[k].classList.remove('hide');
                docs[k].classList.add('active');
            }
        }
    })
}