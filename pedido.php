<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if(!isset($_SESSION['email'])) {
    header("Location: login.php?erro=false");
    exit;
}
$sqlPedidos = "SELECT * FROM pedidos
                WHERE 1";

$resultado = $conexao->query($sqlPedidos);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Professor</title>
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="estiloPedido.css" media="screen"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
</head>
<body>
    <header class="header-topo">
        <div class="logo">
          <a href="homeP.php"><img src="imagens/senai-branco.png" alt="Minha Figura" width="250" height="auto"></a>
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
            <i class="fa-solid fa-box"></i>
              <span class="link_name">Pedidos</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
            
            <li><a class="link_name" href="#">Pedidos</a></li>
            <li><a href="meuspedidos.php">Meus pedidos</a></li>
            <li><a href="criarpedido.php">Criar pedido</a></li>
          
          </ul>
          
        </li>
        
        <li>
          
          <div class="iocn-link">
            
            <a href="#">
            <i class="fa-solid fa-receipt"></i>
              <span class="link_name">Nota fiscal</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
          
            <li><a class="link_name" href="#">Nota fiscal</a></li>
            <li><a href="criardanfe.php">Criar Danfe</a></li>
            <li><a href="minhadanfe.php">Minhas Danfe's</a></li>
          
          </ul>

        </li>

        <li>
          
          <a href="controleP.php">
            <i class="fa-solid fa-warehouse"></i>
            <span class="link_name">Controle</span>
          </a>

          <ul class="sub-menu blank">
            <li><a class="link_name" href="controleP.php">Controle</a></li>
          </ul>

        </li>
        
        <li>
          
          <a href="alunos.php">
          <i class="fa-solid fa-users"></i>
            <span class="link_name">Alunos</span>
          </a>

          <ul class="sub-menu blank">
            <li><a class="link_name" href="alunos.php">Alunos</a></li>
          </ul>

        </li>

        <li>
          
          <div class="iocn-link">
          
            <a href="relatoriosP.php">
            <i class="fa-solid fa-file-lines"></i>
              <span class="link_name">Relatórios</span>
            </a>
            
          </div>
          
          <ul class="sub-menu">
            <li><a class="link_name" href="relatoriosP.php">Relatórios</a></li>
          </ul>
        </li>  
        <li>
          
          <div class="iocn-link">
            
            <a href="#">
            <i class="fa-solid fa-receipt"></i>
              <span class="link_name">Solicitações</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
          
            <li><a class="link_name" href="#">Solicitações</a></li>
            <li><a href="criarSolicitacao.php">Criar Solicitação</a></li>
            <li><a href="solicitacoes.php">Minhas Solicitações</a></li>
          
          </ul>

        </li>   
      </ul><!--Fecha ul-->
    </div>   
    <div class="conteudo"> 
        <div class="titulo-conteudo">    
         <h1>Pedido nº 1234567</h1>
        </div>
        <div class="borda-quadro">
          <div class="borda">
            <div class="quadro-pedidos">
              <div class="titulo-quadro-pedidos"><p>Produtos</p></div>
                <div class="produto">
                  <div class="linha1">
                    <div class="quadrado-numero"><p>1</p></div>
                    <input type="text" name="">
                  </div>
                  <div class="linha2">
                    <div class="bloco">
                      <label>UN</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>QTD</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>R$/Un</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>R$ Total</label>
                      <input type="text" name="">
                    </div>
                  </div>
                </div>
                <div class="produto">
                  <div class="linha1">
                    <div class="quadrado-numero"><p>2</p></div>
                    <input type="text" name="">
                  </div>
                  <div class="linha2">
                    <div class="bloco">
                      <label>UN</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>QTD</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>R$/Un</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>R$ Total</label>
                      <input type="text" name="">
                    </div>
                  </div>
                </div>
                <div class="produto">
                  <div class="linha1">
                    <div class="quadrado-numero"><p>3</p></div>
                    <input type="text" name="">
                  </div>
                  <div class="linha2">
                    <div class="bloco">
                      <label>UN</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>QTD</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>R$/Un</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>R$ Total</label>
                      <input type="text" name="">
                    </div>
                  </div>
                </div>
                <div class="produto">
                  <div class="linha1">
                    <div class="quadrado-numero"><p>4</p></div>
                    <input type="text" name="">
                  </div>
                  <div class="linha2">
                    <div class="bloco">
                      <label>UN</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>QTD</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>R$/Un</label>
                      <input type="text" name="">
                    </div>
                    <div class="bloco">
                      <label>R$ Total</label>
                      <input type="text" name="">
                    </div>
                  </div>
                  <center>
                  <a href="meuspedidos.php">Voltar</a>
                </center>
                </div>
            </div>
          </div>
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
      function confirmarExclusao(id) {
            if (confirm("Tem certeza que deseja excluir este pedido?")) {
                window.location.href = "deleteProduto.php?id=" + id;
            }
        }
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