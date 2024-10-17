<?php
session_start(); // Inicia a sessão

// Conexão com o banco de dados
$servername = "localhost";
$username = "root"; // Altere para seu nome de usuário do MySQL
$password = ""; // Altere para sua senha do MySQL, se houver
$dbname = "geocontext"; // Altere para o nome do seu banco de dados

// Habilita o modo de erro do MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

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
$sql = "SELECT id, nome, imagem_fundo FROM players WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar a consulta: " . $conn->error);
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

// Processa a atualização de nome e imagem
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Atualiza o nome
    if (!empty($_POST['nome'])) {
        $novo_nome = $_POST['nome'];
        $sql = "UPDATE players SET nome = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $novo_nome, $_SESSION['user_id']);
        $stmt->execute();
    }

    // Processa o upload da nova imagem de fundo
    if (isset($_FILES['fundo'])) {
        $imagem_fundo = $_FILES['fundo'];
        $imagem_fundo_nome = time() . "_" . basename($imagem_fundo['name']);
        $imagem_fundo_destino = 'uploads/' . $imagem_fundo_nome;

        if (move_uploaded_file($imagem_fundo['tmp_name'], $imagem_fundo_destino)) {
            $sql = "UPDATE players SET imagem_fundo = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $imagem_fundo_nome, $_SESSION['user_id']);
            $stmt->execute();
        }
    }

    // Processa o upload da nova imagem de perfil
    if (isset($_FILES['imagem'])) {
        $imagem = $_FILES['imagem'];
        $imagem_nome = time() . "_" . basename($imagem['name']);
        $imagem_destino = 'uploads/' . $imagem_nome;

        if (move_uploaded_file($imagem['tmp_name'], $imagem_destino)) {
            $sql = "UPDATE players SET imagem_perfil = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $imagem_nome, $_SESSION['user_id']);
            $stmt->execute();
        }
    }

    // Redireciona para evitar resubmissão
    header("Location: perfil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="perfil.css">
    <style>
        /* Estilos gerais */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('uploads/<?php echo htmlspecialchars($player['imagem_fundo']); ?>'); /* Define a imagem de fundo */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative; /* Permite posicionamento absoluto dos botões */
        }

        /* Container principal do perfil */
        .perfil-container {
            width: 100%; /* Largura responsiva */
            max-width: 600px; /* Largura máxima */
            padding: 20px;
            background: rgba(255, 255, 255, 0.8); /* Fundo semi-transparente */
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex; /* Flexbox para layout */
            flex-direction: column; /* Alinha os itens em coluna */
            align-items: center; /* Centraliza horizontalmente */
            text-align: center; /* Centraliza o texto */
        }

        /* Estilo da foto de perfil */
        .profile-picture img {
            max-width: 150px; /* Limita a largura da imagem */
            border-radius: 50%; /* Faz a imagem circular */
            margin-bottom: 0px; /* Espaçamento abaixo da imagem */
        }

        /* Estilo das informações do usuário */
        .perfil-info {
            margin-top: 20px; /* Espaçamento acima da seção de informações */
        }

        /* Estilos dos botões */
        .voltar-jogo {
            position: absolute; /* Posicionamento absoluto */
            padding: 10px 15px;
            background-color: #007bff; /* Cor de fundo do botão */
            color: white; /* Cor do texto */
            border: none; /* Sem borda */
            border-radius: 5px; /* Bordas arredondadas */
            cursor: pointer; /* Cursor em forma de mão */
            font-size: 16px; /* Tamanho da fonte */
            top: 20px; /* Distância do topo */
            left: 20px; /* Distância da esquerda */
        }

        .voltar-jogo:hover {
            background-color: #0056b3; /* Cor ao passar o mouse */
        }

        /* Estilo do formulário de atualização */
        form {
            margin-top: 20px; /* Espaçamento acima do formulário */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"], input[type="file"] {
            margin-top: 10px; /* Espaçamento acima do campo */
            padding: 8px;
            border: 1px solid #ccc; /* Borda do campo */
            border-radius: 5px; /* Bordas arredondadas */
            width: 80%; /* Largura do campo */
        }

        input[type="submit"] {
            margin-top: 15px; /* Espaçamento acima do botão de envio */
            padding: 10px 15px;
            background-color: #007bff; /* Cor de fundo do botão */
            color: white; /* Cor do texto */
            border: none; /* Sem borda */
            border-radius: 5px; /* Bordas arredondadas */
            cursor: pointer; /* Cursor em forma de mão */
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Cor ao passar o mouse */
        }

        .custom-file-upload {
            display: inline-block;
            padding: 10px 15px;
            cursor: pointer;
            background-color: #007bff; /* Cor de fundo */
            color: white; /* Cor do texto */
            border-radius: 5px; /* Bordas arredondadas */
            margin-top: 10px; /* Espaçamento acima */
        }

        .custom-file-upload:hover {
            background-color: #0056b3; /* Cor ao passar o mouse */
        }
    </style>
</head>
<body>

<div class="perfil-container">
    <div class="perfil-info">
        <h2><?php echo htmlspecialchars($player['nome']); ?></h2>
    </div>

    <!-- Formulário para atualizar nome e imagem -->
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nome" placeholder="Novo Nome" required><br>
        
        <label for="fundo" class="custom-file-upload">
            Escolher plano de fundo
        </label>
        <input type="file" id="fundo" name="fundo" accept="image/*" style="display: none;">
        

        <input type="submit" value="Atualizar perfil"><br>
    </form>
</div>

<!-- Botão Voltar ao Jogo -->
<button class="voltar-jogo" onclick="location.href='jogo.php'">Voltar ao Jogo</button>

</body>
</html>

<?php
$conn->close(); // Fecha a conexão com o banco de dados
?>
    