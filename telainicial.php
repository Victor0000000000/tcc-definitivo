<?php
//include ("valida_session_perfil.php");
include ("conexao.php");

session_start();

if (!isset($_SESSION['cod'])) {
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
  <title>Curta IFC</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header id="header">
    <a id="logo" href="index.php"><img id="img_logo" src="img/logopng.png"></a>
    <nav id="nav">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
        <span id="hamburger"></span>
      </button>
      <ul id="menu" role="menu">

        <li>
          <button onclick="myFunction()" class="bot"><i class="fas fa-sun"></i></button>
        </li>

        <li><a class="link-menu" href="curtas.php">Curtas</a></li>
        <li><a class="link-menu" href="oficinas.php">Oficinas</a></li>
        <li><a class="link-menu" href="premiacao.php">Premiações</a></li>
        <li><a class="link-menu" href="perfil.php">Perfil</a></li>
        <li><a class="link-menu" href="curtacad.php">cadastro Curtas</a></li>
        <li><a class="link-menu" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
      </ul>
    </nav>
</header>

<div data-slide="slide" class="slide">
    <div class="slide-items">
      <img class="img-slide" src="img/img1.jpeg" alt="Img 1">
      <img class="img-slide" src="img/img2.jpeg" alt="Img 2">
      <img class="img-slide" src="img/img3.jpeg" alt="Img 3">
      <img class="img-slide" src="img/img4.jpeg" alt="Img 4">
    </div>
    <nav class="slide-nav">
      <div class="slide-thumb"></div>
      <button class="slide-prev">Anterior</button>
      <button class="slide-next">Próximo</button>
    </nav>
</div>


<main>
    <div class="conteudo">
      <h1 class="titulo">O que é o projeto Curta IFC</h1>
      
      <p class="texto">A persistência de muitos problemas no âmbito do exercício da cidadania, dos direitos humanos e do enfrentamento 
        das violências preocupa e gera questionamentos quanto a efetividade dos direitos humanos no Brasil. O Informe 2017/2018 da Anistia 
        Internacional (2018) aponta para a violação de direitos de minorias no Brasil, dentre as quais os povos indígenas, a população 
        LGBT e os jovens negros. Do mesmo modo, pode-se destacar o alto índice de violência contra a mulher na sociedade brasileira. 
        De acordo com o Atlas da violência 2019 (p.35), houve um aumento de 30,7% no número de homicídios de mulheres no país durante a década 
        em análise (2007-2017). Isso mostra que existe uma demanda por atitudes propositivas e ações concretas a serem tomadas e continuadas 
        pela sociedade como um todo, envolvendo a participação conjunta de governos, organizações de todos os setores da sociedade civil 
        e cidadãos em geral. A escola mostra-se um espaço profícuo para a abordagem desses temas, na medida em que as diversas áreas do 
        conhecimento podem contribuir na problematização, análise crítica e construção de saberes, além do compromisso com a formação integral 
        do ser humano.</p>

      <p class="texto">Nesse contexto, surge no Campus Avançado Sombrio do Instituto Federal Catarinense, o projeto de ensino e pesquisa 
        “Produção audiovisual, Linguagens e Humanidades” o qual busca, por meio da produção audiovisual, inserir os jovens no estudo, pesquisa, 
        análise crítica e debate sobre direitos humanos, de forma a terem participação ativa por meio da produção de filmes curtas-metragens, 
        promovendo o entendimento e respeito aos direitos humanos. Assim, o projeto busca, desde 2016, promover o debate integrado entre as 
        disciplinas sobre os temas que serão abordados nos curtas-metragens, promovendo ações como debates em aula, oficinas extraclasse e 
        propostas de pesquisa de caso. </p>

      <p class="texto">As atividades do referido projeto foram desenvolvidas interdisciplinarmente com os alunos do primeiro e segundo ano dos 
        Cursos Técnicos integrados ao Ensino Médio em Informática e Hospedagem, envolvendo as disciplinas de História, Filosofia, Sociologia, 
        Língua Portuguesa, Língua Inglesa, Metodologia Científica e Artes. Como resultado dos debates e problematizações desenvolvidos ao longo 
        do período letivo, os alunos escreveram, produziram e gravaram curtas-metragens que abordaram os temas discutidos.</p>

      <p class="texto">A importância deste trabalho reside na necessidade de movimentos e reflexões que desconstruam o preconceito e promovam a 
        aceitação das diferenças e o respeito à dignidade de todos e todas. A equipe do projeto agradece a todos os que prestigiaram o evento, 
        aos alunos que produziram com tanto empenho seus curtas-metragens e, em especial, aos alunos e servidores que auxiliaram na organização 
        do festival e possibilitaram sua realização.</p>
    </div>
</main>
  
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

</body>
</html>