<?php

    include_once('config.php');

    if(isset($_POST['update'])){
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $cargo = $_POST['cargo'];

        $sqlUpdate = "UPDATE cadastro SET nome='$nome', senha='$senha', cargo='$cargo'
        WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
       header('Location: alunos.php');
?>