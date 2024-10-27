<?php
include_once('config.php');
if (!empty($_GET['pedido'])) {

    
    $pedido = mysqli_real_escape_string($conexao, $_GET['pedido']);

    $sqlDelete = "DELETE FROM pedidos WHERE pedido = $pedido";
    $resultado = $conexao->query($sqlDelete);

    if ($resultado) {
        header('Location: meuspedidos.php?excluido=sucesso');
        } else {
        echo "Erro ao excluir o pedido: " . $conexao->error;
    }
} else {
    echo "Número do pedido não especificado.";
}
header('Location: meuspedidos.php?excluido=sucesso');
