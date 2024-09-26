<?php
session_start();
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
    return $earth_radius * $c;
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

// Inicializa o estado secreto se não estiver definido
if (!isset($_SESSION['secret_state'])) {
    $states = [
        "São Paulo", "Rio de Janeiro", "Minas Gerais", "Espírito Santo", "Bahia", 
        "Pernambuco", "Ceará", "Paraná", "Santa Catarina", "Rio Grande do Sul", 
        "Goiás", "Mato Grosso", "Mato Grosso do Sul", "Distrito Federal", 
        "Amazonas", "Pará", "Acre", "Rondônia", "Roraima", 
        "Amapá", "Tocantins", "Sergipe", "Alagoas", "Paraíba", 
        "Maranhão", "Piauí"
    ];
    $secret_state = $states[array_rand($states)];
    $_SESSION['secret_state'] = $secret_state;
    list($lat_secret, $lon_secret) = get_lat_lon_from_db($secret_state, $connect);
    $_SESSION['lat_secret'] = $lat_secret;
    $_SESSION['lon_secret'] = $lon_secret;
} else {
    $secret_state = $_SESSION['secret_state'];
    $lat_secret = $_SESSION['lat_secret'];
    $lon_secret = $_SESSION['lon_secret'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_state = trim($_POST['state']);
    list($lat_user, $lon_user) = get_lat_lon_from_db($input_state, $connect);

    $response = []; // Inicializa a resposta

    if ($lat_user && $lon_user) {
        if (strcasecmp($input_state, $secret_state) === 0) {
            // Jogador acertou
            session_destroy(); // Opcional: destrói a sessão
            $response['success'] = true; // Marca como sucesso
            $response['redirect'] = 'congratulations.php'; // Adiciona o redirecionamento
            
        } else {
            // Calcula a distância para o estado secreto
            $distance = haversine_distance($lat_user, $lon_user, $lat_secret, $lon_secret);
            $response['distance'] = $distance;
        }
    } else {
        $response['success'] = false; // Marca como erro
        $response['message'] = 'Estado não encontrado.';
    }

    echo json_encode($response);
}
?>
    