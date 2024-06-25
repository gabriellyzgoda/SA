<?php
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "sa";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres epsciais (SQL Inject)
				if($_POST['pegar'] != ""){

				$sql = "SELECT cadastro
							(`nome`, `email`, `senha`, `professor`)
						VALUES
							('".$nome."', '".$email."', '".$senha."', '".$professor."');";
echo $sql;
				$resultado = $conexao->query($sql);
                }
				$conexao -> close();
				header('Location: operacaoMovimentacao.php', true, 301);
			}
?>		