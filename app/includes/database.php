<?php
// Establece la conexión con la base de datos
$conexion = new mysqli("tu_servidor", "tu_usuario", "tu_contraseña", "tu_base_de_datos");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Consulta para obtener los libros
$consulta = "SELECT * FROM libros";
$resultado = $conexion->query($consulta);

// Array para almacenar los libros
$libros = array();

// Recorre los resultados y agrega cada libro al array
while ($fila = $resultado->fetch_assoc()) {
    $libros[] = $fila;
}

// Cierra la conexión a la base de datos
$conexion->close();

// Devuelve los datos en formato JSON
echo json_encode($libros);
