<?php
session_start();
$hostname = "127.0.0.1";
$user = "root";
$password = "";
$database = "sa";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    $solicitacao = $conexao->real_escape_string($_POST['solicitacao']);
    $id_turma = $_SESSION['id_turma'];

    $produto = $conexao->real_escape_string($_POST['produto']);
    $unidades = (int) $conexao->real_escape_string($_POST['unidades']);  
    $quantidades = (int) $conexao->real_escape_string($_POST['quantidades']);  
    $valor = (float) $conexao->real_escape_string($_POST['valor']);  
    $total1 = $valor * $quantidades;

    $produto2 = $conexao->real_escape_string($_POST['produto2']);
    $unidades2 = (int) $conexao->real_escape_string($_POST['unidades2']);  
    $quantidades2 = (int) $conexao->real_escape_string($_POST['quantidades2']);  
    $valor2 = (float) $conexao->real_escape_string($_POST['valor2']);  
    $total2 = $valor2 * $quantidades2;

    $produto3 = $conexao->real_escape_string($_POST['produto3']);
    $unidades3 = (int) $conexao->real_escape_string($_POST['unidades3']);  
    $quantidades3 = (int) $conexao->real_escape_string($_POST['quantidades3']);  
    $valor3 = (float) $conexao->real_escape_string($_POST['valor3']);  
    $total3 = $valor3 * $quantidades3;

    $produto4 = $conexao->real_escape_string($_POST['produto4']);
    $unidades4 = (int) $conexao->real_escape_string($_POST['unidades4']); 
    $quantidades4 = (int) $conexao->real_escape_string($_POST['quantidades4']); 
    $valor4 = (float) $conexao->real_escape_string($_POST['valor4']);  
    $total4 = $valor4 * $quantidades4;

    $totalcompra = $total1 + $total2 + $total3 + $total4;

    $observacoes = $conexao->real_escape_string($_POST['observacoes']);

    // Preparar e executar as consultas SQL
    $sql = "INSERT INTO `solicitacoes` (`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`, `data`, `id_turma`) 
            VALUES ('$solicitacao', '$produto', '$unidades', '$quantidades', '$valor', '$totalcompra', '$observacoes', '".date("Y-m-d")."', '$id_turma')";
    echo $sql;
    $conexao->query($sql);

    $sql = "INSERT INTO `solicitacoes` (`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`, `data`, `id_turma`) 
            VALUES ('$solicitacao', '$produto2', '$unidades2', '$quantidades2', '$valor2', '$totalcompra', '$observacoes', '".date("Y-m-d")."', '$id_turma')";
    echo $sql;
    $conexao->query($sql);

    $sql = "INSERT INTO `solicitacoes` (`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`, `data`, `id_turma`) 
            VALUES ('$solicitacao', '$produto3', '$unidades3', '$quantidades3', '$valor3', '$totalcompra', '$observacoes', '".date("Y-m-d")."', '$id_turma')";
    echo $sql;
    $conexao->query($sql);

    $sql = "INSERT INTO `solicitacoes` (`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`, `data`, `id_turma`) 
            VALUES ('$solicitacao', '$produto4', '$unidades4', '$quantidades4', '$valor4', '$totalcompra', '$observacoes', '".date("Y-m-d")."', '$id_turma')";
    echo $sql;
    $conexao->query($sql);

    $conexao->close();
    header('Location: solicitacoes.php', true, 301);
}
?>
