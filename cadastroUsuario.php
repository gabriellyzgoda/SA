<?php
			include_once('config.php');
			
			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres epsciais (SQL Inject)
				$nome = $conexao -> real_escape_string($_POST['nome']);
				$email = $conexao -> real_escape_string($_POST['email']);
				$senha = $conexao -> real_escape_string($_POST['senha']);
				if($_POST['professor'] != ""){
					$professor = 1;
					$cargo = "Professor";
				} else {
					$professor = 0;
					$cargo = "";
				}

				$sql = "INSERT INTO cadastro
							(`nome`, `email`, `senha`, `professor`, `cargo`)
						VALUES
							('".$nome."', '".$email."', '".$senha."', '".$professor."', '".$cargo."');";
echo $sql;
				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: login.php', true, 301);
			}
?>		