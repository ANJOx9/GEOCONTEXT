<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEOCONTEXT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="jogo2.css"> <!-- Vincula o arquivo CSS externo -->
</head>
<body>
    <div class="header">
        <a href="perfil.php" class="btn"><i class="fas fa-user"></i> PERFIL</a>
    </div>

    <div class="container">
        <h1>GEOCONTEXT</h1>

        <form id="stateForm" action="includes-back/process.php" method="POST">
            <div class="form-group">
                <label for="state">Digite o nome do estado:</label>
                <input type="text" id="state" name="state" required>
            </div>
            <button type="submit" class="btn1">Enviar Palpite</button><br>
            <a href="logout.php" class="btn">Logout</a>
        </form>

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

        <div id="message" class="message"></div>

        <div id="history" class="history">
            <h2>Histórico de Palpites</h2>
            <table>
                <thead>
                    <tr>
                        <th>Estado Adivinhado</th>
                        <th>Distância (km)</th>
                    </tr>
                </thead>
                <tbody id="historyTableBody">
                    <!-- Histórico será inserido aqui -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        var guessedStates = new Set(); // Armazena os estados já adivinhados

        document.getElementById('stateForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var state = document.getElementById('state').value;

            // Verifica se o estado já foi adivinhado
            if (guessedStates.has(state.toLowerCase())) {
                document.getElementById('message').textContent = 'Você já inseriu este estado!';
                document.getElementById('message').classList.add('error');
                return;
            }

            // Adiciona o estado ao conjunto de estados adivinhados
            guessedStates.add(state.toLowerCase());

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'includes-back/process.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                var response = JSON.parse(this.responseText);
                var messageElement = document.getElementById('message');
                var historyTableBody = document.getElementById('historyTableBody');

                if (response.message) {
                    messageElement.textContent = response.message;
                    messageElement.classList.add('error');
                    messageElement.classList.remove('success');
                } else if (response.distance) {
                    messageElement.textContent = 'Distância para o estado secreto: ' + response.distance.toFixed(2) + ' km';
                    messageElement.classList.remove('error');
                    messageElement.classList.add('success');
                    var newRow = document.createElement('tr');
                    newRow.innerHTML = '<td>' + state + '</td><td>' + response.distance.toFixed(2) + '</td>';
                    historyTableBody.appendChild(newRow);
                } else if (response.success) { // Adiciona verificação para o estado secreto
                    window.location.href = 'congratulations.php'; // Redireciona para a página de congratulações
                }
            };
            xhr.send('state=' + encodeURIComponent(state));
        });
    </script>
</body>
</html>
