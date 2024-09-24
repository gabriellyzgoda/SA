<?php
if (!empty($_GET['id'])) {
    include_once('config.php');
    $id = $_GET['id'];

    // Deletar alunos com o mesmo id_turma
    $sqlDeleteAlunos = "DELETE FROM cadastro WHERE id_turma=$id";
    $resultDeleteAlunos = $conexao->query($sqlDeleteAlunos);

    // Verifica se a exclusão dos alunos foi bem-sucedida antes de deletar a turma
    if ($resultDeleteAlunos) {
        // Agora deletar a turma
        $sqlDeleteTurma = "DELETE FROM turma WHERE id=$id";
        $resultDeleteTurma = $conexao->query($sqlDeleteTurma);
    }
}

header('Location: criarTurma.php');
?>
