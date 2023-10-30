<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['curta_id']) && isset($_POST['voto'])) {
    $curta_id = $_POST['curta_id'];
    $voto = $_POST['voto'];

    $usuario_id = 1; // Substitua pelo ID do usuário atual

    $checkVoteQuery = "SELECT id FROM votos WHERE usuario_id = $usuario_id AND curta_id = $curta_id";
    $checkVoteResult = $conn->query($checkVoteQuery);

    if ($checkVoteResult->num_rows == 0) {
        $insertVoteQuery = "INSERT INTO votos (usuario_id, curta_id, voto) VALUES ($usuario_id, $curta_id, $voto)";
        if ($conn->query($insertVoteQuery) === TRUE) {
            $updateVotesQuery = "UPDATE curta SET votos = votos + $voto WHERE cod = $curta_id";
            if ($conn->query($updateVotesQuery) === TRUE) {
                echo "Voto registrado com sucesso!";
            } else {
                echo "Erro ao atualizar votos: " . $conn->error;
            }
        } else {
            echo "Erro ao registrar voto: " . $conn->error;
        }
    } else {
        echo '<script>alert("Você já votou neste curta.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="galeria.css">
    <link rel="stylesheet" href="estilos_votacao.css">
    <script src="https://kit.fontawesome.com/36b801b814.js" crossorigin="anonymous"></script>
    <title>Curtas</title>
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
                <li><a class="link-menu" href="oficinas.php">Oficinas</a></li>
                <li><a class="link-menu" href="premiacao.php">Premiações</a></li>
                <li><a class="link-menu" href="perfil.php">Perfil</a></li>
                <li><a class="link-menu" href="telainicial.php">Início</a></li>
                <li><a class="link-menu" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="logo-pagina">
            <img class="logo-apresentacao" src="img/logopreto.PNG" alt="logo do projeto">
        </div>
        <?php
        $galleryQuery = "SELECT * FROM curta ORDER BY votos DESC";
        $galleryResult = $conn->query($galleryQuery);
        if ($galleryResult->num_rows > 0) {
            while ($row = $galleryResult->fetch_assoc()) {
                echo "<div class='curta'>";
                echo "<video width='320' height='240' controls>";
                echo '<source src="' . $row['video'] . '" type="video/mp4">';
                echo "Seu navegador não suporta o elemento de vídeo.";
                echo "</video>";
                echo "<img src='" . $row['poster'] . "' alt='Poster'>";
                echo "<h3>" . $row['titulo'] . "</h3>";
                echo "<p>" . $row['sinopse'] . "</p>";
                echo "<p>Total de Votos: " . $row['votos'] . "</p>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='curta_id' value='" . $row['cod'] . "'>";
                echo "<input type='hidden' name='voto' value='1'>";
                echo "<input type='submit' value='Curtir'>";
                echo "</form>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='curta_id' value='" . $row['cod'] . "'>";
                echo "<input type='hidden' name='voto' value='-1'>";
                echo "<input type='submit' value='Não Curtir'>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "Nenhum curta encontrado.";
        }
        ?>
    </main>
</body>
</html>
