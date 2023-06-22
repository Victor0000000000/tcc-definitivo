<?php
include ('conexao.php');

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

echo 'Aqui está mais informações de debug:';
print_r($_FILES);

print "</pre>";

	$poster = basename($_FILES['userfile']['name']);
	$titulo = $_POST['titulo'];
	$sinopse = $_POST['sinopse'];
	$duracao = $_POST['duracao'];
	$ano = $_POST['ano'];
	$video = $_POST['video'];
	$genero = $_POST ['genero'];
	$turma= $_POST ['turma'];
	$tema= $_POST ['tema'];



$sql = "INSERT INTO curta (titulo, duracao, video, sinopse, tema, genero, ano, turma, poster) values ('$titulo', '$duracao', '$video', '$sinopse', '$tema', '$genero', '$ano', '$turma','$poster')"; 

mysqli_query($conn, $sql); // envia para o banco de dados
//echo "Curta Cadastrado!";
//header('location: curtas.php');  

?>