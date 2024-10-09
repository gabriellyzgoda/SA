<?php
include_once('config.php');
header('Content-Type: application/json');

$nome = isset($_GET['nome']) ? $conexao->real_escape_string ($_GET['nome']) : '';

if ($nome !== '') {
    $sql = "SELECT * FROM turma WHERE nome = '$nome'";
    $resultado = $conexao->query($sql);

    $exists = $resultado->num_rows > 0;
    echo json_encode(['exists' => $exists]);
} else {
    echo json_encode(['exists' => false]);
}
?>
