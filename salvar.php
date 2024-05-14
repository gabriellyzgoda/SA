<?php
include_once('config.php');

if (isset($_POST['submit'])) {

    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }
    
        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM cadastro WHERE id=$id";
        $result = $conexao->query($sqlSelect);
    
        if ($result->num_rows >0) {
            $sqlUpdate = "UPDATE cadastro SET nome='$nome', senha='$senha', cargo='$cargo' 
            WHERE id='$id'";
            if($result = $conexao->query($sqlUpdate) == true)
            echo "dados atualizados com sucesso!";
        }
        header("Location: alunos.php");
    }
?>