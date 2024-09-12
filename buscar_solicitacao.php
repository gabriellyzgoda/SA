<?php
include_once('config.php');

if (isset($_GET['data'])) {
    $data = $conexao->real_escape_string($_GET['data']);

    $sql = "SELECT DISTINCT solicitacao FROM solicitacoes WHERE data = '$data'";

    $resultado = $conexao->query($sql);
    $solicitacao = [];
    while ($row = $resultado->fetch_assoc()) {
        $solicitacao[] = $row['solicitacao'];
    }

    echo json_encode($solicitacao);
}
?>
