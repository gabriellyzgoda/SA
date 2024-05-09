<?php
if (isset($_POST['submit'])) {

    include_once('config.php');
    
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $cargo = $_POST['cargo'];
    
        $sqlUpdate = "UPDATE cadastro SET nome='$nome', senha='$senha', cargo='$cargo' WHERE id='$id'";
        $result = $conexao->query($sqlUpdate);
    
        if ($result) {
            echo "<script>alert('Dados atualizados com sucesso!');</script>";
            header("Location: alunos.php");
        } else {
            echo "Erro ao atualizar os dados!";
        }
    }
?>
