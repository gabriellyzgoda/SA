<?php
include_once('config.php');
header('Content-Type: application/json');

// Recupera o parâmetro da URL
$email = isset($_GET['email']) ? $conexao->real_escape_string ($_GET['email']) : '';

if ($email !== '') {
    $sql = "SELECT * FROM cadastro WHERE email = '$email'";
    $resultado = $conexao->query($sql);

    $exists = $resultado->num_rows > 0;
    echo json_encode(['exists' => $exists]);
} else {
    echo json_encode(['exists' => false]);
}
?>
