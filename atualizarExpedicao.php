<?php
include_once('config.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ids']) && isset($_POST['doca'])) {
        $ids = $_POST['ids']; // IDs dos produtos selecionados
        $doca = $_POST['doca']; // Número da doca

        // Escapar os dados para evitar SQL Injection
        $doca = $conexao->real_escape_string($doca);

        $erro_ocorrido = false;

        foreach ($ids as $id) {
            $id = $conexao->real_escape_string($id);
            
            // Atualiza a doca para os produtos selecionados
            $sql = "UPDATE solicitacoes 
                    SET doca = '$doca' 
                    WHERE id = '$id'";

            if (!$conexao->query($sql)) {
                echo "Erro ao atualizar produto com ID $id: " . $conexao->error;
                $erro_ocorrido = true;
            }
        }

        // Fechar conexão
        $conexao->close();

        // Redirecionar para a página expedicao.php
        if (!$erro_ocorrido) {
            header('Location: expedicao.php');
            exit; // Certifique-se de chamar exit após o redirecionamento
        }
    } else {
        echo "IDs dos produtos ou doca não fornecidos.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
