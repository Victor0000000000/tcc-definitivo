<?php
ob_start();
@session_start();

  $nivel_necessario = 2;

  // Verifica se não há a variável da sessão que identifica o usuário
  if ($_SESSION['nivel'] = $nivel_necessario) {
            // Redireciona o adm
     header('Location: cadastrarcurta.php');

  } else {
          session_destroy();
                // Redireciona o visitante de volta pra página de curtas
     header('Location: curtas.php');
}
?>
