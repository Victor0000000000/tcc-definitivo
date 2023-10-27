<?php
include('conexao.php');

$uploadBemSucedido = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    if ($uploadBemSucedido) {
        header("Location: galeria.php");
        exit;
    } else {
        echo "Erro ao cadastrar o curta. Por favor, tente novamente.";
    }
}
$videoDir = "Curta/";
if (!is_writable($videoDir)) {
    echo 'O diretório de vídeos não possui permissão de escrita.';
    exit;
}

// Verifica se o diretório de upload para imagens (poster) é gravável.
$imagemDir = "poster/";
if (!is_writable($imagemDir)) {
    echo 'O diretório de imagens (poster) não possui permissão de escrita.';
    exit;
}

// Função para gerar um nome de arquivo único.
function gerarNomeArquivo($extensao) {
    return uniqid() . '.' . $extensao;
}

// Verifica se um arquivo de vídeo foi enviado.
if (isset($_FILES['video']['name']) && !empty($_FILES['video']['name'])) {
    $videoFile = gerarNomeArquivo(pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION));
    $videoPath = $videoDir . $videoFile;

    if (move_uploaded_file($_FILES['video']['tmp_name'], $videoPath)) {
        echo "Vídeo enviado com sucesso.<br>";
    } else {
        echo "Erro ao enviar o vídeo.<br>";
        exit;
    }
} else {
    $videoFile = ""; // Nenhum vídeo enviado
}

// Verifica se um arquivo de imagem (poster) foi enviado.
if (isset($_FILES['poster']['name']) && !empty($_FILES['poster']['name'])) {
    $imagemFile = gerarNomeArquivo(pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION));
    $imagemPath = $imagemDir . $imagemFile;

    if (move_uploaded_file($_FILES['poster']['tmp_name'], $imagemPath)) {
        echo "Imagem (poster) enviada com sucesso.<br>";
    } else {
        echo "Erro ao enviar a imagem (poster).<br>";
        exit;
    }
} else {
    $imagemFile = ""; // Nenhuma imagem enviada
}

// Sanitize e validar outros dados do formulário
$ano = mysqli_real_escape_string($conn, $_POST['ano']);
$titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
$duracao = mysqli_real_escape_string($conn, $_POST['duracao']);
$sinopse = mysqli_real_escape_string($conn, $_POST['sinopse']);
$tema = mysqli_real_escape_string($conn, $_POST['tema']);
$genero = mysqli_real_escape_string($conn, $_POST['genero']);
$turma = mysqli_real_escape_string($conn, $_POST['turma']);
$poster = mysqli_real_escape_string($conn, $_POST['poster']);
$categoria = mysqli_real_escape_string($conn, $_POST['categoria']);

// Verifica se o ano existe na tabela ano
$anoExistente = mysqli_query($conn, "SELECT cod FROM ano WHERE cod = $ano");

if (mysqli_num_rows($anoExistente) > 0) {
    // O ano existe na tabela ano, pode inserir na tabela curta
    $sql = "INSERT INTO curta (protagonista, titulo, video, imagem, sinopse, duracao, Ano, tema, genero, poster, categoria) VALUES ( '$titulo', '$videoFile', '$imagemFile', '$sinopse', '$duracao', '$ano', '$tema', '$genero', '$poster', '$categoria')";
    
    if (mysqli_query($conn, $sql)) {
        // Redireciona para a página "galeria.php" após o sucesso
        header("Location: galeria.php");
        exit;
    } else {
        echo "Erro ao cadastrar o curta: " . mysqli_error($conn);
    }
} 

if (empty($_POST['ano']) || empty($_POST['titulo']) || empty($_POST['duracao']) ||
 empty($_POST['sinopse']) || empty($_POST['tema']) || empty($_POST['genero']) || empty($_POST['turma']))empty($_POST['poster']); {
    header("Location: curtas.php?erro=Campos obrigatórios não preenchidos");
    exit;
}

mysqli_close($conn);
?>


