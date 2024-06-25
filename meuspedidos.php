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
$sqlPedidos = "SELECT `pedido`, `total` FROM pedidos";

$resultado = $conexao->query($sqlPedidos);

$sqlClientes = "SELECT * FROM dadoscliente";

$resultado2 = $conexao->query($sqlClientes);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus pedidos</title>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="estiloMeusPedidos.css" media="screen"/>
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
         <h1>Meus pedidos!</h1>
        </div>
    </div>
    <div class="quadro-pedidos">
      <table>
            <thead> 
              <tr>
                <th>CARIMBO DATA</th>
                <th>Nº DO PEDIDO</th>
                <th>TOTAL</th>
                <th>VISUALIZAR</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if ($resultado2->num_rows > 0) {
                  // Exibir o pedido
                  $pedido = $resultado2->fetch_assoc();
                  if (isset($pedido['data'])) {
                      echo "<td>" . $pedido['data'] . "</td>";
              }}

                  // Exibir o pedido
                  if ($resultado->num_rows > 0) {
                    // Exibir o pedido
                    $pedido = $resultado->fetch_assoc();
                    if (isset($pedido['pedido'])) {
                        echo "<td>" . $pedido['pedido'] . "</td>";
                }}?>
            <?php
            $sqlClientes = "SELECT * FROM dadoscliente";

            $resultado2 = $conexao->query($sqlClientes);

              // Verificar se o segundo resultado tem linhas
              if ($resultado2->num_rows > 0) {
                  // Exibir o pedido
                  $pedido2 = $resultado2->fetch_assoc();
                  if (isset($pedido2['totalcompra'])) {
                      echo "<td>" . "R$" . "" . $pedido2['totalcompra'] . "</td>";
                  }
              ?>  
                  <td>
                    <a href="pedido.php"><button type="submit" class="btn" value="abrirPedido">Abrir</button></a>
                      <div class="botaoDeletar" onclick="confirmarExclusao(<?php echo $user_data['id']; ?>)">
                            <i class="fa-solid fa-trash"></i>
                      </div>
                    </td>
                <?php
              }
            ?>
            </tbody>
        </table>
    </div>
<?php
include_once('footer.php');
?>
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