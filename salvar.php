<?php

    include_once('config.php');

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
        $cargo = mysqli_real_escape_string($conexao, $_POST['cargo']);

        $sqlUpdate = "UPDATE cadastro SET nome='$nome', senha='$senha', cargo='$cargo'
        WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
       header('Location: alunos.php');
?>