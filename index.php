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
							
						
            			<br>

					
            			<br><br>
            					<p><input type="submit" name="enviar" class="res" value="Registrar"></p>
            		
            				<p class="link">
                			<a class="link" href="login.php">Já possui cadastro?</a>
           					</p>
							   <p class="link">
                			<a class="link" href="loginadm.php">Entre como adiministrador</a>
           					</p>


					</div>

				</form>

		</body>
</html>