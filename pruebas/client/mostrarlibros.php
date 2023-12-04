<?php
// conex.php debe incluir tu conexión a la base de datos

include '../server/conex.php';

// Consulta para obtener todos los libros
$sql = "SELECT * FROM libro";
$result = $conn->query($sql);

// Comprobar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los libros en formato HTML
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['titulo'] . "</td>";
        echo "<td>" . $row['autores'] . "</td>";
        echo "<td>" . $row['fecha_publicacion'] . "</td>";
        echo "<td>";
        echo "<a href='#' class='btn btn-warning btn-sm' onclick='editarLibro(" . $row['id'] . ")'>";
        echo "<i class='fas fa-edit'></i> Editar</a>";
        echo "<a href='#' class='btn btn-danger btn-sm' onclick='eliminarLibro(" . $row['id'] . ")'>";
        echo "<i class='fas fa-trash'></i> Eliminar</a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay libros disponibles.</td></tr>";
}

// Cerrar conexión
$conn->close();
?>