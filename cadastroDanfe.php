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
				if($_POST['saida'] != ""){
					$operacao = 0;
				} else{
					$operacao = 1;
				}
				$sql = "INSERT INTO `danfe`
                            (`id`,`codbarra`, `n`, `serie`, `operacao`, `data_emissao`, `hora_emissao`) 
                        VALUES 
							('".$chave."','".$cod."', '".$numero."', '".$serie."', '".$operacao."','".$data."', '".$hora."');";
echo $sql;
				$resultado = $conexao->query($sql);

				if ($resultado) {
					// Obtém o ID inserido na tabela danfe
					$id_danfe = $conexao->insert_id;
			
					// Atualiza a tabela pedidos com o id_danfe
					$id_pedido = $conexao->real_escape_string($_POST['pedido']);

					$sql2 = "UPDATE `pedidos` SET `id_danfe` = '$id_danfe' 
					WHERE id = '$id_pedido'";
					$resultado2 = $conexao->query($sql2);
echo $sql2;
				$resultado2 = $conexao->query($sql2);
				}
				$conexao -> close();
				header('Location: minhadanfe.php', true, 301);				}
?>		