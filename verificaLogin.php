<?php
			session_start();
			
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "sa";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				$email = $conexao->real_escape_string($_POST['email']);
				$senha = $conexao->real_escape_string($_POST['senha']);
				$professor = $conexao->real_escape_string($_POST['professor']);

				$sql = "SELECT `id`, `email`, `professor`, `nome`, `cargo` FROM `cadastro`
						WHERE `email` = '$email'
						AND `senha` = '$senha'";

				$resultado = $conexao->query($sql);

				if ($resultado->num_rows != 0) {
					$row = $resultado->fetch_array();
					$_SESSION['id'] = $row[0];
					$_SESSION['email'] = $row[1];
					$_SESSION['professor'] = $row[2];
					$_SESSION['nome'] = $row[3];
					$_SESSION['cargo'] = $row[4];
					$conexao->close();
					
					if ($row[2] == "1") {
						header('Location: homeP.php', true, 301);
						exit();
					} else {
						header('Location: home.php', true, 301);
						exit();
					}
				} else {
					$conexao->close();
					// Redireciona para a página de login com um parâmetro de erro
					header('Location: login.php?erro=1', true, 301);
					exit();
				}
			}
			?>