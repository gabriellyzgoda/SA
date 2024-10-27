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

				$solicitacao = $conexao->real_escape_string($_POST['solicitacao']);

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
					$id_danfe = $chave;

        $sqlUpdateSolicitacoes = "UPDATE `solicitacoes` 
                             SET `id_danfe` = '$id_danfe' 
                             WHERE `solicitacao` = '".$solicitacao."';";

echo $sqlUpdateSolicitacoes;

        $resultadoUpdateSolicitacoes = $conexao->query($sqlUpdateSolicitacoes);

        if ($resultadoUpdateSolicitacoes) {
            header('Location: minhanota.php');
            exit;
        } else {
            echo "Erro ao atualizar o banco de dados: " . $conexao->error;
        }
    } else {
        echo "Erro ao inserir no banco de dados: " . $conexao->error;
    }

    $conexao->close();
}
?>