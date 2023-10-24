<?php
include ("conexao.php");

session_start();

if (!isset($_SESSION['cod'])) {
  session_destroy();
  header('Location:index.php');
} 
$cod = $_SESSION['cod'];

// Construa a consulta SQL correta usando um placeholder para evitar injeção de SQL
$query = "SELECT * FROM usuarios WHERE cod = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    // Substitua o marcador de posição pela variável $cod
    mysqli_stmt_bind_param($stmt, "i", $cod);

    // Execute a consulta preparada
    mysqli_stmt_execute($stmt);

    // Obtenha os resultados da consulta
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        // Recupere as informações do usuário
        $user = mysqli_fetch_assoc($result);
    } else {
        // Lógica para lidar com erros ou usuário não encontrado
        // Defina $user como um array vazio ou outra informação padrão, se necessário
        $user = []; // Ou array vazio, dependendo da sua lógica
    }

    // Feche a consulta preparada
    mysqli_stmt_close($stmt);
} else {
    // Lógica para lidar com erros na preparação da consulta
    // Defina $user como um array vazio ou outra informação padrão, se necessário
    $user = []; // Ou array vazio, dependendo da sua lógica
}

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
    <a id="logo" href="telainicial.php"><img id="img_logo" src="img/logopng.png"></a>
    <nav id="nav">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
        <span id="hamburger"></span>
      </button>
      <ul id="menu" role="menu">
        <li><button onclick="myFunction()" class="bot"><i class="fas fa-sun"></i></button></li>
        <li><a class="link-menu" href="curtas.php">Curtas</a></li>
        <li><a class="link-menu" href="oficinas.php">Oficinas</a></li>
        <li><a class="link-menu" href="premiacao.php">Premiações</a></li>
        <li><a class="link-menu" href="telainicial.php">Início</a></li>
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
<!-- Modal Usuário -->
<div id="modal-1" class="modal-container">
  <div class="modal">
    <form action="editaruser.php" method="POST">
      <button class="fechar">x</button>
      <h3 class="titular">Modificar Usuário</h3>
      <p>
        <input type="hidden" name="cod" value="<?php echo isset($cod) ? $cod : ''; ?>" />
        <input type="text" name="nome" class="input-modificar" placeholder="Novo nome" value="<?php echo isset($user['nome']) ? $user['nome'] : ''; ?>" >
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
      <br>
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