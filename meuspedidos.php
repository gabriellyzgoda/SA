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
$sqlPedidos = "SELECT * FROM pedidos";

$resultado = $conexao->query($sqlPedidos);

$sqlClientes = "SELECT * FROM dadoscliente";

$resultado2 = $conexao->query($sqlClientes);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Professor</title>
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
      </ul><!--Fecha ul-->
    </div>   
    <div class="conteudo"> 
        <div class="titulo-conteudo">    
         <h1>Meus pedidos!</h1>
        </div>
    </div>
    <div class="quadro-pedidos">
        <table>
<<<<<<< Updated upstream
          <thead>
            <tr>
                <th>CARIMBO DATA</th>
=======
            <thead> 
              <tr>
                <th>CARIMBO<br>DATA/HORA</th>
>>>>>>> Stashed changes
                <th>Nº DO PEDIDO</th>
                <th>TOTAL</th>
                <th>VISUALIZAR</th>
              </tr>
            </thead>
            <tbody>
<<<<<<< Updated upstream
                <?php
                while($user_data = mysqli_fetch_assoc($resultado2)){
                  echo "<tr>";
                  echo "<td>".$user_data['data']."</td>";
                }
                    ?>
                <?php
                while($user_data = mysqli_fetch_assoc($resultado)){
                  echo "<tr>";
                  echo "<td>".$user_data['pedido']."</td>";
                  echo "<td >".$user_data['total']."</td>";
                }
                ?>         
=======
                  <tr>
                    <td>23/09/2024</td>
                    <td>1234567</td>
                    <td>R$ 200,00</td>
                    <td>
                    <a href="pedido.php"><button type="submit" class="btn" value="abrirPedido">Abrir</button></a>
                      <div class="botaoDeletar" onclick="confirmarExclusao(<?php echo $user_data['id']; ?>)">
                            <i class="fa-solid fa-trash"></i>
                      </div>
                    </td>
                  </tr>
>>>>>>> Stashed changes
            </tbody>
        </table>
    </div>
    <footer>
        <div class="linha-footer"><div>
        <center>
            <p>Gabrielly, Chris, Julia e Amanda</br>
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