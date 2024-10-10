<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Foto de Perfil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="perfil-alt.css">
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
    <div class="perfil-container">
        <h1>Alterar Foto de Perfil</h1>
        
        <div class="profile-picture-container">
            <?php if (isset($_SESSION['profile_picture']) && file_exists("uploads/" . $_SESSION['profile_picture'])): ?>
                <img id="profileImg" src="<?php echo htmlspecialchars($_SESSION['profile_picture']); ?>" alt="Foto de Perfil">
            <?php else: ?>
                <img id="profileImg" src="default-profile.png" alt="Foto de Perfil">
            <?php endif; ?>
        </div>
        
        <div class="message" id="message"></div>

        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" id="fileInput" name="profile_picture" accept="image/*" required>
            <button type="submit">Alterar foto</button>
        </form>

        <div class="form-group">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : ''; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="password">Nova Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm-password">Confirme a Nova Senha:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
        </div>

        <button type="button" id="updateProfile">Atualizar Perfil</button>
        <button type="button" id="deleteAccount">Excluir Conta</button>
        
        <div id="message" class="message"></div>

        <!-- Botão para voltar ao jogo -->
        <a href="jogo.php" class="button">Voltar ao Jogo</a>
    </div>
</div>

<!-- Estilo para o background -->
<style>
body {
    background-image: url('imgs/brazil.jpg'); /* Altere para o caminho da sua imagem */
    background-size: cover; /* Faz a imagem cobrir toda a área */
    background-position: center; /* Centraliza a imagem */
    background-repeat: no-repeat; /* Não repete a imagem */
    height: 100vh; /* Faz o body ocupar 100% da altura da tela */
    margin: 0; /* Remove margens padrão do body */
}
</style>

</body>
</html>
