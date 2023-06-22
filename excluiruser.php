<?php

include ("valida_session_perfil.php");
include ("conexao.php");

print_r($cod);

$sql = "DELETE FROM usuario WHERE cod='$cod'"; 
mysqli_query($conn,$sql) or die("Erro ao tentar excluir registro");
header('location:login.php');
mysqli_close($conn);
?>