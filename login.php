<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css" media="screen"/>
    <title>.: Logística :.</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
</head>
<body>
    <div class="container">
        <div class="esquerda">
            <img src="imagens/login.png" alt="Minha Figura" width="700" height="700">
        </div>
        <div class="direita">
            <div class="login">
                <h1>Login</h1>
                <form class="form" method="post" action="verificaLogin.php" id="formlogin" name="formlogin" >
                    <label><h2>Email: </h2></label>
                    <input  class="inputs" type="text" name="email" id="email" size="20"><br />
                        <br>
                    <label><h2>Senha: </h2></label>
                    <input class="inputs" type="password" name="senha" id="senha" size="20">
                    <br>
                    <center>
                        <input type="submit" value="Entrar"  />
                    </center>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>
