<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
</head>
<body>
    <header class="header-topo">
        <div class="logo">
                <img src="imagens/senai-branco.png" alt="Minha Figura" width="250" height="auto">
        </div>
        <div class="menu-header">
            <a href="perfil.php">Perfil</a>
            <p>|</p>
            <a href="index.php">Sair <i class="fa-solid fa-right-from-bracket"></i></a>
            
        </div>
    </header>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fa-solid fa-square-xmark" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>Menu</header>
        <a href="#" class="active">
            <i class="fas fa-bars"></i>
            <span>Painel</span>  
        </a>
        <a href="#" class="active">
            <i class="fas fa-bars"></i>
            <span>Painel</span>  
        </a>
        <a href="#" class="active">
            <i class="fas fa-bars"></i>
            <span>Painel</span>  
        </a>
    </div>      
    <div class="conteudo">      
    </div>
    <footer>
        <div class="linha-footer"><div>
        <center>
            <p>Gabrielly, Chris, Julia e Amanda</br>
            3º ano da Turma de desenvolvimento de sistemas do Sesi</p>
        </center>
    </footer>
</body>
</html>