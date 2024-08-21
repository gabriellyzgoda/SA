<?php
include_once('config.php');
header('Content-Type: application/json');

// Recupera o parâmetro da URL
$placa_caminhao = isset($_GET['placa_caminhao']) ? $conexao->real_escape_string ($_GET['placa_caminhao']) : '';

if ($placa_caminhao !== '') {
    $sql = "SELECT * FROM container WHERE placa_caminhao = '$placa_caminhao'";
    $resultado = $conexao->query($sql);

    $exists = $resultado->num_rows > 0;
    echo json_encode(['exists' => $exists]);
} else {
    echo json_encode(['exists' => false]);
}
?>
