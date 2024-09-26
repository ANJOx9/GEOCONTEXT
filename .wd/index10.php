/*
INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'São Paulo','SP','-23.5506507','-46.6333824')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Rio de janeiro','RJ','-22.9110137','-43.2093727')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Santa Catarina','SC','-27.0628367','-51.114965')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Acre','AC','-9.0478679','-70.5264976')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Bahia','BA','-12.285251','-41.9294776')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Amazonas','AM','-4.479925','-63.5185396')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Pernambuco','PE','-8.4116316','-37.5919699')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Amapá','AP','1.3545442','-51.9161977')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Minas Gerais','MG','-18.5264844','-44.1588654')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Pará','PA','-4.7493933','-52.8973006')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Alagoas','AL','-9.6611661','-36.6502426')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Ceará','CE','-5.3264703','-39.7156073')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Distrito Federal','DF','-15.7754462','-47.7970891')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Espírito Santo','ES','-19.5687682','-40.1721991')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Goiás','GO','-15.9323662','-50.1392928')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Maranhão','MA','-5.2085503','-45.3930262')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Mato Grosso','MT','-12.2115009','-55.5716547')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Mato Grosso do Sul','MS','-19.5852564','-54.4794731')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Paraíba','PB','-7.1219366','-36.7246845')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Piauí','PI','-7.6992782','42.5043787')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Rio Grande do Norte','RN','-5.6781175','-36.4781776')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Rio Grande do Sul','RS','-29.8425284','-53.7680577')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Rondônia','Ro','-10.943145','-62.8277863')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Roraima','RR','2.135138','-61.3631922')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Sergipe','SE','-10.6743911','-37.3773519')

INSERT INTO `estados`(`id`, `nome`, `sigla`, `latitude`, `longitude`) 
VALUES (null,'Tocantins','TO','-10.8855129','-48.3716912')*/


https://nominatim.openstreetmap.org/search?state=insira%20o%20estado&format=json













tenho a tabela de estados com a latitude e logintude de todos os estados 



