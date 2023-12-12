<?php
include '../server/conex.php';

function obtenerLibros()
{
    global $conn;

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
            echo "<td>";
            echo "<a href='#' class='btn btn-warning btn-sm' style='margin-right: 10px;' onclick='editarLibro(" . $row['id'] . ")'>";
            echo "<i class='fas fa-edit'></i> Editar</a>";
            echo "<a href='#' class='btn btn-danger btn-sm ' onclick='eliminarLibro(" . $row['id'] . ")'>";
            echo "<i class='fas fa-trash'></i> Eliminar</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No hay libros disponibles.</td></tr>";
    }
}
