<?php
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
</head>
<body>
    <h1>Listar</h1>

    <a href="votar.php">rggrrgddff</a>
    <?php
    $result_produto = "SELECT * FROM curta";
    $resultado_produto = mysqli_query($conn, $result_produto);

    while($row_produto = mysqli_fetch_assoc($resultado_produto)){
        echo "video ". $row_produto['id'] . "<br>";
    }
    ?>
    
</body>
</html>
