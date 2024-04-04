<?php
session_start();
ob_start();
include_once 'conexao.php';
?>
    <?php
    $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);


    if (!empty($chave)) {
        //var_dump($chave);

        $query_email = "SELECT id 
                            FROM cadastro 
                            WHERE recuperar_senha =:recuperar_senha  
                            LIMIT 1";
        $result_email = $conn->prepare($query_email);
        $result_email->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
        $result_email->execute();

        if (($result_email) and ($result_email->rowCount() != 0)) {
            $row_email = $result_email->fetch(PDO::FETCH_ASSOC);
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            //var_dump($dados);
            if (!empty($dados['SendNovaSenha'])) {
                $senha_email = password_hash($dados['senha_email'], PASSWORD_DEFAULT);
                $recuperar_senha = 'NULL';

                $query_up_email = "UPDATE emails 
                        SET senha_email =:senha_email,
                        recuperar_senha =:recuperar_senha
                        WHERE id =:id 
                        LIMIT 1";
                $result_up_email = $conn->prepare($query_up_email);
                $result_up_email->bindParam(':senha_email', $senha_email, PDO::PARAM_STR);
                $result_up_email->bindParam(':recuperar_senha', $recuperar_senha);
                $result_up_email->bindParam(':id', $row_email['id'], PDO::PARAM_INT);

                if ($result_up_email->execute()) {
                    $_SESSION['msg'] = "<p style='color: green'>Senha atualizada com sucesso!</p>";
                    header("Location: index.php");
                } else {
                    echo "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
                }
            }
        } else {
            $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
            header("Location: recuperar_senha.php");
        }
    } else {
        $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
        header("Location: recuperar_senha.php");
    }

    ?>

    <form method="POST" action="">
        <?php
        $email = "";
        if (isset($dados['senha_email'])) {
            $email = $dados['senha_email'];
        } ?>
        <label>Senha</label>
        <input type="password" name="senha_email" placeholder="Digite a nova senha" value="<?php echo $email; ?>"><br><br>

        <input type="submit" value="Atualizar" name="SendNovaSenha">
    </form>

    <br>

</body>

</html>