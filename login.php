<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estiloLogin.css" media="screen"/>
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="esquerda">
            <img src="imagens/login.png" alt="Minha Figura" width="800" height="800">
        </div>
        <div class="direita">
            <div class="container-cadastre-se">
                <p>Não tem uma conta?</p>
                <a href="cadastro.php">
                    <button type="button">Cadastre-se</button>
                </a>
            </div>
            <div class="container-login">
                <div class="login">
                    <h1>Login</h1>
                    <form class="form" method="post" action="verificaLogin.php" id="formlogin" name="formlogin">
                        <label><h2>Email: </h2></label>
                        <div class="div-input">
                            <i class="fa-solid fa-envelope"></i>
                            <input class="inputs" type="text" name="email" id="email" size="20" required>
                        </div>
                        <label><h2>Senha: </h2></label>
                        <div class="div-input">
                            <i class="fa-solid fa-lock"></i>
                            <input class="inputs" type="password" name="senha" id="senha" size="20" required>
                        </div>
                        <label><h2>Selecione sua Turma: </h2></label>
                        <div class="div-input">
                            <select class="inputs" name="id_turma">
                                <option value="">Selecione uma turma</option>
                                <?php
                                include_once('config.php'); // Inclui a conexão com o banco de dados

                                // Consulta para buscar as turmas
                                $sqlTurmas = "SELECT id, nome FROM turma";
                                $resultadoTurmas = $conexao->query($sqlTurmas);

                                // Verifica se há turmas e as lista no select
                                if ($resultadoTurmas->num_rows > 0) {
                                    while ($turma = $resultadoTurmas->fetch_assoc()) {
                                        echo "<option value='" . $turma['id'] . "'>" . $turma['nome'] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>Nenhuma turma disponível</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="linhaBotao">
                            <input class="botao-login" id="entrar" type="submit" value="Entrar"/>
                        </div>
                        <?php if (isset($_GET['erro'])) { ?>
                            <div class="linha-erro">
                                <div class="mensagem-erro">
                                    <p>
                                        <?php
                                        // Exibe mensagem de erro com base no parâmetro 'erro'
                                        if ($_GET['erro'] == 1) {
                                            echo "Email ou senha incorretos";
                                        } elseif ($_GET['erro'] == 2) {
                                            echo "Você não tem permissão para acessar";
                                        } elseif ($_GET['erro'] == 3) {
                                        echo "Por favor selecione sua turma";
                                        } else {
                                            echo "Erro desconhecido";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                        <div>
                            <?php echo $erro ?? '' ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>
