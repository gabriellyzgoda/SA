<!DOCTYPE html>
<html lang="en">
<?php
session_start();

// Verifica se o usuário está logado
if(!isset($_SESSION['email'])) {
    header("Location: login.php?erro=true");
    exit;
}?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Professor</title>
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
            <a href="perfil.php">
                <div class="circulo">
                        <i class="fa-solid fa-user"></i>
                </div>
            </a>
            <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a>      
        </div>
    </header>
    <div class="sidebar close">
      
      <div class="logo-details">
        
        <i class="bx bx-menu"></i>
        <span class="logo_name">Menu</span>
     
      </div>
      
      <ul class="nav-links">
        
        <li>
          
          <div class="iocn-link">
            
            <a href="#">
                <i class="fa-solid  fa-truck-front"></i>
              <span class="link_name">Pedidos</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
            
            <li><a class="link_name" href="#">Pedidos</a></li>
            <li><a href="#">Meus pedidos</a></li>
            <li><a href="#">Criar pedido</a></li>
          
          </ul>
          
        </li>
        
        <li>
          
          <div class="iocn-link">
            
            <a href="#">
            <i class="fa-solid fa-truck-ramp-box"></i>
              <span class="link_name">Nota fiscal</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
          
            <li><a class="link_name" href="#">Nota fiscal</a></li>
            <li><a href="#">Criar Danfe</a></li>
            <li><a href="#">Minhas Danfe's</a></li>
          
          </ul>

        </li>

        <li>
          
          <a href="#">
            <i class="fa-solid fa-warehouse"></i>
            <span class="link_name">Controle</span>
          </a>

          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Controle</a></li>
          </ul>

        </li>
        
        <li>
          
          <a href="#">
          <i class="fa-solid fa-box"></i>
            <span class="link_name">Alunos</span>
          </a>

          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Alunos</a></li>
          </ul>

        </li>

        <li>
          
          <div class="iocn-link">
          
            <a href="#">
            <i class="fa-solid fa-truck-fast"></i>
              <span class="link_name">Relatórios</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
            
          </div>
          
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Relatórios</a></li>
            <li><a href="#">Exemplo</a></li>
            <li><a href="#">Exemplo</a></li>
            <li><a href="#">Exemplo</a></li>
          </ul>

        </li>
        
        <li>
        
          <a href="#">
          <i class="fa-solid fa-server"></i>
            <span class="link_name">Exemplo</span>
          </a>
          
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Exemplo</a></li>
          </ul>
        </li>
        <li>
          <a href="#">
          <i class="fa-regular fa-file"></i>
            <span class="link_name">Exemplo</span>
          </a>
          
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Exemplo</a></li>
          </ul>
        </li>      
      </ul><!--Fecha ul-->
    </div>      
    <div class="conteudo"> 
        <div class="titulo-conteudo">    
         <h1>Bem vindo professor(a)...</h1>
        </div>
    </div>

    <footer>
        <div class="linha-footer"><div>
        <center>
            <p>Gabrielly, Chris, Julia e Amanda</br>
            3º ano da Turma de desenvolvimento de sistemas do Sesi</p>
        </center>
    </footer>

    <script>
  
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e)=>{
     let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
     arrowParent.classList.toggle("showMenu");
      });
    }
    
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("close");
    });

</script>
</body>
</html>