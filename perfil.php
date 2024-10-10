<?php
session_start(); // Inicia a sessão

// Conexão com o banco de dados
$servername = "localhost";
$username = "root"; // Altere para seu nome de usuário do MySQL
$password = ""; // Altere para sua senha do MySQL, se houver
$dbname = "geocontext"; // Altere para o nome do seu banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redireciona para a página de login se não estiver logado
    exit();
}

// Consulta para obter informações do player com base no ID do usuário logado
$sql = "SELECT id, nome, senha, imagem_perfil FROM players WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar a consulta: " . $conn->error); // Verifica se houve erro ao preparar a consulta
}

// Usa o ID do usuário logado para a consulta
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se o jogador foi encontrado
if ($result->num_rows === 0) {
    die("Usuário não encontrado!"); // Se nenhum usuário for encontrado com esse id
}

$player = $result->fetch_assoc();
$stmt->close(); // Fecha a declaração
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="perfil.css">
    <style>
        /* Estilos adicionais para os botões */
        .voltar-jogo, .alterar-perfil {
            position: absolute;
            padding: 10px 15px;
            background-color: #007bff; /* Cor de fundo do botão */
            color: white; /* Cor do texto */
            border: none; /* Sem borda */
            border-radius: 5px; /* Bordas arredondadas */
            cursor: pointer; /* Cursor em forma de mão */
            font-size: 16px; /* Tamanho da fonte */
            z-index: 1000; /* Garante que o botão fique acima de outros elementos */
        }
        
        .voltar-jogo {
            top: 15px; /* Distância do topo */
            left: 15px; /* Distância da esquerda */
        }
        
        .voltar-jogo:hover {
            background-color: #0056b3; /* Cor ao passar o mouse */
        }

        .alterar-perfil {
            top: 15px; /* Distância do topo */
            right: 15px; /* Distância da direita */
        }
        
        .alterar-perfil:hover {
            background-color: #0056b3; /* Cor ao passar o mouse */
        }
    </style>
</head>
<body>

<!-- Botão Voltar ao Jogo -->
<button class="voltar-jogo" onclick="location.href='jogo.php'">Voltar ao Jogo</button>

<!-- Botão Alterar Perfil -->
<button class="alterar-perfil" onclick="location.href='perfil-alt.php'">Alterar Perfil</button>

<div class="perfil-container">
    <!-- ID do usuário no canto superior esquerdo -->
    <div id="user-id">ID: <?php echo htmlspecialchars($player['id']); ?></div>
    
    <div class="profile-picture">
        <?php
        // Verifica se o campo de imagem não está vazio e se o arquivo existe
        if (!empty($player['imagem_perfil']) && file_exists('uploads/' . $player['imagem_perfil'])) {
            echo "<img src='uploads/" . htmlspecialchars($player['imagem_perfil']) . "' alt='Foto de Perfil'>";
        } else {
            echo "<span>Sem Foto</span>";
        }
        ?>
    </div>

    <div class="separator"></div> <!-- Coluna azul -->

    <div class="perfil-info">
        <h2><?php echo htmlspecialchars($player['nome']); ?></h2> <!-- Nome do usuário próximo ao divisor azul -->
        
        <!-- Campo da senha com opção de visualização -->
        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" value="<?php echo htmlspecialchars($player['senha']); ?>" readonly>
            <button type="button" onclick="togglePassword()">Mostrar</button>
        </div>
    </div>
</div>

<script>
// Função para alternar a visualização da senha
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
}
</script>

</body>
</html>

<?php
$conn->close(); // Fecha a conexão com o banco de dados
?>