CREATE TABLE estados (
  id int(11) NOT NULL,
  nome varchar(255) NOT NULL,
  sigla varchar(10) NOT NULL,
  latitude varchar(255) NOT NULL,
  longitude varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela estados
--

INSERT INTO estados (id, nome, sigla, latitude, longitude) VALUES
(1, 'São Paulo', 'SP', '-23.5506507', '-46.6333824'),
(2, 'Rio de janeiro', 'RJ', '-22.9110137', '-43.2093727'),
(3, 'Santa Catarina', 'SC', '-27.0628367', '-51.114965'),
(4, 'Acre', 'AC', '-9.0478679', '-70.5264976'),
(5, 'Bahia', 'BA', '-12.285251', '-41.9294776'),
(6, 'Amazonas', 'AM', '-4.479925', '-63.5185396'),
(7, 'Minas Gerais', 'MG', '-18.5264844', '-44.1588654'),
(8, 'Pernambuco', 'PE', '-8.4116316', '-37.5919699'),
(9, 'Amapá', 'AP', '1.3545442', '-51.9161977'),
(10, 'Pará', 'PA', '-4.7493933', '-52.8973006'),
(11, 'Alagoas', 'AL', '-9.6611661', '-36.6502426'),
(12, 'Ceará', 'CE', '-5.3264703', '-39.7156073'),
(13, 'Distrito Federal', 'DF', '-15.7754462', '-47.7970891'),
(14, 'Espírito Santo', 'ES', '-19.5687682', '-40.1721991'),
(15, 'Goiás', 'GO', '-15.9323662', '-50.1392928'),
(16, 'Maranhão', 'MA', '-5.2085503', '-45.3930262'),
(17, 'Mato Grosso', 'MT', '-12.2115009', '-55.5716547'),
(18, 'Mato Grosso do Sul', 'MS', '-19.5852564', '-54.4794731'),
(19, 'Paraíba', 'PB', '-7.1219366', '-36.7246845'),
(20, 'Piauí', 'PI', '-7.6992782', '42.5043787'),
(21, 'Rio Grande do Norte', 'RN', '-5.6781175', '-36.4781776'),
(22, 'Rio Grande do Sul', 'RS', '-29.8425284', '-53.7680577'),
(23, 'Rondônia', 'RO', '-10.943145', '-62.8277863'),
(24, 'Roraima', 'RR', '2.135138', '-61.3631922'),
(25, 'Sergipe', 'SE', '-10.6743911', '-37.3773519'),
(26, 'Tocantins', 'TO', '-10.8855129', '-48.3716912');


Esse arquivo recebe a longitude e latitude de dois estados e informa a distância entre eles
includes-back/process.php
<?php
function haversine_distance($lat1, $lon1, $lat2, $lon2) {
    $earth_radius = 6371; // Raio da Terra em km

    // Converte as latitudes e longitudes de graus para radianos
    $lat1_rad = deg2rad($lat1);
    $lon1_rad = deg2rad($lon1);
    $lat2_rad = deg2rad($lat2);
    $lon2_rad = deg2rad($lon2);

    // Diferenças
    $dlat = $lat2_rad - $lat1_rad;
    $dlon = $lon2_rad - $lon1_rad;

    // Fórmula de Haversine
    $a = sin($dlat / 2) ** 2 + cos($lat1_rad) * cos($lat2_rad) * sin($dlon / 2) ** 2;
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    // Distância em km
    $distance = $earth_radius * $c;

    return $distance;
}

function get_lat_lon($state) {
    $url = "https://nominatim.openstreetmap.org/search?city=" . urlencode($state) . "&format=json";
    echo $url;
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    
    if (isset($data[0])) {
        $lat = $data[0]['lat'];
        $lon = $data[0]['lon'];
        return [$lat, $lon];
    } else {
        return [null, null];
    }
}

// Estados brasileiros
$states = ["São Paulo", "Rio de Janeiro", "Minas Gerais", "Espírito Santo", "Bahia", "Pernambuco", "Ceará", "Paraná", "Santa Catarina", "Rio Grande do Sul", "Goiás", "Mato Grosso", "Mato Grosso do Sul", "Distrito Federal", "Amazonas", "Pará", "Acre", "Rondônia", "Roraima", "Amapá", "Tocantins", "Sergipe", "Alagoas", "Paraíba", "Maranhão", "Piauí", "Mato Grosso", "São Paulo", "Rio de Janeiro"];

// Estado secreto aleatório
$secret_state = $states[array_rand($states)];
list($lat_secret, $lon_secret) = get_lat_lon($secret_state);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_state = $_POST['state'];
    list($lat_user, $lon_user) = get_lat_lon($input_state);

    if ($lat_user && $lon_user) {
        if (strcasecmp($input_state, $secret_state) === 0) {
            echo json_encode(['message' => 'Você ganhou']);
        } else {
            $distance = haversine_distance($lat_user, $lon_user, $lat_secret, $lon_secret);
            echo json_encode(['distance' => $distance]);
        }
    } else {
        echo json_encode(['message' => 'Estado não encontrado.']);
    }
}
?>

includes-back/conexao.php
<?php
//conexão com banco de dados
$_SeverName = "localhost";
$userName = "root";
$passWord = "";
$dbName = "geocontext";

$connect = mysqli_connect($_SeverName, $userName, $passWord, $dbName);
mysqli_set_charset($connect, "utf8");

if (mysqli_connect_error()) :
    echo "Erro na conexão: " . mysqli_connect_error();
    endif ;
?>




Crie uma pagina bonita que aleatoriamente sescolha um estado segredo, e um campo onde o usuário tenta adivinhar qual é o estado segredo
se a resposta estiver errado ele vai gerando um historico informando o nome do estado que colocou e a distancia do estado sequedro
que calculado pelo pelo arquivo process.php
para ele pegar a longitude a latitude de cada estado ele deve consultar no banco o estado que tenha aquele nome e trazer a latitude e longitude a mesma coisa é o estado segredo que deve ter a consulta 
no banco para saber a latitude e longitude de cada um

