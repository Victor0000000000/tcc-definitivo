
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

<?php
include('conexao.php');

$tema = $_POST['tema'] ?? '';
$ano = $_POST['ano'] ?? '';
$genero = $_POST['genero'] ?? '';

// Verifica se os campos de filtro foram preenchidos
if (!empty($tema) && !empty($ano) && !empty($genero)) {
    $sql = "SELECT * FROM curta WHERE genero = '$genero' AND tema = '$tema' AND ano = '$ano'";
    $rs = mysqli_query($conn, $sql);

    if ($rs && mysqli_num_rows($rs) > 0) {
        while ($row = mysqli_fetch_array($rs)) {
            ?>
            <section class="list-banners">
                <figure class="wrapper-banner">
                    <a href="<?php echo $row['video']?>" target="_blank"><img class="banners"
                                                                              src="poster/<?php echo $row['poster']?>"
                                                                              alt="banner promocional do curta"></a>
                    <figcaption class="caption"> <?php echo $row['titulo']?> </figcaption>
                </figure>
            </section>
            <?php
        }
    } else {
        echo '<script type="text/javascript">alert("Nenhum curta encontrado."); window.location.href = "curtas.php";</script>';
    }
} else {
    echo '<script type="text/javascript">alert("Preencha todos os campos."); window.location.href = "curtas.php";</script>';
}

mysqli_close($conn);
?>

</body>
</html>