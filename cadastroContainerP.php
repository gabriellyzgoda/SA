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
				$id_turma = $_SESSION['id_turma'];
				$placa = $conexao -> real_escape_string($_POST['placa_caminhao']);
				$nome = $conexao -> real_escape_string($_POST['nome_motorista']);
				$container = $conexao -> real_escape_string($_POST['container']);
				$navio = $conexao -> real_escape_string($_POST['navio']);
				$cliente = $conexao -> real_escape_string($_POST['cliente']);
				$tipo = $conexao -> real_escape_string($_POST['tipo']);
				$lacre = $conexao -> real_escape_string($_POST['lacre']);
				$lacre_sif = $conexao -> real_escape_string($_POST['lacre_sif']);
				$temperatura = $conexao -> real_escape_string($_POST['temperatura']);
				$IMO = $conexao -> real_escape_string($_POST['IMO']);
				$n_onu = $conexao -> real_escape_string($_POST['n_onu']);

				$sql = "INSERT INTO `container`
                            (`placa_caminhao`, `nome_motorista`, `container`,`navio`, `cliente`, `tipo`, `lacre`, `lacre_sif`, `temperatura`, `IMO`, `n_onu`,`data`,`id_turma`) 
                        VALUES 
				             ('".$placa."','".$nome."','".$container."', '".$navio."','".$cliente."','".$tipo."','".$lacre."','".$lacre_sif."','".$temperatura."','".$IMO."','".$n_onu."','".date("Y-m-d")."','".$id_turma."');";
echo $sql;
				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: containerP.php', true, 301);
			}
?>		