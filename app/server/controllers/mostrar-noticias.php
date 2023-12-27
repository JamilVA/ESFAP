<?php
include '../server/conex.php';

function obtenerNoticias()
{
    global $conn;

    $sql = "SELECT * FROM noticia";
    $result = $conn->query($sql);

    // Inicializar una variable para almacenar el contenido
    $contenido = '';

    // Comprobar si hay resultados
    if ($result->num_rows > 0) {
        // Construir el contenido en formato HTML
        while ($row = $result->fetch_assoc()) {
            $contenido .= "<tr>";
            $contenido .= "<td>" . $row['id'] . "</td>";
            $contenido .= "<td>" . $row['titulo'] . "</td>";
            $contenido .= "<td>" . $row['texto'] . "</td>";
            $contenido .= "<td>" . $row['fecha_publicacion'] . "</td>";
            $contenido .= "<td>";
            $contenido .= "<a href='#' class='btn btn-warning btn-sm' style='margin-right: 10px;' onclick='editarLibro(" . $row['id'] . ")'>";
            $contenido .= "<i class='fas fa-edit'></i> Editar</a>";
            $contenido .= "<a href='#' class='btn btn-danger btn-sm ' onclick='eliminarLibro(" . $row['id'] . ")'>";
            $contenido .= "<i class='fas fa-trash'></i> Eliminar</a>";
            $contenido .= "</td>";
            $contenido .= "</tr>";
        }
    } else {
        $contenido .= "<tr><td colspan='5'>No hay noticias disponibles.</td></tr>";
    }

    // Devolver el contenido
    return $contenido;
}
?>
