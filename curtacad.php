<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ano = $_POST["ano"];
    $turma = $_POST["turma"];
    $genero = $_POST["genero"];
    $tema = $_POST["tema"];
    $categoria = $_POST["categoria"];

    $video = $_FILES["video"]["name"];
    $videoTemp = $_FILES["video"]["tmp_name"];
    $videoDestino = "curta/" . $video;

    $poster = $_FILES["poster"]["name"];
    $posterTemp = $_FILES["poster"]["tmp_name"];
    $posterDestino = "poster/" . $poster;

    $extensoesVideoPermitidas = array("mp4", "avi", "mov");
    $extensoesPosterPermitidas = array("jpg", "jpeg", "png");

    // Obtém a extensão dos arquivos de vídeo e poster
    $extensaoVideo = strtolower(pathinfo($video, PATHINFO_EXTENSION));
    $extensaoPoster = strtolower(pathinfo($poster, PATHINFO_EXTENSION));

    // Verifica se as extensões de vídeo e poster são permitidas
    if (in_array($extensaoVideo, $extensoesVideoPermitidas) && in_array($extensaoPoster, $extensoesPosterPermitidas)) {
        // Move os arquivos para o destino
        move_uploaded_file($videoTemp, $videoDestino);
        move_uploaded_file($posterTemp, $posterDestino);

        // Insere os dados no banco de dados
        $sql = "INSERT INTO curta (video, poster, ano, turma, genero, tema, categoria) 
                VALUES ('$video', '$poster', '$ano', '$turma', '$genero', '$tema', '$categoria')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Dados inseridos com sucesso!'); window.location='curtas.php';</script>";
        } else {
            echo "Erro ao inserir dados: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('São só aceitos arquivos com a extensão de imagem: PNG, JPG, JPEG, e vídeo: MP4, MOV, AVI.');</script>";
    }

    mysqli_close($conn);
}
?>
