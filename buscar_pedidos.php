<?php
include_once('config.php');
session_start();

if (isset($_GET['data'])) {
    $data = $conexao->real_escape_string($_GET['data']);
    $id_turma = $_SESSION['id_turma'];

    $sql = "SELECT DISTINCT p.pedido AS pedido
            FROM pedidos AS p
            INNER JOIN dadoscliente AS dc ON p.cnpj = dc.cnpj
            WHERE dc.data = '$data' AND p.id_turma = '$id_turma'";

    $resultado = $conexao->query($sql);
    $pedido = [];
    while ($row = $resultado->fetch_assoc()) {
        $pedido[] = $row['pedido'];
    }

    echo json_encode($pedido);
}
?>
