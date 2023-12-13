<?php
$servername = "esfapmua.edu.pe";
$port = 3306; // Puerto de MySQL, ajusta según sea necesario
$username = "esfapmua_host";
$password = "ESF@Pmu@#2020";
$dbname = "esfapmua_web";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);

$conn->set_charset("utf8");

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>