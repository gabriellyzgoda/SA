<!DOCTYPE html>
<html lang="pt">
<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if(!isset($_SESSION['email'])) {
    header("Location: login.php?erro=false");
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Professor</title>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="estiloContainerP.css" media="screen"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
</head>
<body>
    <header class="header-topo">
        <div class="logSenai">
          <a href="homeP.php"><img src="imagens/logo-logsenai.png" alt="Minha Figura" width="75" height="auto"></a>
        </div>
        <div class="logo">
          <a href="homeP.php"><img src="imagens/senai-branco.png" alt="Minha Figura" width="250" height="auto"></a>
        </div>
        <div class="menu-header">
          <div class="dropdown-perfil">
            <a href="#" >
                <div class="circulo">
                        <i class="fa-solid fa-user"></i>
                </div>
            </a>
            <div class="dropdown-content">
              <div class="dropdown-section">
                <h4>Nome:</h4>
                <p><?php echo $_SESSION['nome'];?></p>
              </div>
              <div class="dropdown-section">
                <h4>Email:</h4>
                <p><?php echo $_SESSION['email'];?></p>
              </div>
              <div class="dropdown-section">
                <h4>Cargo:</h4>
                <p><?php echo $_SESSION['cargo'];?></p>
              </div>
            </div>
          </div>
          <a href="sair.php"><i class="fa-solid fa-right-from-bracket"></i></a>      
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
            <i class="fa-solid fa-warehouse"></i>
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
        <div class="iocn-link">
            
            <a href="#">
            <i class="fa-solid fa-receipt"></i>
              <span class="link_name">Controle</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>

          <ul class="sub-menu ">
            <li><a class="link_name" href="controleP.php">Controle</a></li>
            <li><a href="controleP.php">Controle</a></li>
            <li><a href="containerP.php">Container</a></li>

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
         <h1>Vistoria e Conferência  - Container</h1>
        </div>
        <div class="linhaContainer">
          <div class="quadroContainer">
            <form class="form" method="post" action="cadastroContainerP.php" id="cadastroPedidio" name="cadastroPedidio" >
              <div class="quadroForm">
                  <div class="bloco01">
                    <div class="linhasBloco01">
                      <label>Placa do caminhão:</label>
                      <input type="text" name="placa_caminhao" placeholder="" required>
                    </div>
                    <div class="linhasBloco01">
                      <label>Nome do motorista:</label>
                      <input type="text" name="nome_motorista" placeholder="" required>
                    </div>
                    <div class="linhasBloco01">
                      <label>Container:</label>
                      <input type="text" name="container" placeholder="" required>
                    </div>
                    <div class="linhasBloco01">
                      <label>Cliente:</label>
                      <input type="text" name="cliente" placeholder="" required>
                    </div>
                    <div class="linhasBloco01">
                      <label>Tipo:</label>
                      <input type="text" name="tipo" placeholder="" required>
                    </div>
                    <div class="linhasBloco01">
                      <label>Lacre:</label>
                      <input type="text" name="lacre" placeholder="" required>
                    </div>
                    <div class="linhasBloco01">
                      <label>Lacre SIF:</label>
                      <input type="number" name="lacre_sif" placeholder="">
                    </div>
                    <div class="linhasBloco01">
                      <label>Temperatura:</label>
                      <input type="text" name="temperatura" placeholder="">
                    </div>
                    <div class="linhasBloco01">
                      <label>IMO:</label>
                      <input type="text" name="IMO" placeholder="">
                    </div>
                    <div class="linhasBloco01">
                      <label>Nº ONU:</label>
                      <input type="text" name="n_onu" placeholder="">
                    </div>
                  </div>
                  <div class="quadroBotao">
                    <input class="" id="pegar" type="submit" value="Enviar"/>
            </form>
                  </div>
              </div>
          </div>
        </div>
    </div>

<?php
include_once('footer.php');
?>
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