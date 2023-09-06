<?php
/*include ("valida_session_perfil.php");
include('conexao.php');

$cod = $_POST['cod'];
$nome = $_POST['nome'];
//$senha = $_POST['senha'];

$sql = "UPDATE usuarios SET nome='$nome' WHERE cod=$cod";
$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0) {
    header("Location:perfil.php");
} else {
    echo "<script>alert('.');</script>";
}*/

include("valida_session_perfil.php");
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cod = $_POST['cod'];
    $nome = $_POST['nome'];

    // Verifique se o nome foi fornecido e não está vazio
    if (!empty($nome)) {
        // Use consultas preparadas para evitar injeção de SQL
        $sql = "UPDATE usuarios SET nome = ? WHERE cod = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            // Associe os parâmetros
            mysqli_stmt_bind_param($stmt, "si", $nome, $cod);

            // Execute a consulta preparada
            if (mysqli_stmt_execute($stmt)) {
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    // Nome do usuário atualizado com sucesso
                    header("Location: perfil.php");
                    exit;
                } else {
                    echo "<script>alert('Nenhuma alteração foi feita.'); window.location='perfil.php';</script>";
                    exit;
                }
            } else {
                echo "<script>alert('Houve algum erro ao atualizar o nome.'); window.location='perfil.php';</script>";
            }

            // Feche a consulta preparada
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Houve algum erro.'); window.location='perfil.php';</script>";
        }
    } else {
        echo "<script>alert('Nenhum nome foi fornecido.'); window.location='perfil.php';</script>";
    }
}
?>