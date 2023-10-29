<?php
include("conexao.php");

// Consulta para selecionar os dados do banco de dados
$sql = "SELECT poster, titulo, sinopse, duracao, ano FROM curta";
$resultado = mysqli_query($conn, $sql);

// Verifica se a consulta retornou resultados
if (mysqli_num_rows($resultado) > 0) {
    // Loop para exibir os resultados
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<div class='curta'>";
        echo "<img src='poster/{$row['poster']}' alt='Poster do curta'>";
        echo "<h2>{$row['titulo']}</h2>";
        echo "<p>{$row['sinopse']}</p>";
        echo "<p>Duração: {$row['duracao']}</p>";
        echo "<p>Ano: {$row['ano']}</p>";
        echo "</div>";
    }
} else {
    echo "Nenhum curta encontrado no banco de dados.";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
