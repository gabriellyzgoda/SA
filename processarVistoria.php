<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || $_SESSION['professor'] != 0) {
  header("Location: unauthorized.php");
  exit;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Coleta os dados do formulário
  $observacoes = $_POST['observacoes'];
  $carregado = $_POST['carregado']; // IDs dos produtos que foram carregados

  // Atualiza as observações na tabela 'solicitacoes'
  foreach ($observacoes as $index => $observacao) {
    // Verifica se o produto está marcado como carregado
    if (isset($carregado[$index])) {
      // Sanitize input to prevent SQL injection
      $observacao = $conexao->real_escape_string($observacao);
      $id = intval($carregado[$index]);

      // Atualiza a coluna 'observacoes' para o produto específico
      $sql = "UPDATE solicitacoes SET observacoes = '$observacao' WHERE id = $id";
      if ($conexao->query($sql) === FALSE) {
        echo "Erro ao atualizar a solicitação: " . $conexao->error;
      }
    }
  }

  // Redireciona para uma página de sucesso ou de volta para a lista
  header("Location: vistoriaConferencia.php");
  exit;
} else {
  // Se o formulário não foi enviado, redireciona para a página anterior
  header("Location: vistoriaConferencia.php");
  exit;
}
?>
