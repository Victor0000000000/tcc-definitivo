<?php
session_start();
if (!isset($_SESSION['cod'])) {
  session_destroy();
  header('Location:index.php');
} 
include('conexao.php');

$uploadBemSucedido = false;
$videoFile = "";
$imagemFile = "";
$mensagemErro = array(); // Usar um array para armazenar várias mensagens de erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $videoDir = "Curta/";
    $imagemDir = "poster/";

    // Verifica se o diretório de vídeos é gravável
    if (!is_writable($videoDir)) {
        $mensagemErro[] = 'O diretório de vídeos não possui permissão de escrita.';
    }

    // Verifica se o diretório de imagens (poster) é gravável
    if (!is_writable($imagemDir)) {
        $mensagemErro[] = 'O diretório de imagens (poster) não possui permissão de escrita.';
    }

    // Função para gerar um nome de arquivo único
    function gerarNomeArquivo($extensao) {
        return uniqid() . '.' . $extensao;
    }

    // Verifica se um arquivo de vídeo foi enviado
    if (isset($_FILES['video']['name']) && !empty($_FILES['video']['name'])) {
        $videoFile = gerarNomeArquivo(pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION));
        $videoPath = $videoDir . $videoFile;

        if (move_uploaded_file($_FILES['video']['tmp_name'], $videoPath)) {
            $mensagemErro[] = "Vídeo enviado com sucesso.";
        } else {
            $mensagemErro[] = "Erro ao enviar o vídeo: " . $_FILES['video']['error'];
        }
    }

    // Verifica se um arquivo de imagem (poster) foi enviado
    if (isset($_FILES['poster']['name']) && !empty($_FILES['poster']['name'])) {
        $imagemFile = gerarNomeArquivo(pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION));
        $imagemPath = $imagemDir . $imagemFile;

        if (move_uploaded_file($_FILES['poster']['tmp_name'], $imagemPath)) {
            $mensagemErro[] = "Imagem (poster) enviada com sucesso.";
        } else {
            $mensagemErro[] = "Erro ao enviar a imagem (poster): " . $_FILES['poster']['error'];
        }
    }

    // Verifica se ocorreram erros até este ponto
    if (!empty($mensagemErro)) {
        // Exibe as mensagens de erro
        foreach ($mensagemErro as $erro) {
            echo $erro . "<br>";
        }
    } else {
        // Resto do código para inserir no banco de dados
        $titulo = $_POST["titulo"];
        $sinopse = $_POST["sinopse"];
        $duracao = $_POST["duracao"];
        $tema = $_POST["tema"];
        $genero = $_POST["genero"];
        $turma = $_POST["turma"];
        $categoria = $_POST["categoria"];
        $ano = $_POST["ano"];

        // Inserir dados no banco de dados
        $sql = "INSERT INTO curta (titulo, video, sinopse, duracao, tema, genero, turma, poster, categoria, ano)
                VALUES ('$titulo', '$videoFile', '$sinopse', '$duracao', '$tema', '$genero', '$turma', '$imagemFile', '$categoria', '$ano')";

        if (mysqli_query($conn, $sql)) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
