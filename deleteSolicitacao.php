<?php
include_once('config.php');
if (isset($_GET['solicitacao']) && !empty($_GET['solicitacao'])) {
    
    $solicitacao = mysqli_real_escape_string($conexao, $_GET['solicitacao']);

    if (!$conexao) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }
    $sqlDelete = "DELETE FROM solicitacoes WHERE solicitacao = '$solicitacao'";

    $resultado = $conexao->query($sqlDelete);

    if ($resultado) {
        header('Location: solicitacoes.php');
        exit();
    } else {
        echo "Erro ao excluir a solicitação: " . $conexao->error;
    }
} else {
    echo "Nenhuma solicitação foi passada para exclusão.";
}
