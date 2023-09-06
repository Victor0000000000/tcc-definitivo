<?php
ob_start();
@session_start();

  $nivel_necessario = 0;

  // Verifica se não há a variável da sessão que identifica o usuário
  if ($_SESSION['adm'] = $nivel_necessario) {
            // Redireciona o adm
     header('Location: index.php');

  } else {
          session_destroy();      ;;;;
                // Redireciona o visitante de volta pra página de curtas
     header('Location: curtas.php');
}
?>
