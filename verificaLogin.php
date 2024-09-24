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
	$id_turma = $conexao->real_escape_string($_POST['id_turma']); // Captura a turma selecionada

    // Verifica o usuário no banco de dados
    $sql = "SELECT `id`, `email`, `professor`, `nome`, `cargo`, `id_turma` FROM `cadastro`
            WHERE `email` = '$email' AND `senha` = '$senha'";

    $resultado = $conexao->query($sql);

    if ($resultado->num_rows != 0) {
        $row = $resultado->fetch_array();
        $_SESSION['id'] = $row[0];
        $_SESSION['email'] = $row[1];
        $_SESSION['professor'] = $row[2];
        $_SESSION['nome'] = $row[3];
        $_SESSION['cargo'] = $row[4];
        $_SESSION['id_turma'] = $row[5]; // Armazena o id_turma do aluno

        // Debug: Verifique se o id_turma está correto
        // var_dump($row[5]); // Descomente para ver o valor

        $conexao->close();

        // Verifica se o usuário é professor ou aluno
        if ($row[2] == "1") { // Professor
            header('Location: homeP.php', true, 301);
            exit();
        } else {
            // Verifica se o aluno selecionou uma turma
            if (empty($id_turma)) {
                // Redireciona para a página de login com uma mensagem de erro
                header('Location: login.php?erro=3', true, 301);
                exit();
            } else {
                $_SESSION['id_turma'] = $id_turma; // Armazena a turma selecionada
                header('Location: home.php', true, 301);
                exit();
            }
        }
    } else {
        $conexao->close();
        // Redireciona para a página de login com um parâmetro de erro
        header('Location: login.php?erro=1', true, 301);
        exit();
    }
}
?>
