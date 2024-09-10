<?php
include_once('config.php');

if (isset($_GET['placa'])) {
    $placa = $conexao->real_escape_string($_GET['placa']);

    $sql = "SELECT * FROM container WHERE placa_caminhao = '$placa'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode([]);
    }
}
?>