O ChatGPT disse:
ChatGPT
Claro, vou ajudar a criar uma página PHP que escolha um estado secreto aleatório e permita ao usuário tentar adivinhar qual é o estado secreto. Caso o palpite esteja errado, a página informará a distância entre o estado adivinhado e o estado secreto, além de manter um histórico dos palpites feitos.

Aqui está a estrutura básica da página:

1. Página HTML com Formulário e Histórico
Crie um arquivo chamado index.php para exibir o formulário e o histórico de palpites. Este arquivo também fará uma solicitação ao process.php para obter a distância e validar o palpite.

php
Copiar código
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo do Estado Secreto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .history {
            margin-top: 20px;
        }
        .history table {
            width: 100%;
            border-collapse: collapse;
        }
        .history table, .history th, .history td {
            border: 1px solid #ddd;
        }
        .history th, .history td {
            padding: 8px;
            text-align: left;
        }
        .history th {
            background-color: #f2f2f2;
        }
        .message {
            margin-top: 20px;
            font-size: 18px;
            color: #d9534f;
        }
        .success {
            color: #5bc0de;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Jogo do Estado Secreto</h1>

        <form id="stateForm">
            <div class="form-group">
                <label for="state">Digite o nome do estado:</label>
                <input type="text" id="state" name="state" required>
            </div>
            <button type="submit" class="btn">Enviar Palpite</button>
        </form>

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
        document.getElementById('stateForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var state = document.getElementById('state').value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'process.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                var response = JSON.parse(this.responseText);
                var messageElement = document.getElementById('message');
                var historyTableBody = document.getElementById('historyTableBody');

                if (response.message) {
                    messageElement.textContent = response.message;
                    messageElement.classList.add('success');
                } else if (response.distance) {
                    messageElement.textContent = 'Distância para o estado secreto: ' + response.distance.toFixed(2) + ' km';
                    messageElement.classList.remove('success');
                    var newRow = document.createElement('tr');
                    newRow.innerHTML = '<td>' + state + '</td><td>' + response.distance.toFixed(2) + '</td>';
                    historyTableBody.appendChild(newRow);
                }
            };
            xhr.send('state=' + encodeURIComponent(state));
        });
    </script>
</body>
</html>
2. Atualizar o process.php
Atualize o process.php para buscar a latitude e longitude dos estados no banco de dados, calcular a distância e retornar a resposta adequada. O arquivo deve ter a seguinte estrutura:

php
Copiar código
<?php
include 'conexao.php';

function haversine_distance($lat1, $lon1, $lat2, $lon2) {
    $earth_radius = 6371; // Raio da Terra em km

    // Converte as latitudes e longitudes de graus para radianos
    $lat1_rad = deg2rad($lat1);
    $lon1_rad = deg2rad($lon1);
    $lat2_rad = deg2rad($lat2);
    $lon2_rad = deg2rad($lon2);

    // Diferenças
    $dlat = $lat2_rad - $lat1_rad;
    $dlon = $lon2_rad - $lon1_rad;

    // Fórmula de Haversine
    $a = sin($dlat / 2) ** 2 + cos($lat1_rad) * cos($lat2_rad) * sin($dlon / 2) ** 2;
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    // Distância em km
    $distance = $earth_radius * $c;

    return $distance;
}

function get_lat_lon_from_db($state, $connect) {
    $query = "SELECT latitude, longitude FROM estados WHERE nome = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param('s', $state);
    $stmt->execute();
    $stmt->bind_result($latitude, $longitude);
    $stmt->fetch();
    $stmt->close();

    return [$latitude, $longitude];
}

// Escolhe um estado secreto aleatório
$states = ["São Paulo", "Rio de Janeiro", "Minas Gerais", "Espírito Santo", "Bahia", "Pernambuco", "Ceará", "Paraná", "Santa Catarina", "Rio Grande do Sul", "Goiás", "Mato Grosso", "Mato Grosso do Sul", "Distrito Federal", "Amazonas", "Pará", "Acre", "Rondônia", "Roraima", "Amapá", "Tocantins", "Sergipe", "Alagoas", "Paraíba", "Maranhão", "Piauí", "Mato Grosso", "São Paulo", "Rio de Janeiro"];
$secret_state = $states[array_rand($states)];

