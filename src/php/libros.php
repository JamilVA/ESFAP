<?php
include 'conex.php'; // Incluye el archivo de conexión

// Realiza la consulta para obtener los libros
$query = "SELECT * FROM libro";
$result = $conn->query($query);

// Verifica si hay resultados
if ($result->num_rows > 0) {

    // Itera sobre los resultados y muestra los libros
    while ($row = $result->fetch_assoc()) {
        echo '<div class="libro" data-item="' . $row['categoria'] . '">';
        echo '<img src="' . $row['url_portada'] . '" alt="Portada Libro">';
        echo '<div class="content">';
        echo '<h4>' . $row['titulo'] . '</h4>';
        echo '<button class="button" type="button">';
        echo '<span class="button__text">Descargar</span>';
        echo '<span class="button__icon"><i class="bx bx-download"></i></span>';
        echo '</button>';
        echo '<a href="#" class="button-d"></a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<br/>No hay libros disponibles.';
}

// Cierra la conexión
$conn->close();
?>
