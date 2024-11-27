<?php 
session_start();
include_once('config.php');

if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    $senha = $conexao->real_escape_string($_POST['senha']);

    $sql = "SELECT *
    FROM `admin` 
    WHERE `senha` = '".$senha."';";

    $resultado = $conexao->query($sql);

    if ($resultado->num_rows == 0) {
        $conexao->close();
        header('Location: index.php?erro=1', true, 301);
        exit();
    } else{
        $conexao->close();
        header('Location: login.php', true, 301);
        exit();
    }
    }
    ?>