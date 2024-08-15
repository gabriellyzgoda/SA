<?php
include_once('config.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $produto_ids = $_POST['pedido_id'];
    $faltando = isset($_POST['faltando']) ? $_POST['faltando'] : [];
    $avaria = isset($_POST['avaria']) ? $_POST['avaria'] : [];
    $notafiscal = $conexao->real_escape_string($_POST['notafiscal']);
    $doca = $conexao->real_escape_string($_POST['doca']); // Obtém a doca do formulário

    // Processa cada produto
    foreach ($produto_ids as $produto_id) {
        // Verifica se o produto está marcado como faltando ou avariado
        $faltandoStatus = in_array($produto_id, $faltando) ? 1 : 0;
        $avariaStatus = in_array($produto_id, $avaria) ? 1 : 0;

        // Atualiza ou insere na tabela de pedidos
        $sql = "UPDATE `pedidos` 
                SET `faltando` = $faltandoStatus, `avaria` = $avariaStatus
                WHERE id = '$produto_id'";
                
        if (!$conexao->query($sql)) {
            die("Erro na atualização do produto: " . $conexao->error);
        }
    }

    // Atualiza a doca na tabela pedidos
    $sql_update = "UPDATE pedidos 
                   SET doca='$doca' 
                   WHERE id_danfe='$notafiscal'";
                   
    if (!$conexao->query($sql_update)) {
        die("Erro na atualização da doca: " . $conexao->error);
    }

    $conexao->close();
    // Redirecionar ou exibir mensagem de sucesso
    header("Location: pedidodoca.php"); // Altere para a página desejada
    exit;
}
?>
