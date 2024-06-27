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
				if(isset($_POST['pegar'])){
					$doca = $_POST['doca']; 

				$sql = "UPDATE `pedidos` SET `doca`='$doca' 
						WHERE id";
echo $sql;
				$resultado = $conexao->query($sql);
                }
				$conexao -> close();
				header('Location: operacaoMovimentacao.php', true, 301);
			}
?>		