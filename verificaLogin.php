<html>
    <body>
		
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
				$email = $conexao -> real_escape_string($_POST['email']);
				$senha = $conexao -> real_escape_string($_POST['senha']);

				$sql="SELECT `id`, `email` FROM `cadastro`
					WHERE `email` = '".$email."'
					AND `senha` = '".$senha."';";

				$resultado = $conexao->query($sql);
				
				if($resultado->num_rows != 0)
				{
					$row = $resultado -> fetch_array();
					$_SESSION['id'] = $row[0];
					$_SESSION['email'] = $row[1];
					$conexao -> close();
					
					header('Location: home.php', true, 301);
					exit();
				} else {
					
					$conexao -> close();
					header('Location: login.php', true, 301);
				}
    

			}
		?>
	</body>
</html>