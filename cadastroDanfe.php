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
				$chave = $conexao -> real_escape_string($_POST['id']);
				$cod = $conexao -> real_escape_string($_POST['codbarra']);
				$numero = $conexao -> real_escape_string($_POST['n']);
				$serie = $conexao -> real_escape_string($_POST['serie']);
				$data = $conexao -> real_escape_string($_POST['data_emissao']);
				$hora = $conexao -> real_escape_string($_POST['hora_emissao']);
				$total = $conexao -> real_escape_string($_POST['total']);
				if($_POST['saida'] != ""){
					$operacao = 0;
				} else{
					$operacao = 1;
				}
				$sql = "INSERT INTO `danfe`
                            (`id`,`codbarra`, `n`, `serie`, `operacao`, `data_emissao`, `hora_emissao`, `total`) 
                        VALUES 
							('".$chave."','".$cod."', '".$numero."', '".$serie."', '".$operacao."','".$data."', '".$hora."', '".$total."');";
echo $sql;
				$resultado = $conexao->query($sql);

				$nome = $conexao -> real_escape_string($_POST['razao_nome']);
				$cnpj = $conexao -> real_escape_string($_POST['cnpjd']);
				$ie = $conexao -> real_escape_string($_POST['ie']);
				
				$sql2 = "INSERT INTO `destinatario`
					(`cnpjd`, `razao_nome`, `ie`) 
				VALUES 
				('".$cnpj."','".$nome."', '".$ie."');";
echo $sql2;
				$resultado = $conexao->query($sql2);
				
				$conexao -> close();
				header('Location: minhadanfe.php', true, 301);
			}
?>		