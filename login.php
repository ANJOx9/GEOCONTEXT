<?php
session_start();
require 'db.php';


// Inicializar mensagem de erro
$error_message = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Prepare e execute a consulta SQL
    $sql = "SELECT id, senha FROM players WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
   
    // Verifica se a consulta encontrou um resultado e se a senha está correta
    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Nome de usuário ou senha inválidos!";
    }


    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (!empty($error_message)): ?>
            <p style="color: red; text-align: center;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <label for="username">Nome de usuário:</label><br>
            <input type="text" id="username" name="username" required>


            <label for="password"><br>Senha:</label><br>
            <input type="password" id="password" name="password" required>
                 
            <input type="submit" value="Login">
        </form>
        <a href="index.php" class="button">Voltar</a>
    </div>
</body>
</html>
