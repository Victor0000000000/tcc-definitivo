<?php

include ("valida_session_perfil.php");
include ("conexao.php");

print_r($cod);

$sql = "DELETE FROM usuarios WHERE cod='$cod'"; 
mysqli_query($conn,$sql) or die("Erro ao tentar excluir registro");
header('location:index.php');
mysqli_close($conn);
?>