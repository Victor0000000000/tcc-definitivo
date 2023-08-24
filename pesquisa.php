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

<?php
include('conexao.php');


$Tema = $_POST['tema'];
$Ano = $_POST['ano'];
$Genero = $_POST['genero'];
echo   $_POST['tema'];
echo  $_POST['ano'];
echo $_POST['genero'];


$sql = "SELECT * FROM curta WHERE Genero = $Genero AND Tema = $Tema AND ano = $Ano";
$rs= mysqli_query($conn, $sql);

if (mysqli_num_rows($rs) > 0) {
  while($row = mysqli_fetch_array($rs)) { ?>
	<section class="list-banners">
      <figure class="wrapper-banner">
        <a href="<?php echo $row['video']?>" target="_blank"><img class="banners" src="poster/<?php echo $row['poster']?>" alt="banner promocional do curta"></a>
        <figcaption class="caption"> <?php echo $row ['titulo']?> </figcaption>
      </figure>
     </section>
<?php }
} else { ?> 
  <script type='text/javascript'> alert ('Erro!') </script>
   <?php header('location: curtas.php');
}
if (isset($_POST['tema']) && isset($_POST['ano']) && isset($_POST['genero'])) {
  $Tema = $_POST['tema'];
  $Ano = $_POST['ano'];
  $Genero = $_POST['genero'];
  // ... resto do seu código ...
} else {
  echo "Campos não preenchidos corretamente.";
}

?> 