<?php
include_once('config.php');

header('Content-Type: application/json');

$id = isset($_GET['id']) ? $conexao->real_escape_string($_GET['id']) : '';

if ($id !== '') {
    $sql = "SELECT * FROM danfe WHERE id = '$id'";
    $resultado = $conexao->query($sql);

    $exists = $resultado->num_rows > 0;
    echo json_encode(['exists' => $exists]);
} else {
    echo json_encode(['exists' => false]);
}
?>
