<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parabéns!</title>
    <link rel="stylesheet" href="congratulations.css"> <!-- Vincule um CSS específico, se desejar -->
    <style> 
        body, html {
            margin: 0;
            padding: 0;
            height: 90%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4; /* Cor de fundo opcional */
        }
        .congratulations-container {
            text-align: center;
        }
        video {
            width: 100%;
            height: auto;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color:#ADD8E6; /* Cor de fundo do botão */
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #45a049; /* Cor do botão ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="congratulations-container">
        <h1>Parabéns!</h1>
        <p>Você acertou o estado secreto!</p>
        <img src="congrats-image.jpg" alt="Congratulations" class="congratulations-image"> <!-- Substitua pelo seu caminho de imagem -->
        <div class="video-container">
            <video id="congratulations-video" autoplay loop>
                <source src="imgs/Congratulations Ecard - Vivid Greetings (1080p, h264, youtube).mp4" type="video/mp4"> <!-- Corrigido -->
            </video>
        </div>
        <a href="jogo.php" class="button">jogar mais um pouco</a> <!-- Botão adicionado abaixo do vídeo -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('congratulations-video');

            // Reproduz o vídeo automaticamente
            video.play();

            // Redireciona para jogo.php quando o vídeo terminar
            video.addEventListener('ended', function() {
                window.location.href = 'jogo.php';
            });
        });
    </script>
</body>
</html>
