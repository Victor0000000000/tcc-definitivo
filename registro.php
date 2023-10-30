<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/36b801b814.js" crossorigin="anonymous"></script>
  <title>Curta IFC</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    th {
      
      color: #DAA520; /* Adiciona a cor amarela ao texto dos títulos */
    }
  </style>
</head>
<body>
  <header id="header">
  <!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/36b801b814.js" crossorigin="anonymous"></script>
  <title>Curta IFC</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header id="header">
    <a id="logo" href="telainicial.php"><img id="img_logo" src="img/logopng.png"></a>
    <nav id="nav">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
        <span id="hamburger"></span>
      </button>
      <ul id="menu" role="menu">

        <li>
          <button onclick="myFunction()" class="bot"><i class="fas fa-sun"></i></button>
        </li>

       <div class="<?php echo $curtas; ?>"> <li><a class="link-menu" href="curtas.php">Curtas</a></li>
       </div>
       <div class="<?php echo $registro; ?>"> <li><a class="link-menu" href="registro.php">Contas registradas</a></li>
       </div>

       <li><a class="link-menu" href="oficinas.php">Oficinas</a></li>
       <li><a class="link-menu" href="Galeria.php">Galeria</a></li>
        <li><a class="link-menu" href="premiacao.php">Premiações</a></li>
        <li><a class="link-menu" href="perfil.php">Perfil</a></li>
      
        <li><a class="link-menu" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
      </ul>
    </nav>
</header>
  </header>

  <div id="conteudo">
    <?php
    session_start();
     if (!isset($_SESSION['cod'])) {
      session_destroy();
      header('Location:index.php');
    } 
    include("conexao.php");

    // Consulta para selecionar todos os usuários da tabela
    $sql = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conn, $sql);

    // Verifica se a consulta retornou resultados
    if (mysqli_num_rows($resultado) > 0) {
        echo "<center><h2>Usuários cadastrados:</h2></center>";
        echo "<table>";
        echo "<tr><th>Nome</th><th>Senha</th><th>Data de Nascimento</th><th>Email</th></tr>";
        // Loop para exibir os usuários
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['senha'] . "</td>";
            echo "<td>" . $row['data_nasc'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='mensagem'>Nenhum usuário cadastrado.</p>";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
    ?>
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
<div>
<script src="index-script.js"></script>
</div>

  <script src="index-script.js"></script>
</body>
</html>
