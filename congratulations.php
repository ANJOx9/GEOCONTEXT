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
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0; /* Cor de fundo opcional */
        }
        .congratulations-container {
            text-align: center;
        }
        video {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="congratulations-container">
        <h1>Parabéns!</h1>
        <p>Você acertou o estado secreto!</p>
        <img src="congrats-image.jpg" alt="Congratulations" class="congratulations-image"> <!-- Substitua pelo seu caminho de imagem -->
        <div class="video-container">
            <video id="congratulations-video" controls autoplay loop>
                <source src="Congratulations Ecard - Vivid Greetings (1080p, h264, youtube).mp4" type="video/mp4"> <!-- Substitua pelo seu caminho de vídeo -->
            </video>
        </div>
        <a href="jogo.php" class="button">Voltar ao Jogo</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('congratulations-video');
            video.play(); // Inicia o vídeo automaticamente

            // Solicita tela cheia
            if (video.requestFullscreen) {
                video.requestFullscreen();
            } else if (video.mozRequestFullScreen) { // Firefox
                video.mozRequestFullScreen();
            } else if (video.webkitRequestFullscreen) { // Chrome, Safari e Opera
                video.webkitRequestFullscreen();
            } else if (video.msRequestFullscreen) { // IE/Edge
                video.msRequestFullscreen();
            }
        });
    </script>
</body>
</html>
