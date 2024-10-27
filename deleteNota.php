<?php
include_once('config.php');
if (!empty($_GET['id'])) {

    
    $id = mysqli_real_escape_string($conexao, $_GET['id']);

    $sqlDelete = "DELETE FROM danfe WHERE id = $id";
    $resultado = $conexao->query($sqlDelete);

    if ($resultado) {
        header('Location: minhadanfe.php');
        } else {
        echo "Erro ao excluir o pedido: " . $conexao->error;
    }
} else {
    echo "Número do pedido não especificado.";
}
header('Location: minhadanfe.php');
