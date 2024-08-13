<?php
session_start();
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extrair dados do POST
    $doca = $_POST['doca'];
    $produtos = $_POST['produto'];
    $unidades = $_POST['unidades'];
    $quantidades = $_POST['quantidades'];
    $carregado = isset($_POST['carregado']) ? $_POST['carregado'] : array();
    $observacoes = $_POST['observacoes'];

    // Atualizar o banco de dados
    foreach ($produtos as $index => $produto) {
        $produto = $conexao->real_escape_string($produto);
        $unidade = $conexao->real_escape_string($unidades[$index]);
        $quantidade = $conexao->real_escape_string($quantidades[$index]);
        $observacao = $conexao->real_escape_string($observacoes[$index]);

        // Verifica se o produto foi carregado
        $carregadoStatus = in_array($index, $carregado) ? 1 : 0;

        $sql = "UPDATE solicitacoes 
                SET carregado = '$carregadoStatus', vistoria = '$observacao'
                WHERE produto = '$produto' AND unidades = '$unidade' AND quantidades = '$quantidade'";

        if (!$conexao->query($sql)) {
            echo "Erro ao atualizar a solicitação: " . $conexao->error;
        }
    }

    // Atualiza a doca
    $sql = "UPDATE solicitacoes 
            SET doca = '$doca'
            WHERE solicitacao = '$solicitacao'";
    header("Location: vistoriaConferencia.php");
    exit;
}
?>
