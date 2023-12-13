<?php
include 'conex.php'; // Incluye el archivo de conexión

// Realiza la consulta para obtener los libros
$query = "SELECT * FROM libro";
$result = $conn->query($query);

// Verifica si hay resultados
if ($result->num_rows > 0) {

    // Itera sobre los resultados y muestra los libros
    while ($row = $result->fetch_assoc()) {
        echo '<div class="libro" data-item="' . $row['categoria_id'] . '">';

        echo '<img src="' . $row['url_portada'] . '" alt="Portada Libro">';

        echo '<div class="content">';

        echo '<h4>' . $row['titulo'] . '</h4>';

        echo '<a href="'. $row['url_archivo'] .'" download="'. $row['titulo'] . ' - ' . $row['autores'] .'">';
        echo '<button class="button">Descargar <i class="bx bx-download"></i></button>';
        echo '';

        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<br/>No hay libros disponibles.';
}

// Cierra la conexión
$conn->close();
?>
