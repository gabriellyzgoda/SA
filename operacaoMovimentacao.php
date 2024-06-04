<!DOCTYPE html>
<html lang="en">
<?php
session_start();

// Verifica se o usuário está logado
if(!isset($_SESSION['email'])) {
    header("Location: login.php?erro=false");
    exit;
}?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Aluno</title>
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="estiloMovimentacao.css" media="screen"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
</head>
<body>
    <header class="header-topo">
        <div class="logo">
          <a href="home.php"><img src="imagens/senai-branco.png" alt="Minha Figura" width="250" height="auto"></a>
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
              <span class="link_name">Recebimento</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
            
            <li><a class="link_name" href="#">Recebimento</a></li>
            <li><a href="container.php">Container</a></li>
            <li><a href="carga.php">Carga</a></li>
          
          </ul>
          
        </li>
        
        <li>
          
          <div class="iocn-link">
            
            <a href="movimentacao.php">
            <i class="fa-solid fa-truck-ramp-box"></i>
              <span class="link_name">Movimentação</span>
            </a>
          
          </div>
          
          <ul class="sub-menu">
          
            <li><a class="link_name" href="movimentacao.php">Movimentação</a></li>
          
          </ul>

        </li>

        <li>
          
          <a href="estoque.php">
            <i class="fa-solid fa-warehouse"></i>
            <span class="link_name">Estoque</span>
          </a>

          <ul class="sub-menu blank">
            <li><a class="link_name" href="estoque.php">Estoque</a></li>
          </ul>

        </li>
        
        <li>
          
          <a href="picking.php">
          <i class="fa-solid fa-box"></i>
            <span class="link_name">Picking</span>
          </a>

          <ul class="sub-menu blank">
            <li><a class="link_name" href="picking.php">Picking</a></li>
          </ul>

        </li>

        <li>
          
          <div class="iocn-link">
          
            <a href="expedicao.php">
            <i class="fa-solid fa-truck-fast"></i>
              <span class="link_name">Expedição</span>
            </a>
            
            
          </div>
          
          <ul class="sub-menu">
            <li><a class="link_name" href="expedicao.php">Expedição</a></li>
          </ul>

        </li>
        
        <li>
          
          <div class="iocn-link">
            
            <a href="#">
                <i class="fa-solid  fa-truck-front"></i>
              <span class="link_name">Controle</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
            
            <li><a class="link_name" href="#">Controle</a></li>
            <li><a href="pedidodoca.php">Doca Recebimento</a></li>
            <li><a href="controleSolicitacoes.php">Solicitações</a></li>
          
          </ul>
          
        </li>
        
        <li>
          <a href="relatorios.php">
          <i class="fa-regular fa-file"></i>
            <span class="link_name">Relatório</span>
          </a>
          
          <ul class="sub-menu blank">
            <li><a class="link_name" href="relatorios.php">Relatório</a></li>
          </ul>
        </li>      
      </ul><!--Fecha ul-->
    </div>       
    <div class="conteudo"> 
        <div class="titulo-conteudo">    
         <h1>Operação de Movimentação</h1>
        </div>
    </div>
    <div class="linha-movimentacao">
      <div class="quadro-movimentacao">
        <table>
          <thead>
            <tr>
                <th>Operações em Aberto</th>
                <th>UN</th>
                <th>QTD</th>
                <th>Posição</th>
                <th></th>
            </tr>
          </thead>

          <tbody>
            <form class="form" method="post" action="" id="" name="" >
              <tr>
                  <td><input type="text" name="operacao" placeholder=""></td>
                  <td><input type="text" name="un" placeholder=""></td>
                  <td><input type="text" name="qtd" placeholder=""></td>
                  <td><input type="text" name="posicao" placeholder=""></td>
                  <td><input class="" id="pegar" type="submit" value="Finalizar"/></td>
              </tr>
              <tr>
                  <td><input type="text" name="operacao" placeholder=""></td>
                  <td><input type="text" name="un" placeholder=""></td>
                  <td><input type="text" name="qtd" placeholder=""></td>
                  <td><input type="text" name="posicao" placeholder=""></td>
                  <td><input class="" id="pegar" type="submit" value="Finalizar"/></td>
              </tr>
              <tr>
                  <td><input type="text" name="operacao" placeholder=""></td>
                  <td><input type="text" name="un" placeholder=""></td>
                  <td><input type="text" name="qtd" placeholder=""></td>
                  <td><input type="text" name="posicao" placeholder=""></td>
                  <td><input class="" id="pegar" type="submit" value="Finalizar"/></td>
              </tr>
              <tr>
                  <td><input type="text" name="operacao" placeholder=""></td>
                  <td><input type="text" name="un" placeholder=""></td>
                  <td><input type="text" name="qtd" placeholder=""></td>
                  <td><input type="text" name="posicao" placeholder=""></td>
                  <td><input class="" id="pegar" type="submit" value="Finalizar"/></td>
              </tr>
        </tbody>
        </table> 
        <div class="linhaBM">
        <input class="" id="pegar" type="submit" value="<<< Retornar"/> 
        </div>
        </form>
      </div>
    </div>
    <footer>
        <div class="linha-footer"><div>
        <center>
            <p>Gabrielly, Letícia, Julia e Amanda</br>
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