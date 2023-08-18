<?php
include ("valida_session_curta.php");
include ("conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/36b801b814.js" crossorigin="anonymous"></script>
  <title>Curtas</title>
  <link rel="stylesheet" href="curtas.css">
</head>

<body>
  <header id="header">
    <a id="logo" href="index.php"><img id="img_logo" src="img/logopng.png"></a>
    <nav id="nav">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
        <span id="hamburger"></span>
      </button>
      <ul id="menu" role="menu">
        <li><button onclick="myFunction()" class="bot"><i class="fas fa-sun"></i></button></li>
        <li><a class="link-menu" href="oficinas.php">Oficinas</a></li>
        <li><a class="link-menu" href="premiacao.php">Premiações</a></li>
        <li><a class="link-menu" href="perfil.php">Perfil</a></li>
        <li><a class="link-menu" href="index.php">Início</a></li>
        <li><a class="link-menu" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
      </ul>
    </nav>
</header>

<main>
  <div class="logo-pagina">
    <img class="logo-apresentacao" src="img/logopreto.jpeg" alt="logo do projeto">
  </div>

  <form action="pesquisa.php" method="POST">
  <div class="input-pagina">
        <select name="genero" class="barra-pesquisa">
          <option selected disabled value="">Genero</option>
          <option value="1">Drama</option>
          <option value="5">Suspense</option>
          <option value="4">Terror</option>
          <option value="6">Romance</option>
          <option value="3">Comédia</option>
          <option value="2">Documentario</option>
        </select>
<select name="tema" class="barra-pesquisa">
          <option selected disabled value="">Tema</option>
          <option value="1">Abuso Infantil</option>
          <option value="2">Homofobia</option>
          <option value="5">Violência a Mulher</option>
          <option value="3">Intolerância Religiosa</option>
          <option value="4">Racismo</option>
          <option value="6">Xenofobia</option>
          <option value="7">Luta Agrária</option>
        </select>
        <select name="ano" class="barra-pesquisa">
          <option selected disabled value="">Ano</option>
          <option value="1">2016</option>
          <option value="2">2017</option>
          <option value="3">2018</option>
          <option value="4">2019</option>
          <option value="5">2020</option>
          <option value="6">2021</option>
          <option value="7">2022</option>
          <option value="8">2023</option>
          <option value="9">2024</option>
          <option value="10">2025</option>
          <option value="11">2026</option>
          <option value="12">2027</option>
          <option value="13">2028</option>
          <option value="14">2029</option>
          <option value="15">2030</option>
          <option value="16">2031</option>
          <option value="17">2032</option>
          <option value="18">2033</option>
          <option value="19">2034</option>
          <option value="20">2035</option>
          <option value="21">2036</option>
          <option value="22">2037</option>
        </select>
        <input type="submit" name="bt_enviar" value="buscar" class="barra-pesquisa" />
  </div> 

</form>

<?php

$sql = "SELECT * FROM usuarios WHERE cod = $cod";
$rs= mysqli_query($conn, $sql);
$user = mysqli_fetch_array($rs);

$nivel_necessario = 2;

  // Verifica se não há a variável da sessão que identifica o usuário
  if ($user['nivel'] == $nivel_necessario) { ?>
        <div class="btn-curta">
    <button class="btn-add">Adicionar Curta</button>
  </div>

<!--Modal cadastro curta-->
<div id="modal-curta" class="modal-container">
  <div class="modal">

    <form enctype="multipart/form-data" action="../php/upload.php" method="POST">
      <button class="fechar">X</button>
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
        Enviar arquivo:
      <input name="userfile" type="file" />
      <input type="hidden" name="MAX_FILE_SIZE" value="50000000" /> 
      </p>
      <p class="alinhar">
          <select name="ano" class="input-modificar">
          <option selected disabled value="">Ano de produção</option>
          <option value="1">2016</option>
          <option value="2">2017</option>
          <option value="3">2018</option>
          <option value="4">2019</option>
          <option value="5">2020</option>
          <option value="6">2021</option>
          <option value="7">2022</option>
          <option value="8">2023</option>
          <option value="9">2024</option>
          <option value="10">2025</option>
          <option value="11">2026</option>
          <option value="12">2027</option>
          <option value="13">2028</option>
          <option value="14">2029</option>
          <option value="15">2030</option>
          <option value="16">2031</option>
          <option value="17">2032</option>
          <option value="18">2033</option>
          <option value="19">2034</option>
          <option value="20">2035</option>
          <option value="21">2036</option>
          <option value="22">2037</option>
        </select>
      </p>
      <p class="alinhar">
        <input type="text" name="video" class="input-modificar" placeholder="Insira o link do Curta">
      </p>
      <p>
        <select class="input-modificar" name="turma">
          <option selected disabled value="">Qual turma produziu</option>
          <option value="1">1°A</option>
          <option value="2">1°B</option>
          <option value="3">1°H</option>
          <option value="4">2°A</option>
          <option value="5">2°B</option>
          <option value="6">2°H</option>
          <option value="7">3°A</option>
          <option value="8">3°B</option>
          <option value="9">3°H</option>
        </select>

        <select class="input-modificar" name="tema">
          <option selected disabled value="">Escolha o Tema</option>
          <option value="1">Abuso Infantil</option>
          <option value="2">Homofobia</option>
          <option value="3">Intolerância Religiosa</option>
          <option value="7">Luta Agrária</option>
          <option value="4">Racismo</option>
          <option value="5">Violência a mulher</option>
          <option value="6">Xenofobia</option>
        </select>

        <select class="input-modificar" name="genero">
          <option selected disabled value="">Escolha o Genero</option>
          <option value="1">Drama</option>
          <option value="2">Documentário</option>
          <option value="3">Comédia</option>
          <option value="4">Terror</option>
          <option value="5">Suspense</option>
          <option value="6">Romance</option>
        </select>
      </p>
      <p class="alinhar">
        <input type="submit" name="enviar" class="btn-input-modificar" value="Registrar">
      </p>
    </form>
  </div>
</div> 
<?php 
} ?>

</main>

  <div>
  <script src="curta-script.js"></script>
  </div>


<footer>
  <div class="logo-rodape">
    <a href="#"><img class="_logo-rodape" src="img/logopng.png" alt="Ocorreu um erro no carregamento da imagem"></a>
  </div>

  <div class="texto_rodape">
    <p class="texto-rodape"><span>&copy; Todos os direitos reservados ao</span> <span><a href="http://sombrio.ifc.edu.br/" target="_blank" id="linkrodape">Instituto Federal Catarinense Campus Avançado Sombrio</a></span></p>
  </div>

  <div class="social-midia">
    <a href="https://www.instagram.com/curtaifc/" target="_blank"><img class="social" src="img/instagram.png" alt="Ocorreu um erro no carregamento da imagem"></a>
    <a href="https://twitter.com/curta_ifc" target="_blank"><img class="social" src="img/twitter.png" alt="Ocorreu um erro no carregamento da imagem"></a>
  </div>

</footer>

</body>
</html> 