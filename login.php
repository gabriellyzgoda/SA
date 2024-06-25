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
                    <form class="form" method="post" action="verificaLogin.php" id="formlogin" name="formlogin" >
                        <label><h2>Email: </h2></label>
                        <div class="div-input">
                        <i class="fa-solid fa-envelope"></i>
                            <input  class="inputs" type="text" name="email" id="email" size="20" required>
                        </div>
                        <label><h2>Senha: </h2></label>
                        <div class="div-input">
                            <i class="fa-solid fa-lock"></i>
                            <input class="inputs" type="password" name="senha" id="senha" size="20" required>
                        </div>
                        <div class="linhaBotao">
                            <input class="botao-login" id="entrar" type="submit" value="Entrar"/>
                        </div>
                        <?php if (isset($_GET['erro'])){ ?>
                            <div class="linha-erro">
                                <div class="mensagem-erro">
                                <p>
                                    <?php echo "Você não tem permissão para acessar";?>
                                    </p>
                                </div>
                            </div>    
                        <?php } ?>
                        
                        <div>
                            <?php echo $erro ?? ''?>
                        </div>
                    </form>                                   
                </div>
            </div>
        </div>
    </div>  
</body>
</html>


