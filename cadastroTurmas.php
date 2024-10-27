<?php
session_start();
include_once('config.php');

if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    $nome = $conexao->real_escape_string($_POST['nome']);
    $id_professor = $_SESSION['id'];

    $sql = "INSERT INTO `turma` (`nome`, `id_professor`) 
            VALUES ('".$nome."', '".$id_professor."');";
    
    if ($conexao->query($sql) === TRUE) {
        $id_turma = $conexao->insert_id;

        for ($i = 1; $i <= 20; $i++) {
            $aluno_nome = "aluno" . $i;
            $aluno_email = "aluno" . $i . "@senai";
            $aluno_senha = rand(1000, 9999);
            $aluno_cargo = "Aluno";

            $aluno_nome_escapado = $conexao->real_escape_string($aluno_nome);
            $aluno_email_escapado = $conexao->real_escape_string($aluno_email);
            $aluno_senha_escapado = $conexao->real_escape_string($aluno_senha);
            $aluno_cargo_escapado = $conexao->real_escape_string($aluno_cargo);

            $sql_aluno = "INSERT INTO `cadastro` (`nome`, `email`, `senha`, `cargo`, `id_turma`) 
                          VALUES ('".$aluno_nome_escapado."', '".$aluno_email_escapado."', '".$aluno_senha_escapado."', '".$aluno_cargo_escapado."','".$id_turma."');";

            $conexao->query($sql_aluno);
        }

        header('Location: criarTurma.php', true, 301);
    } else {
        echo "Error: " . $conexao->error;
    }

    $conexao->close();
}
?>
