<?php
include('conexao.php');

// Verificar se o arquivo foi enviado
if (isset($_FILES['userfile']) && $_FILES['userfile']['error'] === UPLOAD_ERR_OK) {

    // Obter informações sobre o arquivo
    $file_name = $_FILES['userfile']['name'];
    $file_tmp = $_FILES['userfile']['tmp_name'];
    $file_size = $_FILES['userfile']['size'];

    // Obter a extensão do arquivo
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $uploadDirImage = "poster/";
    $uploadDirVideo = "curta/";

    // Definir extensões permitidas para imagens e vídeos
    $allowed_image_extensions = array('jpg', 'png', 'jpeg');
    $allowed_video_extensions = array('mp4', 'mov', 'avi', 'wmv');

    // Verificar se o arquivo é uma imagem
    if (in_array($file_extension, $allowed_image_extensions)) {
        $uploadDir = $uploadDirImage;
    } elseif (in_array($file_extension, $allowed_video_extensions)) {
        $uploadDir = $uploadDirVideo;
    } else {
        echo '<script type="text/javascript">window.alert("Apenas arquivos de imagem (jpg, png, jpeg) ou vídeos (mp4, mov, avi, wmv) são permitidos.");</script>';
        header('Location: curtas.php');
        exit;
    }

    // Mover o arquivo para o diretório de upload
    $uploadfile = $uploadDir . basename($file_name);
    if (move_uploaded_file($file_tmp, $uploadfile)) {

        // Sanitizar e validar outros dados do formulário
        $ano = mysqli_real_escape_string($conn, $_POST['ano']);
        $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
        $duracao = mysqli_real_escape_string($conn, $_POST['duracao']);
        $sinopse = mysqli_real_escape_string($conn, $_POST['sinopse']);
        $tema = mysqli_real_escape_string($conn, $_POST['tema']);
        $genero = mysqli_real_escape_string($conn, $_POST['genero']);
        $turma = mysqli_real_escape_string($conn, $_POST['turma']);

        // Verificar se o ano existe na tabela ano
        $anoExistente = mysqli_query($conn, "SELECT ano FROM ano WHERE cod = $ano");

        if (mysqli_num_rows($anoExistente) > 0) {
            // Obtendo o caminho correto do arquivo
            $poster = mysqli_real_escape_string($conn, $uploadfile);

            // Inserir dados na tabela curta
            $sql = "INSERT INTO curta (titulo, duracao, sinopse, tema, genero, ano, turma, poster) VALUES ('$titulo', '$duracao', '$sinopse', '$tema', '$genero', '$ano', '$turma', '$poster')";

            if (mysqli_query($conn, $sql)) {
                echo "Curta cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o curta: " . mysqli_error($conn);
            }
        } 

    } else {
        echo "Erro ao enviar o arquivo.";
        exit;
    }

} else {
    echo "Erro no upload do arquivo.";
    exit;
}

if (empty($_POST['ano']) || empty($_POST['titulo'])
 || empty($_POST['duracao']) ||
  empty($_POST['sinopse']) ||
   empty($_POST['tema']) || 
   empty($_POST['genero']) || 
   empty($_POST['turma'])) {
    header("Location: curtas.php?erro=Campos obrigatórios não preenchidos");
    exit;
}

mysqli_close($conn);
?>
