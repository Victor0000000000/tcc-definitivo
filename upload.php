<?php
include('conexao.php');

$uploaddir = "poster/";
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo $uploadfile;

if (!is_writable($uploaddir)) {
    echo 'O diretório não possui permissão de escrita.';
}

echo '<pre>';

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Arquivo válido e enviado com sucesso.\n";
} else {
    echo "Possível ataque de upload de arquivo!\n";
}



// Verifica se o ano existe na tabela ano
$ano = mysqli_real_escape_string($conn, $_POST['ano']); // Sanitize o valor antes de usar na consulta SQL
$anoExistente = mysqli_query($conn, "SELECT cod FROM ano WHERE cod = $ano");

if (mysqli_num_rows($anoExistente) > 0) {
    // O ano existe na tabela ano, pode inserir na tabela curta
    $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
    $duracao = mysqli_real_escape_string($conn, $_POST['duracao']);
    $sinopse = mysqli_real_escape_string($conn, $_POST['sinopse']);
    $tema = mysqli_real_escape_string($conn, $_POST['tema']);
    $genero = mysqli_real_escape_string($conn, $_POST['genero']);
    $turma = mysqli_real_escape_string($conn, $_POST['turma']);
    $poster = mysqli_real_escape_string($conn, basename($_FILES['userfile']['name']));

    $sql = "INSERT INTO curta (titulo, duracao, sinopse, tema, genero, ano, turma, poster) VALUES ('$titulo', '$duracao', '$sinopse', '$tema', '$genero', '$ano', '$turma', '$poster')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Curta cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o curta: " . mysqli_error($conn);
    }
} else {
    // O ano não existe na tabela ano, você pode adicionar o ano primeiro ou mostrar uma mensagem de erro
    echo "O ano não existe na tabela ano. Adicione o ano antes de cadastrar o curta.";
}

print_r($_FILES);

print "</pre>";
?>
