<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- Inclui o CSS global e o CSS específico para a página index -->
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao GeoContext</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
            <p>Olá <?php echo htmlspecialchars($_SESSION['username']); ?>, tenha um bom jogo <br></p>
            <a href="jogo.php" class="button">Jogar</a>
            <a href="logout.php" class="button">Logout</a>
        <?php else: ?>
            <a href="login.php" class="button">Login</a>
            <a href="register.php" class="button">Registrar</a>
        <?php endif; ?>
    </div>
</body>
</html>
