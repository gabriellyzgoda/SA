<?php
include_once('config.php');

header('Content-Type: application/json');

if (isset($_GET['produto'])) {
    
    $produto = $conexao->real_escape_string($_GET['produto']);

    $sql = "SELECT produto, quantidade, posicao 
            FROM pedidos 
            WHERE produto 
            LIKE '%$produto%';";
    $resultado = $conexao->query($sql);

    $produtos = [];
    while ($row = $resultado->fetch_assoc()) {
        $produtos[] = $row;
    }
    echo json_encode(['produtos' => $produtos]);

} elseif (isset($_GET['posicao'])) {

    $posicao = $conexao->real_escape_string($_GET['posicao']);
    $sql = "SELECT produto, quantidade, posicao 
            FROM pedidos 
            WHERE posicao = '$posicao';";
    $resultado = $conexao->query($sql);

    $produtos = [];
    while ($row = $resultado->fetch_assoc()) {
        $produtos[] = $row;
    }
    echo json_encode(['produtos' => $produtos]);
}
?>
