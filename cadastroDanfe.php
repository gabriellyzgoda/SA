<?php
include_once('config.php');

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
				$id_turma = $_SESSION['id_turma'];

				if($_POST['entrada'] != ""){
					$operacao = 1;
				} else{
					$operacao = 0;
				}
				$sql = "INSERT INTO `danfe`
                            (`id`,`codbarra`, `n`, `serie`, `operacao`, `data_emissao`, `hora_emissao`, `id_turma`) 
                        VALUES 
							('".$chave."','".$cod."', '".$numero."', '".$serie."', '".$operacao."','".$data."', '".$hora."', '".$id_turma."');";
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