<?php
session_start();

if (!isset($_SESSION['adm'])) {
  session_destroy();
  header('Location:index.php');
} 

include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ano"]) && isset($_POST["turma"]) && isset($_POST["genero"]) && isset($_POST["tema"]) && isset($_POST["categoria"]) && isset($_POST["titulo"]) && isset($_POST["sinopse"]) && isset($_POST["duracao"])) {
        $ano = $_POST["ano"];
        $turma = $_POST["turma"];
        $genero = $_POST["genero"];
        $tema = $_POST["tema"];
        $categoria = $_POST["categoria"];
        $titulo = $_POST["titulo"];
        $sinopse = $_POST["sinopse"];
        $duracao = $_POST["duracao"]; // Recupera a duração do formulário

        // Verificar se o ano fornecido existe na tabela 'ano'
        $verificarAno = "SELECT COUNT(*) FROM ano WHERE cod = $ano";
        $resultadoAno = mysqli_query($conn, $verificarAno);
        $countAno = mysqli_fetch_array($resultadoAno)[0];

        if ($countAno == 0) {
            echo "<script>alert('Ano não encontrado na tabela de anos. Certifique-se de que o ano existe.');</script>";
        } else {
            // Verificar e mover os arquivos de vídeo e imagem (poster)
            $videoDir = "Curta/";
            $posterDir = "poster/";

            $videoFile = $_FILES["video"]["name"];
            $posterFile = $_FILES["poster"]["name"];

            $videoPath = $videoDir . $videoFile;
            $posterPath = $posterDir . $posterFile;

            if (move_uploaded_file($_FILES["video"]["tmp_name"], $videoPath) && move_uploaded_file($_FILES["poster"]["tmp_name"], $posterPath)) {
                // Os arquivos foram movidos com sucesso, agora você pode inserir os dados no banco de dados
                $sql = "INSERT INTO curta (titulo, sinopse, video, poster, duracao, ano, turma, genero, tema, categoria) 
                        VALUES ('$titulo', '$sinopse', '$videoPath', '$posterPath', '$duracao', '$ano', '$turma', '$genero', '$tema', '$categoria')";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Dados inseridos com sucesso!'); window.location='curtas.php';</script>";
                } else {
                    echo "Erro ao inserir dados: " . mysqli_error($conn);
                }
            } else {
                echo "<script>alert('Erro ao mover os arquivos de vídeo e imagem.');</script>";
            }
        }

        mysqli_close($conn);
    } else {
        echo "<script>alert('Certifique-se de preencher todos os campos no formulário.');</script>";
    }
}
?>
