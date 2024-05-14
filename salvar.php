<?php
include_once('config.php');
if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
                if (isset($_POST['userId'])){
				// Evita caracteres especiais (SQL Inject)
				$nome = $conexao -> real_escape_string($_POST['novonome']);
				$cargo = $conexao -> real_escape_string($_POST['novocargo']);
				$senha = $conexao -> real_escape_string($_POST['novosenha']);
                $id = $_POST['userId'];

				$sql = "UPDATE cadastro SET nome='$nome', senha='$senha', cargo='$cargo' 
                WHERE id = '$id';";
                
				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: alunos.php', true, 301);
			}
        }
?>		