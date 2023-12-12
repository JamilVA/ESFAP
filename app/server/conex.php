<?php
$servername = "esfapmua.edu.pe";
$port = 3306; // Puerto de MySQL, ajusta según sea necesario
$username = "esfapmua_host";
$password = "ESF@Pmu@#2020";
$dbname = "esfapmua_web";

// Crear conexión
global $conn;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Si llegas aquí, la conexión fue exitosa
echo "Conexión exitosa";

// Cerrar conexión
// $conn->close();
?>