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
$sqlPedidos = "SELECT `pedido`, `totalcompra` FROM pedidos";

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
            <li><a href="criarpedido.php">Criar pedido</a></li>
            <li><a href="meuspedidos.php">Meus pedidos</a></li>
          
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
        <div class="iocn-link">
            
            <a href="#">
            <i class="fa-solid fa-warehouse"></i>
              <span class="link_name">Controle</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>

          <ul class="sub-menu ">
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
            <i class="fa-solid fa-clipboard-list fa-lg"></i>
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
        <li>
          <a href="relatoriosP.php">
          <i class="fa-solid fa-file"></i>
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
                <th>APAGAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL para agrupar os pedidos e exibir apenas um por número de pedido
            $sql = "SELECT p.id, p.pedido, MAX(dc.data) AS data_emissao, MAX(p.totalcompra) AS totalcompra
                    FROM pedidos p
                    INNER JOIN dadoscliente dc ON p.cnpj = dc.cnpj
                    GROUP BY p.pedido";
            
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
              while ($pedido = mysqli_fetch_assoc($resultado)) {
                 // Formata a data no formato day/month/year
                  $dataEmissao = date("d/m/Y", strtotime($pedido['data_emissao']));
                  echo "<tr>";
                  // Exibe a data do pedido (vinda da tabela dadoscliente)
                  echo "<td>" . $dataEmissao . "</td>";
                  // Exibe o número do pedido
                  echo "<td>" . $pedido['pedido'] . "</td>";
                  // Exibe o total da compra
                  echo "<td>R$ " . $pedido['totalcompra'] . "</td>";
                  // Coloque aqui o link para visualizar detalhes do pedido específico
                  echo "<td><a href='pedido.php?pedido=" . $pedido['pedido'] . "'><button type='button' class='btn'>Abrir</button></a></td>";
                  // Botão de exclusão
                  echo "<td><div class='botaoDeletar' onclick='confirmarExclusao(" . $pedido['pedido'] . ")'><i class='fa-solid fa-trash'></i></div></td>";
                  echo "</tr>";
              }
            } else {
                echo "<td colspan='5'>Nenhum pedido encontrado.</td>";
            }
            
        ?>
      </tbody>
  </table>
</div>
</div>
<?php
include_once('footer.php');
?>
<script>
function confirmarExclusao(pedido) {
  if (confirm("Tem certeza que deseja excluir este pedido?")) {
      window.location.href = "deleteProduto.php?pedido=" + pedido;
      
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
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});

</script>
</body>
</html>