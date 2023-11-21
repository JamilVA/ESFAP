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

    // Envía el formulario utilizando AJAX
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Éxito: Muestra un cuadro de diálogo con SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Correo enviado con éxito',
                    text: xhr.responseText
                });
            } else {
                // Error: Muestra un cuadro de diálogo de error con SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error al enviar el formulario',
                    text: 'Ha ocurrido un error. Por favor, inténtalo de nuevo.'
                });
            }
        }
    };

    xhr.open('POST', '../php/enviar.php', true);
    xhr.send(formData);
});