<?php
// conecta o banco de dados
require "conexao.php";

// login 
// inicia a sessão

ob_start();
@session_start();
$nome = $_POST['nome_aluno'];
$senha = $_POST['senha_aluno'];
$matricula = $_POST['matricula_aluno'];



$sql = "SELECT * FROM usuario where nome ='{$nome}' AND matricula = '{$matricula}' AND senha ='{$senha}'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);

if (!empty($row)) { // se existe o usuario
    $_SESSION['cod'] = $row['cod']; // código do usuário
    header('Location:index.php');
} else { // se nao exite o usuario
    unset($_SESSION['cod']);
    header('Location: login.php');
}

?>