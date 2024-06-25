<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="estiloCadastro.css" media="screen"/>
    <title>Cadastro</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="esquerda">
            <div class="container-login">
                <p>Já possui uma conta?</p>
                <a href="login.php">
                    <button type="button">Login</button>
                </a>
            </div>
            <div class="container-cadastrar">
                <div class="cadastrar">
                    <h1>Cadastro</h1>
                    <form class="form" method="POST" action="cadastroUsuario.php" id="formcadastro" name="formcadastro" >
                        <label><h2>Nome: </h2></label>
                            <div class="div-input">
                            <i class="fa-solid fa-user"></i>
                            <input  class="inputs" type="text" name="nome" id="nome" size="20" required>
                        </div>
                        <label><h2>Email: </h2></label>
                            <div class="div-input">
                            <i class="fa-solid fa-envelope"></i>
                            <input  class="inputs" type="email" name="email" id="email" size="20" required>
                        </div>  
                        
                        <label><h2>Senha: </h2></label>
                        <div class="div-input">
                            <i class="fa-solid fa-lock"></i>
                            <input class="inputs" type="password" name="senha" id="senha" size="20" required>
                        </div>
                        <div class="ehProfessor">
                                <label for="professor">É professor? </label>
                                <input type="checkbox" id="professor" name="professor" />
                        </div>

                        <center>
                            <input class="botao-cadastro" type="submit" value="Cadastrar" />
                        </center>
                        
                    </form>

               
                </div>
            </div>
            
        </div>
        <div class="direita">
            <img src="imagens/login.png" alt="Minha Figura" width="800" height="800">
        </div>
        
    </div>  
</body>
</html>


