<?php
			
        $hostname = "127.0.0.1";
        $user = "root";
        $password = "";
        $database = "sa";
    
        $conexao = new mysqli($hostname, $user, $password, $database);

        if ($conexao -> connect_errno) {
            echo "Failed to connect to MySQL: " . $conexao -> connect_error;
            exit();
        } else {
            // Evita caracteres epsciais (SQL Inject)
            $placa = $conexao -> real_escape_string($_POST['placa_caminhao']);

            $sql="SELECT *
                    FROM `container`
                    WHERE `placa_caminhao`='".$placa."';";

            $resultado = $conexao->query($sql);
            
            if($resultado->num_rows != 0)
            {
                $row = $resultado -> fetch_array();
                echo $row['nome_motorista'];
                echo '<br>';
                echo $row['container'];
                echo '<br>';
                echo $row['cliente'];
                echo '<br>';
                echo 'Cidade ' . $row['cidade'];
                $conexao -> close();
                echo '<br>';
                echo '<a href="futebol.php">Voltar</a>';
                
                exit();
            } else {
                
                $conexao -> close();
                echo 'Nenhum registro encontrado.';
            }
        }
    ?>