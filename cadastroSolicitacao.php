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
				$solicitacao = $conexao -> real_escape_string($_POST['solicitacao']);

				$produto = $conexao -> real_escape_string($_POST['produto']);
				$unidades = $conexao -> real_escape_string($_POST['unidades']);
				$quantidades = $conexao -> real_escape_string($_POST['quantidades']);
				$valor = $conexao -> real_escape_string($_POST['valor']);
				$total1= $valor*$quantidades;

                $produto2 = $conexao -> real_escape_string($_POST['produto2']);
				$unidades2 = $conexao -> real_escape_string($_POST['unidades2']);
				$quantidades2 = $conexao -> real_escape_string($_POST['quantidades2']);
				$valor2 = $conexao -> real_escape_string($_POST['valor2']);
				$total2= $valor2*$quantidades2;

                $produto3 = $conexao -> real_escape_string($_POST['produto3']);
				$unidades3 = $conexao -> real_escape_string($_POST['unidades3']);
				$quantidades3 = $conexao -> real_escape_string($_POST['quantidades3']);
				$valor3 = $conexao -> real_escape_string($_POST['valor3']);
				$total3= $valor3*$quantidades3;

                $produto4 = $conexao -> real_escape_string($_POST['produto4']);
				$unidades4 = $conexao -> real_escape_string($_POST['unidades4']);
				$quantidades4 = $conexao -> real_escape_string($_POST['quantidades4']);
				$valor4 = $conexao -> real_escape_string($_POST['valor4']);
				$total4= $valor4*$quantidades4;

				$totalcompra= $total1+$total2+$total3+$total4;
				
				$observacoes = $conexao -> real_escape_string($_POST['observacoes']);


                $sql = "INSERT INTO `solicitacoes`(`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`) 
                        VALUES ('".$solicitacao."', '".$produto."', '".$unidades."', '".$quantidades."', '".$valor."', '".$totalcompra."', '".$observacoes."');";

                echo $sql;
                                $resultado = $conexao->query($sql);

                $sql = "INSERT INTO `solicitacoes`(`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`) 
                        VALUES ('".$solicitacao."', '".$produto2."', '".$unidades2."', '".$quantidades2."', '".$valor2."', '".$totalcompra."', '".$observacoes."');";

                echo $sql;
                                $resultado = $conexao->query($sql);

                $sql = "INSERT INTO `solicitacoes`(`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`) 
                        VALUES ('".$solicitacao."', '".$produto3."', '".$unidades3."', '".$quantidades3."', '".$valor3."', '".$totalcompra."', '".$observacoes."');";

                echo $sql;
                                $resultado = $conexao->query($sql);

                $sql = "INSERT INTO `solicitacoes`(`solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`) 
                        VALUES ('".$solicitacao."', '".$produto4."', '".$unidades4."', '".$quantidades4."', '".$valor4."', '".$totalcompra."', '".$observacoes."');";

                echo $sql;
                                $resultado = $conexao->query($sql);
                                
                                $conexao -> close();
                                header('Location: solicitacoes.php', true, 301);
                            }
                ?>		