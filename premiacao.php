<? php
include ("conexao.php");
include ("valida_session_premio.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/36b801b814.js" crossorigin="anonymous"></script>
  <title>Curta IFC</title>
  <link rel="stylesheet" href="premiacao.css">
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
        <li><a class="link-menu" href="curtas.php">Curtas</a></li>
        <li><a class="link-menu" href="oficinas.php">Oficinas</a></li>
        <li><a class="link-menu" href="perfil.php">Perfil</a></li>
        <li><a class="link-menu" href="telainicial.php">Início</a></li>
        <li><a class="link-menu" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
      </ul>
    </nav>
</header>

<main> 
<div class="logo-pagina"> 
<a id="logo" href="telainicial.php"><img id="img_logo" src="img/logopng.png"></a>
  </div>
  <!-- SELECT * FROM imgpreio where ano=
  <div class="logo-pagina">
    <select name="#" class="barra-pesquisa">
            <option selected disabled value="">Escolha o ano das Premiações</option>
            <option value="">2016</option>
            <option value="">2017</option>
            <option value="">2018</option>
            <option value="">2019</option>
            <option value="">2020</option>
            <option value="">2021</option>
    </select>  -->

  <div data-slide="slide" class="slide">
      <div class="slide-items">
        <img class="slide-img" src="img/img-1.jpeg" alt="Img 1">
        <img class="slide-img" src="img/img-2.jpeg" alt="Img 2">
        <img class="slide-img" src="img/img-3.jpeg" alt="Img 3">
        <img class="slide-img" src="img/img-4.jpeg" alt="Img 4">
      </div>
      <nav class="slide-nav">
        <div class="slide-thumb"></div>
        <button class="slide-prev">Anterior</button>
        <button class="slide-next">Próximo</button>
      </nav>
  </div>
</main>

  <footer>

    <div class="logo-rodape">
      <a href="#"><img class="_logo-rodape" src="img/logopng.png" alt="Ocorreu um erro no carregamento da imagem"></a>
    </div>

    <div class="texto_rodape">
      <p class="texto-rodape">&copy; Todos os direitos reservados ao <a href="http://sombrio.ifc.edu.br/" target="_blank" id="linkrodape">Instituto Federal Catarinense Campus Avançado Sombrio</a></p>
    </div>

    <div class="social-midia">
      <a href="https://www.instagram.com/curtaifc/" target="_blank"><img class="social" src="img/instagram.png" alt="Ocorreu um erro no carregamento da imagem"></a>
      <a href="https://twitter.com/curta_ifc" target="_blank"><img class="social" src="img/twitter.png" alt="Ocorreu um erro no carregamento da imagem"></a>
    </div>

  </footer>

  <div>
  <script src="../js/premiacao-script.js"></script>
  </div>
</body>
</html> 