<?php
session_start();
require 'db.php'; // Inclui o arquivo de conexão

$message = ''; // Inicializa a variável de mensagem

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Valida se as senhas coincidem
    if ($password !== $confirm_password) {
        $message = "<p style='color: red; text-align: center;'>As senhas não coincidem!</p>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Verifica se o nome de usuário já existe
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        if (!$stmt) {
            $message = "<p style='color: red; text-align: center;'>Erro na preparação da consulta: " . $conn->error . "</p>";
        } else {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $message = "<p style='color: red; text-align: center;'>Nome de usuário já existe!</p>";
            } else {
                // Insere o novo usuário no banco de dados
                $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                if (!$stmt) {
                    $message = "<p style='color: red; text-align: center;'>Erro na preparação da consulta: " . $conn->error . "</p>";
                } else {
                    $stmt->bind_param("ss", $username, $hashed_password);
                    if ($stmt->execute()) {
                        $message = "<p style='color: green; text-align: center;'>Cadastro realizado com sucesso!</p>";
                    } else {
                        $message = "<p style='color: red; text-align: center;'>Erro ao registrar usuário: " . $stmt->error . "</p>";
                    }
                    $stmt->close();
                }
            }
        }
    }
    $conn->close(); // Fecha a conexão com o banco de dados
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="register.css"> <!-- Inclua o CSS específico para registro -->
</head>
<body>
    <?php
    // Carregar o caminho da imagem de fundo do banco de dados
    $background_image_url = 'brazil.jpg'; // Imagem padrão
    // Aqui você deve incluir lógica para carregar a imagem de fundo do banco de dados, se disponível

    // Atualize a imagem de fundo do corpo, se houver
    if (file_exists("uploads/" . $background_image_url)) {
        echo "<style>body { background-image: url('uploads/$background_image_url'); }</style>";
    }
    ?>

    <div class="container">
        <h1>Registrar</h1>
        <?php if (!empty($message)) echo $message; ?> <!-- Exibe a mensagem de feedback -->
        <form action="register.php" method="post" enctype="multipart/form-data">
            <label for="username">Nome de usuário:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirm_password">Confirmar Senha:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <input type="submit" value="Registrar">
        </form>
        <a href="index.php" class="button">Voltar</a>
    </div>
</body>
</html>
