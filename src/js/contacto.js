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


document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();

    Swal.fire({
        title: 'Enviando correo',
        icon: 'info',
        allowOutsideClick: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        },
    });

    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {

            Swal.close();

            if (xhr.status === 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Correo enviado con éxito',
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al enviar el formulario',
                    text: 'Ha ocurrido un error. Por favor, inténtalo de nuevo.'
                });
            }
        }
    };

    xhr.open('POST', '/src/php/enviar.php', true);
    xhr.send(formData);
});