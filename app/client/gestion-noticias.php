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


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
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

            <!-- Botón para agregar un nuevo libro -->
            <div class="row mt-3">
                <div class="col">
                    <a href="#" class="btn btn-success">
                        <i class="fas fa-plus"></i> Agregar Libro
                    </a>
                </div>
            </div>

            <!-- Tabla para mostrar la información de los libros -->
            <div class="row mt-3">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Autores</th>
                                <th>Fecha de Publicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include 'mostrarlibros.php';?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="./build/js/sidebars.js"></script>
</body>

</html>