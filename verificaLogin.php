<?php 
session_start();

$hostname = "127.0.0.1";
$user = "root";
$password = "";
$database = "sa";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    $email = $conexao->real_escape_string($_POST['email']);
    $senha = $conexao->real_escape_string($_POST['senha']);
    $id_turma = $conexao->real_escape_string($_POST['id_turma']); 

    $sql = "SELECT c.`id`, c.`email`, c.`professor`, c.`nome`, c.`cargo`, t.`id` AS turma_id
    FROM `cadastro` c
    LEFT JOIN `turma` t ON t.`id_professor` = c.`id`
    WHERE c.`email` = '$email' AND c.`senha` = '$senha'";

    $resultado = $conexao->query($sql);

    if ($resultado->num_rows == 0) {
        $conexao->close();
        header('Location: login.php?erro=1', true, 301);
        exit();
    }
        $row = $resultado->fetch_array();
        $_SESSION['id'] = $row[0];
        $_SESSION['email'] = $row[1];
        $_SESSION['professor'] = $row[2];
        $_SESSION['nome'] = $row[3];
        $_SESSION['cargo'] = $row[4];
        $_SESSION['id_turma'] = $row[5]; 

        if ($row[2] == "1") { 
            if (empty($id_turma)) {
                header('Location: login.php?erro=3', true, 301);
                exit();
            } else {
                // Verificação da turma para o professor
                $sql_turma = "SELECT `id` FROM `turma` WHERE `id` = '$id_turma' AND `id_professor` = '{$row[0]}'";
                $resultado_turma = $conexao->query($sql_turma);
                
                if ($resultado_turma->num_rows == 0) { 
                    header('Location: login.php?erro=4', true, 301);
                    exit();
                }
                
                $_SESSION['id_turma'] = $id_turma; 
                header('Location: homeP.php', true, 301);
                exit();
            }
        } 
        // Verificação para o aluno
        elseif ($row[2] == "0") {
            if (empty($id_turma)) {
                header('Location: login.php?erro=3', true, 301);
                exit();
            } 
            $sql = "SELECT id_turma FROM cadastro WHERE id = 'id' AND professor = 0";
            $resultado = $conexao->query($sql);
            
            if ($resultado->num_rows == 0) {
                    // Se as turmas não batem, retorna ao login com erro=4
                    header('Location: login.php?erro=4', true, 301);
                    exit();
                }
            
                // Se as turmas forem iguais, redireciona para home.php
                $_SESSION['id_turma'] = $id_turma;
                header('Location: home.php', true, 301);
                exit();
            }  else {
            $conexao->close();
            header('Location: login.php?erro=1', true, 301);
            exit();
        }
    }
    ?>