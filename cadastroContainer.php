<?php
session_start();
include_once('config.php');

if ($conexao->connect_errno) {
	echo "Failed to connect to MySQL: " . $conexao->connect_error;
	exit();
} else {
	$placa = ($_POST['placa_caminhao']);
	$id_turma = $_SESSION['id_turma'];

	if ($_POST['desgastado'] != "") {
		$desgastado = 1;
	  } else {
		$desgastado = 0;
	  }
	  if (isset($_POST['avaria_esquerda']) && $_POST['avaria_esquerda'] != "") {
		$avaria_esq = 1;
	  } else {
		$avaria_esq = 0;
	  }
	  if (isset($_POST['avaria_direita']) && $_POST['avaria_direita'] != "") {
		$avaria_dir = 1;
	  } else {
		$avaria_dir = 0;
	  }
	  if (isset($_POST['avaria_teto']) && $_POST['avaria_teto'] != "") {
		$avaria_teto = 1;
	  } else {
		$avaria_teto = 0;
	  }
	  if (isset($_POST['avaria_frente']) && $_POST['avaria_frente'] != "") {
		$avaria_fre = 1;
	  } else {
		$avaria_fre = 0;
	  }
	  if (isset($_POST['sem_lacre']) && $_POST['sem_lacre'] != "") {
		$sem_lacre = 1;
	  } else {
		$sem_lacre = 0;
	  }
	  if (isset($_POST['adesivo_avaria']) && $_POST['adesivo_avaria'] != "") {
		$adesivo_ava = 1;
	  } else {
		$adesivo_ava = 0;
	  }
	  if (isset($_POST['execesso_altura']) && $_POST['execesso_altura'] != "") {
		$execesso_alt = 1;
	  } else {
		$execesso_alt = 0;
	  }
	  if (isset($_POST['execesso_direita']) && $_POST['execesso_direita'] != "") {
		$execesso_dir = 1;
	  } else {
		$execesso_dir = 0;
	  }
	  if (isset($_POST['execesso_esquerda']) && $_POST['execesso_esquerda'] != "") {
		$execesso_esq = 1;
	  } else {
		$execesso_esq = 0;
	  }
	  if (isset($_POST['execesso_frontal']) && $_POST['execesso_frontal'] != "") {
		$execesso_fro = 1;
	  } else {
		$execesso_fro = 0;
	  }
	  if (isset($_POST['painel_avaria']) && $_POST['painel_avaria'] != "") {
		$painel_ava = 1;
	  } else {
		$painel_ava = 0;
	  }
	  if (isset($_POST['sem_caboenergia']) && $_POST['sem_caboenergia'] != "") {
		$sem_cabo = 1;
	  } else {
		$sem_cabo = 0;
	  }
	  if (isset($_POST['sem_lona']) && $_POST['sem_lona'] != "") {
		$sem_lona = 1;
	  } else {
		$sem_lona = 0;
	  }	  
	
	$sql = "UPDATE `container` SET `desgastado` = '$desgastado', `avaria_esquerda`= '$avaria_esq', `avaria_direita` = '$avaria_dir', `avaria_teto` ='$avaria_teto', `avaria_frente` = '$avaria_fre', `sem_lacre` = '$sem_lacre', `adesivo_avaria` = '$avaria_fre', `execesso_altura` = '$execesso_alt', `execesso_direita` = '$execesso_dir', `execesso_esquerda` = '$execesso_esq', `execesso_frontal` = '$execesso_fro', `painel_avaria` = '$painel_ava', `sem_caboenergia` = '$sem_cabo', `sem_lona` = '$sem_lona'
			WHERE id = '$id' AND id_turma = '$id_turma';";

		$resultado = $conexao->query($sql);

	if (!$resultado) {
		echo "Erro: " . $conexao->error;
	} else {
		header('Location: container.php?sucesso=1');
	}
}
