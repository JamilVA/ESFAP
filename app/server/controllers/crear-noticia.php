<?php

ini_set('post_max_size', '100M');
ini_set('upload_max_filesize', '100M');

include '../../server/conex.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recuperar valores del formulario
    $titulo = isset($_POST["titulo"]) ? mb_strtoupper($_POST["titulo"], 'UTF-8') : '';
    $texto = isset($_POST["texto"]) ? $_POST["texto"] : '';
    $fecha = date("Y-m-d");
    if ($conn) {
        // Insertar en la base de datos
        $sql = "INSERT INTO noticia (titulo, texto, fecha_publicacion) VALUES ('$titulo', '$texto', '$fecha')";

        error_log($sql);

        if ($conn->query($sql) === TRUE) {
            // Obtener el ID del noticia recién insertado
            $idNoticia = $conn->insert_id;

            // Rutas de las carpetas donde se guardarán los archivos
            $carpetaImagenes = "/src/noticias/portadas";

            if (isset($_FILES["imagen"])) {
                // Obtener extensiones de los archivos
                $extensionImagen = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);

                // Nombres de archivo con el formato ID.extension
                $nombreArchivoImagen = $idNoticia . "." . $extensionImagen;

                // URLs de los archivos
                $urlImagen = $carpetaImagenes . "/$nombreArchivoImagen";

                // Mover archivos a la carpeta de destino
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $urlImagen);

                // Actualizar el registro en la base de datos con las URLs
                $sqlUpdate = "UPDATE noticia SET url_imagen = '$urlImagen' WHERE id = $idNoticia";

                if ($conn->query($sqlUpdate) === TRUE) {
                    echo "Noticia creada con éxito. ID de la noticia: " . $idNoticia;
                } else {
                    echo "Error al actualizar la noticia: " . $conn->error;
                }
            } else {
                echo "Error: No se han enviado los archivos correctamente.";
            }
        } else {
            echo "Error al crear la noticia: " . $conn->error;
        }
    } else {
        echo "Error al conectar a la base de datos." . mysqli_connect_error();
    }

}

?>