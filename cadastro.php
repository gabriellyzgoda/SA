<html>
    <head>
        <title>Cadastro</title>
    </head>
<style>
body{
    margin: 0;
    padding: 0;
}
container{

}
direita{
    
}
</style>
<body>
<div class="container">
        <div class="direita">
            <img src="imagens/login.png" alt="Minha Figura">
</div>
<div class="esquerda">
    <div class="cadastro">
		<p class="">Login</p>
			<form method="post" action="cadastroUsuario.php" id="formcadastro" name="formcadastro" >
				<label> Nome: </label>
				<input type="text" name="nome" id="nome" size="20"><br />
                <br>				
				<label> Email: </label>
				<input type="text" name="email" id="email" size="20"><br />
                <br>
                <label> Senha: </label>
				<input type="password" name="senha" id="senha" size="20"><br />
                <br>x   
                <center>
                    <input type="submit" value="Entrar"  />
                <center>		
			</form>
	</div>
</div>
</body>
</html>
