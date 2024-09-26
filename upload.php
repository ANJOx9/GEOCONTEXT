<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Defina o diretório de upload
    $target_dir = "upload/"; // Ou use __DIR__ . "/upload/"
    
    // Verifica se a pasta de upload existe
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Cria a pasta se não existir
    }
    
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);

    // Verifica se o arquivo é uma imagem
    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check !== false) {
        // Move o arquivo para o diretório de upload
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            // Salva o caminho da imagem na sessão para uso posterior
            $_SESSION['profile_picture'] = $target_file;
            header("Location: perfil.php");
            exit();
            echo "O arquivo " . htmlspecialchars(basename($_FILES["profile_picture"]["name"])) . " foi enviado com sucesso.";
        } else {
            header("Location: perfil.php");
            exit();
            echo "Desculpe, houve um erro ao enviar seu arquivo.";
        }
    } else {
        echo "Arquivo não é uma imagem.";
    }
}
?>
