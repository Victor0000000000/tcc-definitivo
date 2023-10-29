<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber dados do formulário
    $ano = $_POST["ano"];
    $turma = $_POST["turma"];
    $genero = $_POST["genero"];
    $tema = $_POST["tema"];
    $categoria = $_POST["categoria"];

    // Processar arquivos enviados
    $video = $_FILES["video"]["name"];
    $videoTemp = $_FILES["video"]["tmp_name"];
    $videoDestino = "curta/" . $video;

    $poster = $_FILES["poster"]["name"];
    $posterTemp = $_FILES["poster"]["tmp_name"];
    $posterDestino = "poster/" . $poster;

    // Mover arquivos para o destino
    move_uploaded_file($videoTemp, $videoDestino);
    move_uploaded_file($posterTemp, $posterDestino);

    // Inserir dados no banco de dados (sem especificar o campo de cod, pois ele será gerado automaticamente)
    $sql = "INSERT INTO curta (video, poster, ano, turma, genero, tema, categoria) 
            VALUES ('$video', '$poster', '$ano', '$turma', '$genero', '$tema', '$categoria')";

    if (mysqli_query($conn, $sql)) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
