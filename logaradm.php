 <?php
 // mysql_connect('localhost', 'root', '') or die (mysql_error());
// mysql_select_db('adm') or die (mysql_error());

// if(isset($_POST['email']) && isset($_POST['senha'])) {
   // $email = $_POST['email'];
  //  $senha = $_POST['senha'];
  
    // $get = mysql_query("SELECT * FROM adm WHERE email = '$email' AND senha = '$senha'");
   // $num = mysql_num_rows($get);
      
    // if($num == 1){
        // Fazer alguma coisa se o login for bem-sucedido
    // } else {
      //  echo 'O email ou senha foram digitados incorretamente';
   // }
// }

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'Curtasifc';

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if(isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM adm WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($query);
    $num = $result->num_rows;

    if($num == 1){
        // Fazer alguma coisa se o login for bem-sucedido
        $adm = $percorrer['adm'];
        $nome = $percorrer['nome'];

        session_start();
       
        header("Location: curtas.php");
        exit;
    } else {
        echo 'Voce não possui o nivel de acesso nescessarios';
    }
}

// Fechar a conexão
$conn->close();
?>










