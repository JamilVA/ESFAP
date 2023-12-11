<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Gestión de Libros</title>


    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    <link rel="stylesheet" href="./build/css/sidebars.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome (para iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

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
                    <a href="gestion-libros.php" class="nav-link active" aria-current="page">
                        <i class="fas fa-book"></i>
                        Gestión Biblioteca
                    </a>
                </li>
                <li class="nav-item">
                    <a href="gestion-noticias.php" class="nav-link text-white" aria-current="page">
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

            <h1 class="m-4 text-center">Gestión Biblioteca Virtual</h1>

            <form id="crearLibroForm" method="post" class="mt-4" enctype="multipart/form-data">
                <h3 class="mb-4">Agregar Nuevo Libro</h3>

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>

                <div class="mb-3">
                    <label for="autores" class="form-label">Autores:</label>
                    <input type="text" class="form-control" id="autores" name="autores" required>
                </div>

                <div class="mb-3">
                    <label for="portada" class="form-label">Portada del Libro:</label>
                    <input type="file" class="form-control" id="portada" name="portada" accept="image/*" required>
                </div>

                <div class="mb-3">
                    <label for="archivo" class="form-label">Archivo PDF:</label>
                    <input type="file" class="form-control" id="archivo" name="archivo" accept=".pdf" required>
                </div>

                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Categoría:</label>
                    <select class="form-select" id="categoria_id" name="categoria_id" required>
                        <?php
                        include '../server/controllers/mostrar-categorias.php';

                        $categorias = obtenerCategorias();

                        foreach ($categorias as $categoria) {
                            echo "<option value='" . $categoria['id'] . "'>" . $categoria['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" id="enviarFormulario" class="btn btn-success"><i class="fas fa-plus"></i> Agregar
                    Libro</button>
            </form>

            <!-- Tabla para mostrar la información de los libros -->
            <div class="row mt-3">
                <div class="col">
                    <h2 class="mb-4">Lista de Libros</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Autores</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include '../server/controllers/mostrar-libros.php'; ?>
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
            $('#crearLibroForm').submit(function (e) {
                e.preventDefault(); // Evita el envío del formulario por defecto

                console.log("Formulario enviado"); // Agrega esta línea para verificar si la función se está ejecutando

                // Realiza la solicitud AJAX (solo para probar)
                $.ajax({
                    url: '../server/controllers/crear-libro.php',
                    type: 'post',
                    data: new FormData($('#crearLibroForm')[0]),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        console.log("Éxito en la solicitud AJAX"); // Agrega esta línea para verificar si la solicitud es exitosa

                        Swal.fire({
                            title: 'Libro creado con éxito',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        cargarListaLibros();
                    },
                    error: function (xhr, status, error) {
                        console.error("Error en la solicitud AJAX", xhr.responseText); // Agrega esta línea para verificar si hay errores

                        Swal.fire({
                            title: 'Error al crear el libro',
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                });
            });
            function cargarListaLibros() {
                $.ajax({
                    url: '../server/controllers/mostrar-libros.php',
                    type: 'get',
                    success: function (response) {
                        // Actualizar el contenido de la tabla con la nueva lista de libros
                        $('tbody').html(response);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error al cargar la lista de libros", xhr.responseText);
                    }
                });
            }
        });


    </script>




</body>

</html>