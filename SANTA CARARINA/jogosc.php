<?php
session_start();

// Conexão com o banco de dados
$servername = "localhost"; // ou o IP do seu servidor
$username = "seu_usuario"; // seu usuário do banco de dados
$password = "sua_senha"; // sua senha do banco de dados
$dbname = "jogo_adivinhacao";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém as cidades e dicas do banco de dados
$sql = "SELECT nome, dica FROM cidades";
$result = $conn->query($sql);

$cidades = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cidades[$row['nome']] = $row['dica'];
    }
}

if (!isset($_SESSION['cidade'])) {
    $chave = array_rand($cidades);
    $_SESSION['cidade'] = $chave;
    $_SESSION['dicas'] = 0;
}

$cidade = $_SESSION['cidade'];
$dicas = array_values($cidades);
$dica = $dicas[$_SESSION['dicas']];

if (isset($_POST['palpite'])) {
    $palpite = trim($_POST['palpite']);
    
    if (strcasecmp($palpite, $cidade) === 0) {
        echo "<div class='resultado'>Parabéns! Você acertou: $cidade. <a href='?reset=true'>Jogar novamente</a></div>";
        session_destroy();
    } else {
        $_SESSION['dicas']++;
        
        if ($_SESSION['dicas'] < count($cidades)) {
            echo "<div class='resultado'>Errado! Aqui vai uma dica: $dica</div>";
        } else {
            echo "<div class='resultado'>Você não conseguiu adivinhar. A cidade era: $cidade. <a href='?reset=true'>Jogar novamente</a></div>";
            session_destroy();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Jogo de Adivinhação</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Qual é a cidade de Santa Catarina?</h1>
        <form method="post">
            <input type="text" name="palpite" placeholder="Digite seu palpite" required>
            <button type="submit">Adivinhar</button>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
