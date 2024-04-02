<html>	
    <body>
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
				$nomeUsuario = $conexao -> real_escape_string($_POST['nome']);
				$email = $conexao -> real_escape_string($_POST['email']);
				$senha = $conexao -> real_escape_string($_POST['senha']);

				$sql = "INSERT INTO `sa`.`cadastro`
							(`nome`, `email`, `senha``)
						VALUES
							('".$nomeUsuario."', '".$email."', '".$senha."');";
echo $sql;
				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: index.php', true, 301);
			}
		?>
	</body>
</html>