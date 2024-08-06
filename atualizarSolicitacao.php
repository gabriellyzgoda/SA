<?php
include_once('config.php');

if ($conexao -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao -> connect_error;
    exit();
} else {

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idsSelecionados = [];
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'select_') === 0 && !empty($value)) {
            $index = str_replace('select_', '', $key);
            $posicao = isset($_POST['posicao_' . $index]) ? $_POST['posicao_' . $index] : '';
  
            // Verifica se a posição não está vazia
            if (!empty($posicao)) {
                $idsSelecionados[] = [
                    'id' => intval($value),
                    'posicao' => $posicao
                ];
            }
        }
    }
  
    if (!empty($idsSelecionados)) {
        foreach ($idsSelecionados as $info) {
            $id = $info['id'];
            $posicao = $info['posicao'];
            // Atualiza o banco de dados com a nova posição
            $sql = "UPDATE solicitacoes 
                    SET posicao = '$posicao' 
                    WHERE id = '$id';";
            $conexao->query($sql);
        }
    }
    $conexao -> close();
    header('Location: expedicao.php', true, 301);
}}
?>
