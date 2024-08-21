<?php
include_once('config.php');

header('Content-Type: application/json');

$solicitacao = isset($_GET['solicitacao']) ? $conexao->real_escape_string($_GET['solicitacao']) : '';

if ($solicitacao !== '') {
    $sql = "SELECT * FROM solicitacoes WHERE solicitacao = '$solicitacao'";
    $resultado = $conexao->query($sql);

    $exists = $resultado->num_rows > 0;
    echo json_encode(['exists' => $exists]);
} else {
    echo json_encode(['exists' => false]);
}
?>
