<?php
include '../../server/conex.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar valores del formulario
    $titulo = strtoupper($_POST["titulo"]);
    $autores = strtoupper($_POST["autores"]);
    $categoriaId = $_POST["categoria_id"];

    if ($conn) {
        // Insertar en la base de datos
        $sql = "INSERT INTO libro (titulo, autores, categoria_id) VALUES ('$titulo', '$autores', '$categoriaId')";

        if ($conn->query($sql) === TRUE) {
            // Obtener el ID del libro recién insertado
            $idLibro = $conn->insert_id;

            // Rutas de las carpetas donde se guardarán los archivos
            $carpetaPortadas = "/src/libros/portadas";
            $carpetaPDF = "/src/libros/pdf";

            if (isset($_FILES["portada"]) && isset($_FILES["archivo"])) {
                // Obtener extensiones de los archivos
                $extensionPortada = pathinfo($_FILES["portada"]["name"], PATHINFO_EXTENSION);
                $extensionPDF = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);

                // Nombres de archivo con el formato ID.extension
                $nombreArchivoPortada = $idLibro . "." . $extensionPortada;
                $nombreArchivoPDF = $idLibro . "." . $extensionPDF;

                // URLs de los archivos
                $urlPortada = $carpetaPortadas . "/$nombreArchivoPortada";
                $urlArchivo = $carpetaPDF . "/$nombreArchivoPDF";

                // Mover archivos a la carpeta de destino
                move_uploaded_file($_FILES["portada"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $urlPortada);
                move_uploaded_file($_FILES["archivo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $urlArchivo);

                // Actualizar el registro en la base de datos con las URLs
                $sqlUpdate = "UPDATE libro SET url_portada = '$urlPortada', url_archivo = '$urlArchivo' WHERE id = $idLibro";

                if ($conn->query($sqlUpdate) === TRUE) {
                    echo "Libro creado con éxito. ID del libro: " . $idLibro;
                } else {
                    echo "Error al actualizar el libro: " . $conn->error;
                }
            } else {
                echo "Error: No se han enviado los archivos correctamente.";
            }


        } else {
            echo "Error al crear el libro: " . $conn->error;
        }
    } else {
        echo "Error al conectar a la base de datos." . mysqli_connect_error() . "Hola";
    }


}

?>