<?php
//include ("valida_session_perfil.php");
include ("conexao.php");

session_start();
//echo $_SESSION['adm'];
if ($_SESSION['adm']===0) {
  session_destroy();
  header('Location:index.php');
} 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/36b801b814.js" crossorigin="anonymous"></script>
  <title>Cadastrar Curta</title>
   <link rel="stylesheet" href="curtas.css"> 
</head>

<body>

  <!-- Modal cadastro curta -->
  <div id="modal-curta" class="modal-container">
    <div class="modal">
      <form action="salvarcurta.php" method="POST" enctype="multipart/form-data">
        <p class="alinhar">
          <input type="text" name="titulo" class="input-modificar" placeholder="Digite o nome do Curta">
        </p>
        <p class="alinhar">
          <input type="text" name="sinopse" class="input-modificar" placeholder="Digite a Sinopse">
        </p>
        <p class="alinhar">
          <input type="time" name="duracao" class="input-modificar" placeholder="Digite a duração do Curta">
        </p>
        <p class="alinhar">
          <select name="ano" class="input-modificar">
            <option selected disabled value="">Ano de produção</option>
            <!-- ... (opções de ano) ... -->
          </select>
        </p>
        <p class="alinhar">
          <input type="text" name="video" class="input-modificar" placeholder="Insira o link do Curta">
        </p>
        <p class="alinhar">
          <label for="poster">Insira o poster do Curta:</label>
          <input type="file" name="poster" id="poster">
        </p>
        <p>
          <select class="input-modificar" name="turma">
            <!-- ... (opções de turma) ... -->
          </select>
          <select class="input-modificar" name="tema">
            <!-- ... (opções de tema) ... -->
          </select>
          <select class="input-modificar" name="genero">
            <!-- ... (opções de gênero) ... -->
          </select>
        </p>
        <p class="alinhar">
          <input type="submit" name="enviar" class="btn-input-modificar" value="Registrar">
        </p>
      </form>
    </div>
  </div>
</body>

</html>
