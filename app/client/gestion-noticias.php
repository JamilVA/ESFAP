<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Gestión de Noticias</title>


    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    <link rel="stylesheet" href="./build/css/sidebars.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome (para iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body>
    <section class="sidebar">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="fas fa-external-link-alt"></i>
                <span class="fs-4">Página Web</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white" aria-current="page">
                        <i class="fas fa-home"></i>
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="gestion-libros.php" class="nav-link text-white" aria-current="page">
                        <i class="fas fa-book"></i>
                        Gestión Biblioteca
                    </a>
                </li>
                <li class="nav-item">
                    <a href="gestion-noticias.php" class="nav-link active" aria-current="page">
                        <i class="far fa-newspaper"></i>
                        Gestión Noticias
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/src/img/usuario.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Jamil Vasquez</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </section>

    <main>
        <div class="container-fluid">

            <h1 class="m-4 text-center">Gestión Noticias</h1>

            <form id="crearNoticiaForm" method="post" class="mt-4" enctype="multipart/form-data">
                <h3 class="mb-4">Nueva Noticia</h3>

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>

                <div class="mb-3">
                    <label for="texto" class="form-label">Texto:</label>
                    <textarea class="form-control" id="texto" name="texto" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen:</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                </div>

                <button type="submit" id="enviarFormulario" class="btn btn-success"><i class="fas fa-plus"></i> Agregar
                    Noticia</button>
            </form>

            <div class="row mt-3">
                <div class="col">
                    <h2 class="mb-4">Lista de Noticias</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Texto</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaLibros">
                            <?php

                            include '../server/controllers/mostrar-noticias.php';
                            echo '<tbody id="tablaLibros">' . obtenerNoticias() . '</tbody>';

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="./build/js/sidebars.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#crearNoticiaForm').submit(function (e) {
                e.preventDefault();

                // Obtener el tamaño del archivo
                var fileSize = $('#imagen')[0].files[0].size; // En bytes

                // Convertir el tamaño a megabytes
                var fileSizeMB = fileSize / (1024 * 1024);

                // Verificar si el tamaño excede el límite (20 MB)
                if (fileSizeMB > 20) {
                    // Mostrar una alerta con SweetAlert
                    Swal.fire({
                        icon: 'warning',
                        title: 'Advertencia',
                        text: 'El tamaño del archivo no puede ser mayor a 20 MB.'
                    });
                    return; // Detener el envío del formulario
                }

                var formData = new FormData($('#crearNoticiaForm')[0]);

                Swal.fire({
                    title: 'Guardando Noticia',
                    icon: 'info',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                });

                $.ajax({
                    url: '../server/controllers/crear-noticia.php',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        Swal.close();

                        Swal.fire({
                            title: 'Noticia creada con éxito',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function () {
                            location.reload();
                        }, 1550);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error en la solicitud AJAX", xhr.responseText);

                        Swal.close();

                        Swal.fire({
                            title: 'Error al crear la noticia',
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>