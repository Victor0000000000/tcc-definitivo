<?php
include ("valida_session_perfil.php");
include('conexao.php');

$cod = $_POST['cod'];
$senha = $_POST['senha'];

$sql = "UPDATE usuario SET senha='$senha' WHERE cod=$cod";
$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0) {
    header("Location: perfil.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
}