list($lat_secret, $lon_secret) = get_lat_lon_from_db($secret_state, $connect);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_state = $_POST['state'];
    list($lat_user, $lon_user) = get_lat_lon_from_db($input_state, $connect);

    if ($lat_user && $lon_user) {
        if (strcasecmp($input_state, $secret_state) === 0) {
            echo json_encode(['message' => 'Você ganhou!']);
        } else {
            $distance = haversine_distance($lat_user, $lon_user, $lat_secret, $lon_secret);
            echo json_encode(['distance' => $distance]);
        }
    } else {
        echo json_encode(['message' => 'Estado não encontrado.']);
    }
}
?>
3. Atualizar conexao.php
Certifique-se de que seu arquivo conexao.php esteja configurado corretamente para conectar-se ao banco de dados:

php
Copiar código
<?php
//conexão com banco de dados
$_SeverName = "localhost";
$userName = "root";
$passWord = "";
$dbName = "geocontext";

$connect = mysqli_connect($_SeverName, $userName, $passWord, $dbName);
mysqli_set_charset($connect, "utf8");

if (mysqli_connect_error()) :
    echo "Erro na conexão: " . mysqli_connect_error();
endif;
?>
Com esses arquivos, você terá uma página onde o usuário pode adivinhar o estado secreto e ver a distância para o estado secreto se o palpite estiver errado. O histórico dos palpites será exibido na tabela abaixo do formulário.



Você disse:
form id\="stateForm">

aqui não deveria ter o action e method post para o arquivo includes-back/process.php?
O ChatGPT disse:
ChatGPT
Você está absolutamente certo! O formulário HTML precisa de um atributo action para indicar para qual URL os dados devem ser enviados e o atributo method deve ser definido como POST para garantir que os dados sejam enviados corretamente para o servidor. No exemplo fornecido, estamos usando JavaScript (AJAX) para enviar o formulário assíncronamente, portanto, não precisamos dos atributos action e method no formulário HTML. No entanto, se você preferir um formulário tradicional sem AJAX, você precisará desses atributos.

Aqui está uma correção com o action e method no formulário para um envio tradicional:

Página HTML com Formulário e Histórico (Envio Tradicional)
php
Copiar código
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo do Estado Secreto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .history {
            margin-top: 20px;
        }
        .history table {
            width: 100%;
            border-collapse: collapse;
        }
        .history table, .history th, .history td {
            border: 1px solid #ddd;
        }
        .history th, .history td {
            padding: 8px;
            text-align: left;
        }
        .history th {
            background-color: #f2f2f2;
        }
        .message {
            margin-top: 20px;
            font-size: 18px;
        }
        .success {
            color: #5bc0de;
        }
        .error {
            color: #d9534f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Jogo do Estado Secreto</h1>

        <form id="stateForm" action="includes-back/process.php" method="POST">
            <div class="form-group">
                <label for="state">Digite o nome do estado:</label>
                <input type="text" id="state" name="state" required>
            </div>
            <button type="submit" class="btn">Enviar Palpite</button>
        </form>

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
        document.getElementById('stateForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var state = document.getElementById('state').value;
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
                }
            };
            xhr.send('state=' + encodeURIComponent(state));
        });
    </script>
</body>
</html>
O que mudou:
O formulário agora possui os atributos action="includes-back/process.php" e method="POST", o que permite que o formulário seja enviado ao servidor sem usar JavaScript.
O script JavaScript ainda está presente para lidar com a submissão assíncrona e atualizar a página dinamicamente.
Se você estiver usando AJAX (JavaScript assíncrono), os atributos action e method são opcionais, pois o formulário é manipulado diretamente pelo JavaScript. Se você optar por usar apenas HTML e PHP sem JavaScript, esses atributos são necessários para que o formulário seja enviado corretamente.



dh