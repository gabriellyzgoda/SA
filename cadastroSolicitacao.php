<?php

$hostname = "127.0.0.1";
$user = "root";
$password = "";
$database = "sa";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    // Evita caracteres especiais (SQL Inject)
    $solicitacao = $conexao->real_escape_string($_POST['solicitacao']);

    $produto = $conexao->real_escape_string($_POST['produto']);
    $unidades = (int) $conexao->real_escape_string($_POST['unidades']);  // Convertendo para inteiro
    $quantidades = (int) $conexao->real_escape_string($_POST['quantidades']);  // Convertendo para inteiro
    $valor = (float) $conexao->real_escape_string($_POST['valor']);  // Convertendo para float
    $total1 = $valor * $quantidades;

    $produto2 = $conexao->real_escape_string($_POST['produto2']);
    $unidades2 = (int) $conexao->real_escape_string($_POST['unidades2']);  // Convertendo para inteiro
    $quantidades2 = (int) $conexao->real_escape_string($_POST['quantidades2']);  // Convertendo para inteiro
    $valor2 = (float) $conexao->real_escape_string($_POST['valor2']);  // Convertendo para float
    $total2 = $valor2 * $quantidades2;

    $produto3 = $conexao->real_escape_string($_POST['produto3']);
    $unidades3 = (int) $conexao->real_escape_string($_POST['unidades3']);  // Convertendo para inteiro
    $quantidades3 = (int) $conexao->real_escape_string($_POST['quantidades3']);  // Convertendo para inteiro
    $valor3 = (float) $conexao->real_escape_string($_POST['valor3']);  // Convertendo para float
    $total3 = $valor3 * $quantidades3;

    $produto4 = $conexao->real_escape_string($_POST['produto4']);
    $unidades4 = (int) $conexao->real_escape_string($_POST['unidades4']);  // Convertendo para inteiro
    $quantidades4 = (int) $conexao->real_escape_string($_POST['quantidades4']);  // Convertendo para inteiro
    $valor4 = (float) $conexao->real_escape_string($_POST['valor4']);  // Convertendo para float
    $total4 = $valor4 * $quantidades4;

    $totalcompra = $total1 + $total2 + $total3 + $total4;

    $observacoes = $conexao->real_escape_string($_POST['observacoes']);

    // Preparar e executar as consultas SQL
    $sql = "INSERT INTO `solicitacoes` (`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`, `data`) 
            VALUES ('$solicitacao', '$produto', '$unidades', '$quantidades', '$valor', '$totalcompra', '$observacoes', '".date("Y-m-d")."')";
    echo $sql;
    $conexao->query($sql);

    $sql = "INSERT INTO `solicitacoes` (`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`, `data`) 
            VALUES ('$solicitacao', '$produto2', '$unidades2', '$quantidades2', '$valor2', '$totalcompra', '$observacoes', '".date("Y-m-d")."')";
    echo $sql;
    $conexao->query($sql);

    $sql = "INSERT INTO `solicitacoes` (`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`, `data`) 
            VALUES ('$solicitacao', '$produto3', '$unidades3', '$quantidades3', '$valor3', '$totalcompra', '$observacoes', '".date("Y-m-d")."')";
    echo $sql;
    $conexao->query($sql);

    $sql = "INSERT INTO `solicitacoes` (`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`, `data`) 
            VALUES ('$solicitacao', '$produto4', '$unidades4', '$quantidades4', '$valor4', '$totalcompra', '$observacoes', '".date("Y-m-d")."')";
    echo $sql;
    $conexao->query($sql);

    $conexao->close();
    header('Location: solicitacoes.php', true, 301);
}
?>
