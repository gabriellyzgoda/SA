<?php
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "sa";
		
			$conexao = new mysqli($hostname,$user,$password,$database);
			$pedido = ($_POST['pedido']);

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

				$pedido = $conexao->real_escape_string($_POST['pedido']);

				if($_POST['entrada'] != ""){
					$operacao = 1;
				} else{
					$operacao = 0;
				}
				$sql = "INSERT INTO `danfe`
                            (`id`,`codbarra`, `n`, `serie`, `operacao`, `data_emissao`, `hora_emissao`) 
                        VALUES 
							('".$chave."','".$cod."', '".$numero."', '".$serie."', '".$operacao."','".$data."', '".$hora."');";
echo $sql;
				$resultado = $conexao->query($sql);

				if ($resultado) {
					$id_danfe = $chave;

        $sqlUpdatePedidos = "UPDATE `pedidos` 
                             SET `id_danfe` = '$id_danfe' 
                             WHERE `pedido` = '".$pedido."';";

echo $sqlUpdatePedidos;

        $resultadoUpdatePedidos = $conexao->query($sqlUpdatePedidos);

        if ($resultadoUpdatePedidos) {
            header('Location: minhadanfe.php');
            exit;
        } else {
            echo "Erro ao atualizar tabela pedidos: " . $conexao->error;
        }
    } else {
        echo "Erro ao inserir na tabela danfe: " . $conexao->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
}
?>