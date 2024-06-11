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
				$placa = $conexao -> real_escape_string($_POST['placa_caminhao']);
				$nome = $conexao -> real_escape_string($_POST['nome_motorista']);
				$container = $conexao -> real_escape_string($_POST['container']);
				$cliente = $conexao -> real_escape_string($_POST['cliente']);
				$tipo = $conexao -> real_escape_string($_POST['tipo']);
				$lacre = $conexao -> real_escape_string($_POST['lacre']);
				$lacre_sif = $conexao -> real_escape_string($_POST['lacre_sif']);
				$temperatura = $conexao -> real_escape_string($_POST['temperatura']);
				$IMO = $conexao -> real_escape_string($_POST['IMO']);
				$n_onu = $conexao -> real_escape_string($_POST['n_onu']);
				if($_POST['desgastado'] != ""){
					$desgastado = 1;
				} else{
					$desgastado = 0;
				}
                if($_POST['avaria_esquerda'] != ""){
					$avaria_esq = 1;
				} else{
					$avaria_esq = 0;
				}
                if($_POST['avaria_direita'] != ""){
					$avaria_dir = 1;
				} else{
					$avaria_dir = 0;
				}
                if($_POST['avaria_teto'] != ""){
					$avaria_teto = 1;
				} else{
					$avaria_teto = 0;
				}
                if($_POST['avaria_frente'] != ""){
					$avaria_fre = 1;
				} else{
					$avaria_fre = 0;
				}
                if($_POST['sem_lacre'] != ""){
					$sem_lacre = 1;
				} else{
					$sem_lacre = 0;
				}
                if($_POST['adesivo_avaria'] != ""){
					$adesivo_ava = 1;
				} else{
					$adesivo_ava = 0;
				}
                if($_POST['execesso_altura'] != ""){
					$execesso_alt = 1;
				} else{
					$execesso_alt = 0;
				}
                if($_POST['execesso_direita'] != ""){
					$execesso_dir = 1;
				} else{
					$execesso_dir = 0;
				}
                if($_POST['execesso_esquerda'] != ""){
					$execesso_esq = 1;
				} else{
					$execesso_esq = 0;
				}
                if($_POST['execesso_frontal'] != ""){
					$execesso_fro = 1;
				} else{
					$execesso_fro = 0;
				}
                if($_POST['painel_avaria'] != ""){
					$painel_ava = 1;
				} else{
					$painel_ava = 0;
				}
                if($_POST['sem_caboenergia'] != ""){
					$sem_cabo = 1;
				} else{
					$sem_cabo = 0;
				}
                if($_POST['sem_lona'] != ""){
					$sem_lona = 1;
				} else{
					$sem_lona = 0;
				}
				$sql = "INSERT INTO `container`
                            (`placa_caminhao`, `nome_motorista`, `container`, `cliente`, `tipo`, `lacre`, `lacre_sif`, `temperatura`, `IMO`, `n_onu`, `desgastado`, `avaria_esquerda`, `avaria_direita`, `avaria_teto`, `avaria_frente`, `sem_lacre`, `adesivo_avaria`, `execesso_altura`, `execesso_direita`, `execesso_esquerda`, `execesso_frontal`, `painel_avaria`, `sem_caboenergia`, `sem_lona`) 
                        VALUES 
				             ('".$placa."','".$nome."','".$container."','".$cliente."','".$tipo."','".$lacre."','".$lacre_sif."','".$temperatura."','".$IMO."','".$n_onu."','".$desgastado."','".$avaria_esq."', '".$avaria_dir."', '".$avaria_teto."', '".$avaria_fre."', '".$sem_lacre."', '".$adesivo_ava."', '".$execesso_alt."', '".$execesso_dir."', '".$execesso_esq."', '".$execesso_fro."', '".$painel_ava."','".$sem_cabo."','".$sem_lona."');";
echo $sql;
				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: container.php', true, 301);
			}
?>		