<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="cadastro.css">
		<title>Curta IFC</title>

	</head>

		<body>
				<form action="Salvar.php" method="POST">

					<div class="card">
						<div>
						<img class="logo" src="img/logopng.png">
						</div>
						<br>
							<p class="titulos">Digite seu nome</p>
							<input type="text" name="nome_aluno" class="campo" placeholder="Digite seu nome" required="text">
						<br>
							<p class="titulos">E-mail</p>
							<input type="Email" name="email_aluno" class="campo" placeholder="Digite sua Senha" required="Email">
						<br>
							<p class="titulos">Senha</p>
							<input type="password" name="senha_aluno" class="campo" placeholder="Digite uma senha" required="password">
						<br>
							<p class="titulos">Data de Nascimento</p>
							<input type="date" name="data_nasc" class="campo" required="date">
						<br>
							<p class="titulos">Matricula</p>
							<input type="text" name="matricula_aluno" class="campo" placeholder="Digite sua matricula" required="text">
						<br>
							<p class="titulos">Escolha seu Curso</p>
            						<select class="campo" name="curso">
               						<option selected disabled value="" class="campo">Selecione</option>
                					<option class="campo" value="1">Informática</option>
                					<option class="campo" value="2">Hospedagem</option>
            					</select>
            			<br>

            				<p class="titulos">Escolha sua Turma</p>
            				<select class="campo" name="turma">
            				<option selected disabled value="" class="campo">Selecione</option>
                					<option class="campo" value="1">1°A</option>
                					<option class="campo" value="2">1°B</option>
                					<option class="campo" value="3">1°H</option>
                					<option class="campo" value="4">2°A</option>
                					<option class="campo" value="5">2°B</option>
                					<option class="campo" value="6">2°H</option>
                					<option class="campo" value="7">3°A</option>
                					<option class="campo" value="8">3°B</option>
                					<option class="campo" value="9">3°H</option>
            					</select>
            			<br><br>
            					<p><input type="submit" name="enviar" class="res" value="Registrar"></p>
            		
            				<p class="link">
                			<a class="link" href="login.php">Já possui cadastro?</a>
           					</p>

					</div>

				</form>

		</body>
</html>