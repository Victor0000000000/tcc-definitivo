<?php 

//conecta com o banco de dados
require "conexao.php";

//dados são salvos pelo metodo de post;

//formulário de cadastro de usuário
	$nome = $_POST['nome_aluno'];
	$email = $_POST['email_aluno'];
	$senha = $_POST['senha_aluno'];
	$datanasc = $_POST['data_nasc'];
	$matricula = $_POST['matricula_aluno'];
	$curso = $_POST ['curso'];
	$turma= $_POST ['turma'];

		$sql = "INSERT INTO usuario (nome, email, senha, data_nasc, matricula, curso, turma) values ('$nome', '$email', '$senha', '$datanasc', '$matricula', '$curso', '$turma')"; 

mysqli_query($conn, $sql); // envia para o banco de dados
?>"<script type='text/javascript'>alert('Usuário cadastrado!');</script>";
<?php header('location: login.php');

?>