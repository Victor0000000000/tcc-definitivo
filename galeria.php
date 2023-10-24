<?php
include('conexao.php');
// Conexão com o banco de dados (substitua pelas suas informações de conexão)


// Verificar a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Consulta ao banco de dados para obter as imagens
$sql = "SELECT * FROM curta";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Imagens</title>
</head>
<body>

<!-- Exibir imagens da galeria -->
<div class="galeria">
    <?php
    // Loop para exibir as imagens
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<img src="' . $row['poster'] . '" alt="' . $row['nome'] . '">';
    }
    ?>
</div>

</body>
</html>

<?php
// Fechar conexão com o banco de dados
mysqli_close($conn);
?>
