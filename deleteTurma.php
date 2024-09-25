<?php
if (!empty($_GET['id'])) {
    include_once('config.php');
    $id = $_GET['id'];

    $sqlDeleteAlunos = "DELETE FROM cadastro WHERE id_turma=$id";
    $resultDeleteAlunos = $conexao->query($sqlDeleteAlunos);

    if ($resultDeleteAlunos) {
        $sqlDeleteTurma = "DELETE FROM turma WHERE id=$id";
        $resultDeleteTurma = $conexao->query($sqlDeleteTurma);
    }
}

header('Location: criarTurma.php');
?>
