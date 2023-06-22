<?php
include ("valida_session_perfil.php");
include ("conexao.php");

$sql = "SELECT * FROM usuario WHERE cod = $cod";
$rs= mysqli_query($conn, $sql);
$user = mysqli_fetch_array($rs);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Perfil</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/36b801b814.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="perfil.css">
  
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
        <li><a class="link-menu" href="premiacao.php">Premiações</a></li>
        <li><a class="link-menu" href="index.php">Início</a></li>
        <li><a class="link-menu" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
      </ul>
    </nav>
</header>

<main>
<div class="logo-pagina">
    <img class="logo-apresentacao" src="img/logopreto.jpeg" alt="logo do projeto">
</div>

<div class="card-perfil">
        <class="text">
          <i class="fas fa-user"></i>  <strong>Nome:</strong> <?php echo $user['nome'] ?>
          <button id="editaNome" class="btn-editar">Editar</button>
        </p> 

        <p class="text">
           <i class="fas fa-envelope"></i> <strong>E-mail:</strong> <?php echo $user['email'] ?>
          <button id="editarEmail" class="btn-editar">Editar</button>     
        </p>

        <p class="text">
          <i class="fas fa-key"></i> <strong>Senha:</strong>
          <button id="editarSenha" class="btn-editar">Editar</button>     
        </p>
        <div class="center">
         <form action="excluiruser.php">
          <button class="btn_excluir"><i class="fas fa-trash"></i> Excluir conta</button>
         </form>
        </div>
</div>
</main>

<!--Modal user-->
<div id="modal-1" class="modal-container">
  <div class="modal">
    <form action="editaruser.php" method="POST">
      <button class="fechar">x</button>
      <h3 class="titular">Modificar Usuário</h3>
      <p>
      <input type="hidden" name="cod" value="<?php echo $cod; ?>" />
      <input type="text" name="nome" class="input-modificar" placeholder="Novo nome" value="<?php echo $user['nome'] ?>" >
      </p>
      <br>
      <input type="submit" class="btn-input-modificar" value="Salvar">
    </form>
  </div>
</div>

<!--Modal Email-->

<div id="modal-2" class="modal-container">
  <div class="modal">
    <form  action="editaruseremail.php" method="POST">
      <button class="fechar">x</button>
      <h3 class="titular">Modificar E-mail</h3>
      <p>
      <input type="hidden" name="cod" value="<?php echo $cod; ?>" />
      <input type="text" name="email" class="input-modificar" placeholder="Novo E-mail">
      </p>
      <br>
      <input type="submit" class="btn-input-modificar" value="Salvar">
    </form>
  </div>
</div>

<!--Modal Senha-->
<div id="modal-3" class="modal-container">
  <div class="modal" >
    <form action="editarusersenha.php" method="POST" >
      <button class="fechar">x</button>
      <h3 class="titular">Modificar Senha</h3>
      <input type="hidden" name="cod" value="<?php echo $cod; ?>" />
      <p>
      <input type="text" name="senha" class="input-modificar" placeholder="Nova senha">
      </p>
      <br>
      <input type="submit" class="btn-input-modificar" value="Salvar">
    </form>
  </div>
</div>

<div>
    <script src="perfil-script.js"></script>
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