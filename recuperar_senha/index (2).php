<?php
session_start();
ob_start();
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
    <title>Celke - Login</title>
</head>

<body>
    <?php
    //Exemplo criptografar a senha
    //echo password_hash(123456, PASSWORD_DEFAULT);
    ?>

    <h1>Login</h1>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendLogin'])) {
        //var_dump($dados);
        $query_usuario = "SELECT id, nome, usuario, senha_usuario 
                        FROM usuarios 
                        WHERE usuario =:usuario  
                        LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
        $result_usuario->execute();

        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            //var_dump($row_usuario);
            if(password_verify($dados['senha_usuario'], $row_usuario['senha_usuario'])){
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];
                header("Location: dashboard.php");
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
            }
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
        }

        
    }

    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <form method="POST" action="">
        <label>Usuário</label>
        <input type="text" name="usuario" placeholder="Digite o usuário" value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>"><br><br>

        <label>Senha</label>
        <input type="password" name="senha_usuario" placeholder="Digite a senha" value="<?php if(isset($dados['senha_usuario'])){ echo $dados['senha_usuario']; } ?>"><br><br>

        <input type="submit" value="Acessar" name="SendLogin">
    </form>

    <br>
    <a href="recuperar_senha.php">Esqueceu a senha?</a>

    <br><br>
    Usuário: cesar@celke.com.br<br>
    Senha: 123456
</body>

</html>