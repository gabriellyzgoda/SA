<?php
session_start();
include_once('config.php');

if (isset($_GET['pedido'])) {
    $numeroPedido = $_GET['pedido'];

    // Verificar se o número do pedido já existe
    $sql = "SELECT COUNT(*) FROM pedidos WHERE pedido = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('i', $numeroPedido);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo json_encode(array('exists' => true));
    } else {
        echo json_encode(array('exists' => false));
    }
}
?>