<?php
include_once('config.php');

if (isset($_GET['data'])) {
    $data = $conexao->real_escape_string($_GET['data']);

    $sql = "SELECT DISTINCT placa_caminhao FROM container WHERE data = '$data'";
    $resultado = $conexao->query($sql);
    $placas = [];
    while ($row = $resultado->fetch_assoc()) {
        $placas[] = $row['placa_caminhao'];
    }

    echo json_encode($placas);
}
?>
