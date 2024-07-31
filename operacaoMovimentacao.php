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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $idsSelecionados = [];
  foreach ($_POST as $key => $value) {
      if (strpos($key, 'select_') === 0 && !empty($value)) {
          $index = str_replace('select_', '', $key);
          $posicao = isset($_POST['posicao_' . $index]) ? $_POST['posicao_' . $index] : '';

          // Verifica se a posição não está vazia
          if (!empty($posicao)) {
              $idsSelecionados[] = [
                  'id' => intval($value),
                  'posicao' => $posicao
              ];
          }
      }
  }

  if (!empty($idsSelecionados)) {
      foreach ($idsSelecionados as $info) {
          $id = $info['id'];
          $posicao = $info['posicao'];
          // Atualiza o banco de dados com a nova posição
          $sql = "UPDATE pedidos SET posicao = '$posicao' WHERE id = '$id';";
          $conexao->query($sql);
      }
  }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Aluno</title>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
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
        <div class="logSenai">
      <a href="home.php"><img src="imagens/logo-logsenai.png" alt="Minha Figura" width="75" height="auto"></a>
    </div>
    <div class="logo">
      <a href="home.php"><img src="imagens/senai-branco.png" alt="Minha Figura" width="250" height="auto"></a>
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
                <i class="fa-solid  fa-truck-front"></i>
              <span class="link_name">Recebimento</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
            
            <li><a class="link_name" href="#">Recebimento</a></li>
            <li><a href="container.php">Container</a></li>
            <li><a href="carga.php">Carga</a></li>
          <li><a href="pedidodoca.php">Docas</a></li>
          
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
                <i class="fa-solid fa-pen-to-square"></i>
              <span class="link_name">Controle</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
            
            <li><a class="link_name" href="#">Controle</a></li>
            
            <li><a href="controleSolicitacoes.php">Solicitações</a></li>
          <li><a href="designarprodutos.php">Designar Produtos</a></li>
          
          </ul>
          
        </li>
        
              
      </ul><!--Fecha ul-->
    </div> 
    <?php   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idsSelecionados = [];

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'select_') === 0 && !empty($value)) {
            $idsSelecionados[] = $value;
        }
    }

    if (!empty($idsSelecionados)) {
        // Transformar IDs em string separada por vírgulas para usar na consulta
        $ids = implode(',', array_map('intval', $idsSelecionados));

        // Consulta para buscar os dados dos IDs selecionados
        $sql = "SELECT * FROM pedidos WHERE id IN ($ids)";
        $resultado = $conexao->query($sql);   
        echo '
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

          <tbody>';       
            while ($row = mysqli_fetch_assoc($resultado)) {
                        echo '<tr>
                                <td> <input type="text" name="operacao" value="'.$row['produto'].'" readonly></td>
                                <td> <input type="text" name="un" value="'.$row['unidades'].'" readonly></td>
                                <td> <input type="text" name="qtd" value="'.$row['quantidades'].'" readonly></td>
                                <td> <input type="text" name="posicao" value="'.$row['posicao'].'" readonly></td>
                                <td><input class="" id="pegar" type="submit" value="Finalizar"/></td>
                              </tr>'; }
       echo '</tbody>
        </table> 
        <div class="linhaBM">
        <a href="movimentacao.php"><input class="" id="pegar" type="submit" value="<<< Retornar"/> </a>
        </div>
      </div>
    </div>';
            }}else{
              echo 'Nenhum item selecionado
                      <a href="movimentacao.php"><input class="" id="pegar" type="submit" value="<<< Retornar"/> </a>';
            }
            ?>
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