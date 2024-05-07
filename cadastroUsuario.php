<?php
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "usbw";
			$database = "sa";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

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
				} else {
					$professor = 0;
				}

				$sql = "INSERT INTO cadastro
							(`nome`, `email`, `senha`, `professor`)
						VALUES
							('".$nome."', '".$email."', '".$senha."', '".$professor."');";
echo $sql;
				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: login.php', true, 301);
			}
?>		