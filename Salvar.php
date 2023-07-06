<?php 

//conecta com o banco de dados
require "conexao.php";

//dados são salvos pelo metodo de post;

//formulário de cadastro de usuário
	$nome = $_POST['nome_aluno'];
	$email = $_POST['email_aluno'];
	$senha = $_POST['senha_aluno'];
	$data_nasc = $_POST['data_nasc'];
	
	
	

		$sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) values ('$nome', '$email', '$senha', '$data_nasc')"; 

mysqli_query($conn, $sql); // envia para o banco de dados
?>"<script type='text/javascript'>alert('Usuário cadastrado!');</script>";
<?php header('location: telainicial.php');

?>