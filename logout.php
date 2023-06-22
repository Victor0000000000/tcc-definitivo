
<?php

ob_start();
@session_start();

unset($_SESSION['cod']);

session_destroy();
header('Location:login.php');