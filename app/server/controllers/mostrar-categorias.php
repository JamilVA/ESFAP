<?php
// conex.php debe incluir tu conexión a la base de datos

include '../server/conex.php';

// Consulta para obtener todos los libros
$sql = "SELECT * FROM categoria";
$result = $conn->query($sql);

function obtenerCategorias() {
    global $result;  // Necesitas hacer global $result para acceder a la variable $result fuera del alcance de la función

    $categorias = array();

    if ($result->num_rows > 0) {
        // Recorrer los resultados y almacenarlos en el array $categorias
        while ($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }
    } else {
        echo "No hay categorías disponibles.";
    }

    return $categorias;
}

// Cerrar conexión
$conn->close();
?>