<?php
include('conexao.php');
$uploaddir = "Curta/";
$uploaddir = "poster/";
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

// Verifica se o diretório de upload é gravável
if (!is_writable($uploaddir)) {
    echo 'O diretório não possui permissão de escrita.';
    exit;
}

// Verifica se o arquivo é uma imagem (extensões permitidas: jpg, png, gif)
$allowed_extensions = array('jpg', 'png', 'gif');
$file_extension = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
if (!in_array($file_extension, $allowed_extensions)) {
    echo 'Apenas arquivos de imagem são permitidos (jpg, png, gif).';
    exit;
}

// Move o arquivo para o diretório de upload
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Arquivo enviado com sucesso.";
} else {
    echo "Erro ao enviar o arquivo.";
    exit;
}

// Sanitize e validar outros dados do formulário
$ano = mysqli_real_escape_string($conn, $_POST['ano']);
$titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
$duracao = mysqli_real_escape_string($conn, $_POST['duracao']);
$sinopse = mysqli_real_escape_string($conn, $_POST['sinopse']);
$tema = mysqli_real_escape_string($conn, $_POST['tema']);
$genero = mysqli_real_escape_string($conn, $_POST['genero']);
$turma = mysqli_real_escape_string($conn, $_POST['turma']);

// Verifica se o ano existe na tabela ano
$anoExistente = mysqli_query($conn, "SELECT ano FROM ano WHERE cod = $ano");

if (mysqli_num_rows($anoExistente) > 0) {
    // O ano existe na tabela ano, pode inserir na tabela curta
    $poster = mysqli_real_escape_string($conn, basename($_FILES['userfile']['name']));
    $sql = "INSERT INTO curta (titulo, duracao, sinopse, tema, genero, ano, turma, poster) VALUES ('$titulo', '$duracao', '$sinopse', '$tema', '$genero', '$ano', '$turma', '$poster')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Curta cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o curta: " . mysqli_error($conn);
    }
} 
if (empty($_POST['ano']) || empty($_POST['titulo']) || empty($_POST['duracao']) || empty($_POST['sinopse']) || empty($_POST['tema']) || empty($_POST['genero']) || empty($_POST['turma'])) {
    header("Location: curtas.php?erro=Campos obrigatórios não preenchidos");
    exit;
}
mysqli_close($conn);
?>
