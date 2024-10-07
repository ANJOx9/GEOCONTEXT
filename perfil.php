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
    <link rel="stylesheet" href="perfil.css">
</head>
<body>
    <div class="container">
        <div class="perfil-container">
            <h1>Alterar Foto de Perfil</h1>
            <div class="profile-picture-container">
            <?php if (isset($_SESSION['profile_picture'])): ?>
    <div class="profile-picture-container">
        <img id="profileImg" src="<?php echo htmlspecialchars($_SESSION['profile_picture']); ?>" alt="Foto de Perfil">
    </div>
<?php else: ?>
    <div class="profile-picture-container">
        <img id="profileImg" src="default-profile.png" alt="Foto de Perfil">
    </div>
<?php endif; ?>
            </div>
            <div class="message" id="message"></div>

            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="file"  id="fileInput" name="profile_picture" accept="image/*" required>
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

        <a href="jogo.php" class="button">voltar</a>
        </div>
        
    </div>

    <script>
        document.getElementById('updateProfile').addEventListener('click', function() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            if (password !== confirmPassword) {
                document.getElementById('message').textContent = 'As senhas não coincidem.';
                document.getElementById('message').classList.add('error');
                return;
            }

            // Lógica para enviar os dados ao servidor pode ser implementada aqui
        });

        document.getElementById('deleteAccount').addEventListener('click', function() {
            if (confirm('Tem certeza que deseja excluir sua conta?')) {
                // Lógica para excluir a conta pode ser implementada aqui
            }
        });

        document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const img = document.getElementById('profileImg');
            img.src = e.target.result;
        }

        reader.readAsDataURL(file);
    }
});
    
    </script>
</body>
</html>