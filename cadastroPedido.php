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
				$pedido = $conexao -> real_escape_string($_POST['pedido']);

				$produto = $conexao -> real_escape_string($_POST['produto']);
				$unidades = $conexao -> real_escape_string($_POST['unidades']);
				$quantidades = $conexao -> real_escape_string($_POST['quantidade1']);
				$valor = $conexao -> real_escape_string($_POST['valor1']);
				$ncm = $conexao -> real_escape_string($_POST['ncm']);
				$cst = $conexao -> real_escape_string($_POST['cst']);
				$cfop = $conexao -> real_escape_string($_POST['cfop']);
				$total = $conexao -> real_escape_string($_POST['total1']);

				$produto2 = $conexao -> real_escape_string($_POST['produto2']);
				$unidades2 = $conexao -> real_escape_string($_POST['unidades2']);
				$quantidades2 = $conexao -> real_escape_string($_POST['quantidade2']);
				$valor2 = $conexao -> real_escape_string($_POST['valor2']);
				$ncm2 = $conexao -> real_escape_string($_POST['ncm2']);
				$cst2 = $conexao -> real_escape_string($_POST['cst2']);
				$cfop2 = $conexao -> real_escape_string($_POST['cfop2']);
				$total2 = $conexao -> real_escape_string($_POST['total2']);
                
                $produto3 = $conexao -> real_escape_string($_POST['produto3']);
				$unidades3 = $conexao -> real_escape_string($_POST['unidades3']);
				$quantidades3 = $conexao -> real_escape_string($_POST['quantidade3']);
				$valor3 = $conexao -> real_escape_string($_POST['valor3']);
				$ncm3 = $conexao -> real_escape_string($_POST['ncm3']);
				$cst3 = $conexao -> real_escape_string($_POST['cst3']);
				$cfop3 = $conexao -> real_escape_string($_POST['cfop3']);
				$total3 = $conexao -> real_escape_string($_POST['total3']);
                
                $produto4 = $conexao -> real_escape_string($_POST['produto4']);
				$unidades4 = $conexao -> real_escape_string($_POST['unidades4']);
				$quantidades4 = $conexao -> real_escape_string($_POST['quantidade4']);
				$valor4 = $conexao -> real_escape_string($_POST['valor4']);
				$ncm4 = $conexao -> real_escape_string($_POST['ncm4']);
				$cst4 = $conexao -> real_escape_string($_POST['cst4']);
				$cfop4 = $conexao -> real_escape_string($_POST['cfop4']);
				$total4 = $conexao -> real_escape_string($_POST['total4']);

                $cnpj = $conexao -> real_escape_string($_POST['cnpj']);
				$totalcompra = $conexao -> real_escape_string($_POST['totalcompra']);
                
                $sql = "INSERT INTO pedidos (`pedido`, `produto`, `unidades`, `quantidades`, `valor`, `total`, `ncm`, `cst`, `cfop`, `cnpj`, `totalcompra`) 
                VALUES ('".$pedido."', '".$produto."', '".$unidades."', '".$quantidades."', '".$valor."', '".$total."', '".$ncm."', '".$cst."', '".$cfop."' , '".$cnpj."','".$totalcompra."');";
echo $sql;
				$resultado = $conexao->query($sql);

				$sql2 = "INSERT INTO pedidos (`pedido`, `produto`, `unidades`, `quantidades`, `valor`, `total`, `ncm`, `cst`, `cfop`, `cnpj`, `totalcompra`) 
                VALUES ('".$pedido."', '".$produto2."', '".$unidades2."', '".$quantidades2."', '".$valor2."', '".$total2."', '".$ncm2."', '".$cst2."', '".$cfop2."', '".$cnpj."','".$totalcompra."');";
echo $sql2;
				$resultado = $conexao->query($sql2);
                
                $sql3 = "INSERT INTO pedidos (`pedido`, `produto`, `unidades`, `quantidades`, `valor`, `total`, `ncm`, `cst`, `cfop`, `cnpj`, `totalcompra`) 
                VALUES ('".$pedido."', '".$produto3."', '".$unidades3."', '".$quantidades3."', '".$valor3."', '".$total3."', '".$ncm3."', '".$cst3."', '".$cfop3."', '".$cnpj."','".$totalcompra."');";
echo $sql3;
				$resultado = $conexao->query($sql3);

                $sql4 = "INSERT INTO pedidos (`pedido`, `produto`, `unidades`, `quantidades`, `valor`, `total`, `ncm`, `cst`, `cfop`, `cnpj`, `totalcompra`) 
                VALUES ('".$pedido."', '".$produto4."', '".$unidades4."', '".$quantidades4."', '".$valor4."', '".$total4."', '".$ncm4."', '".$cst4."', '".$cfop4."', '".$cnpj."','".$totalcompra."');";
echo $sql4;
				$resultado = $conexao->query($sql4);
			
				$nome = $conexao -> real_escape_string($_POST['nome']);
				$endereco = $conexao -> real_escape_string($_POST['endereco']);
				$telefone = $conexao -> real_escape_string($_POST['telefone']);
				$email = $conexao -> real_escape_string($_POST['email']);
				$data = $conexao -> real_escape_string($_POST['data']);

                $sqlClientes = "INSERT INTO dadoscliente (`cnpj`, `nome`, `endereco`, `telefone`, `email`, `data`)
                VALUES ('".$cnpj."', '".$nome."', '".$endereco."', '".$telefone."', '".$email."', '".$data."');";
echo $sqlClientes;
				$resultado = $conexao->query($sqlClientes);

				$conexao -> close();
				header('Location: meuspedidos.php', true, 301);
			}
?>		