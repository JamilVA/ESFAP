<?php
// conex.php debe incluir tu conexión a la base de datos

include 'conex.php';

// Consulta para obtener todos los libros
$sql = "SELECT * FROM libro";
$result = $conn->query($sql);

// Comprobar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los libros en formato HTML
    while ($row = $result->fetch_assoc()) {
        echo "<div class='libro'>";
        echo "<h4>" . $row['titulo'] . "</h4>";
        echo "<p>" . $row['descripcion'] . "</p>";
        echo "<button class='button' onclick='editarLibro(" . $row['id'] . ")'>Editar</button>";
        echo "<button class='button' onclick='eliminarLibro(" . $row['id'] . ")'>Eliminar</button>";
        echo "</div>";
    }
} else {
    echo "No hay libros disponibles.";
}

// Cerrar conexión
$conn->close();
?>
