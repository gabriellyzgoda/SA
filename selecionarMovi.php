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
				if($_POST['pegar']){

				$sql = "UPDATE `pedidos` SET 
				`doca`='[value-11]' 
						WHERE 1";
echo $sql;
				$resultado = $conexao->query($sql);
                }
				$conexao -> close();
				header('Location: operacaoMovimentacao.php', true, 301);
			}
?>		