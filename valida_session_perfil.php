<?php
ob_start();
@session_start();

if (!isset($_SESSION['cod'])) {
    unset($_SESSION['cod']);
    session_destroy();
    header('Location:perfil.php');
} else {
    $cod = $_SESSION['cod'];
}
?>

alterar o nome da tabela cadastro pára usuarios
retirar as colunas matricula, turma
adicionar uma coluna para diferenciar ususarios comuns dos administradores