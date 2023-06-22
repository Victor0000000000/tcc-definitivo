<?php

$servername = "localhost";
$database = "curtaifc";
$username = "root";
$password = "";

// Cria a conexão

$conn = mysqli_connect($servername, $username, $password, $database);

// Checa a conec
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>