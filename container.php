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
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Container</title>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="estiloContainer.css" media="screen"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
</head>
<body>
<?php
      
  ?>
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
            <li><a class="link_name" href="vistoriaConferencia.php">Vistoria e Conferência</a></li>
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
          
          </ul>
          
        </li>
        <li>
          <a href="relatorios.php">
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
         <h1>Vistoria e Conferência - Container</h1>
        </div>
    </div>
    <div class="linha-vistoria">
      <div class="quadro-vistoria">
        <div class="quadroForm">
            <div class="bloco01">
            <form id="formPlaca" class="form" method="POST" action="container.php">
            <div id="linhaPlaca" class="linhasBloco01">
                <label>Placa do caminhão:</label>
                <input type="text" name="placa_caminhao" placeholder="">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
              </form>
              <?php
              if(isset($_POST['placa_caminhao'])) {
              if ($conexao -> connect_errno) {
                echo "Failed to connect to MySQL: " . $conexao -> connect_error;
                exit();
              } else {
                // Evita caracteres epsciais (SQL Inject)
                $placa = $conexao -> real_escape_string($_POST['placa_caminhao']);

                $sql="SELECT *
                        FROM `container`
                        WHERE `placa_caminhao`='".$placa."';";

                $resultado = $conexao->query($sql);
                
                if($resultado->num_rows != 0)
                {
                    $row = $resultado -> fetch_array();
                            echo '<div class="linhasBloco01">
                            <label>Placa do caminhão:</label>
                            <input type="text" name="placa_caminhao" placeholder="" disabled value=' . $row["placa_caminhao"].'>
                          </div>';
                            echo "<div class='linhasBloco01'>";
                              echo "<label>Nome do motorista:</label>";
                              echo "<input type='text' name='nome_motorista' placeholder='' disabled value=" . $row['nome_motorista'].">";
                            echo "</div>";
                            echo "<div class='linhasBloco01'>";
                              echo "<label>Container:</label>";
                              echo "<input type='text' name='container' placeholder='' disabled value=" . $row['container'].">";
                            echo "</div>";
                            echo "<div class='linhasBloco01'>";
                              echo "<label>Cliente:</label>";
                              echo "<input type='text' name='cliente' placeholder='' disabled value=" . $row['cliente'].">";
                            echo "</div>";
                            echo '<div class="linhasBloco01">';
                              echo "<label>Tipo:</label>";
                              echo '<input type="text" name="tipo" placeholder="" disabled value=' . $row["tipo"].">";
                            echo "</div>";
                            echo '<div class="linhasBloco01">';
                              echo "<label>Lacre:</label>";
                              echo '<input type="text" name="lacre" placeholder="" disabled value=' . $row["lacre"].">";
                            echo "</div>";
                            echo '<div class="linhasBloco01">';
                              echo "<label>Lacre SIF:</label>";
                              echo '<input type="text" name="lacre_sif" placeholder="" disabled value=' . $row["lacre_sif"].">";
                            echo "</div>";
                            echo '<div class="linhasBloco01">';
                              echo "<label>Temperatura:</label>";
                              echo '<input type="text" name="temperatura" placeholder="" disabled value=' . $row["temperatura"].">";
                            echo '</div>';
                            echo '<div class="linhasBloco01">';
                              echo '<label>IMO:</label>';
                              echo '<input type="text" name="IMO" placeholder="" disabled value=' . $row['IMO'].'>';
                            echo '</div>';
                            echo '<div class="linhasBloco01">';
                              echo '<label>Nº ONU:</label>';
                              echo '<input type="text" name="n_onu" placeholder="" disabled value=' . $row["n_onu"].">";
                            echo '</div>';
                          echo '</div>';
                          ?>
                          <div class="bloco02">
                            <div class="bloco02Titulo">
                              <p>Assinale se houver alguma avaria:</p>
                            </div>
                            <form class="form" method="POST" action="cadastroContainer.php">
                              <input type="hidden" name="idPlaca" value="<?php echo $row['id'] ?>">
                            <div class="bloco02Quadro">
                              <div class="subBloco1">
                                <div class="linhasSubBloco1">
                                  <input type="checkbox" name="desgastado" />
                                  <label>Container bem desgastado</label>
                                </div>
                                <div class="linhasSubBloco1">
                                  <input type="checkbox" name="avaria_direita" />
                                  <label>Avaria na lateral direita</label>
                                </div>
                                <div class="linhasSubBloco1">
                                  <input type="checkbox" name="avaria_esquerda" />
                                  <label>Avaria na lateral esquerda</label>
                                </div>
                                <div class="linhasSubBloco1">
                                  <input type="checkbox" name="avaria_teto" />
                                  <label>Avaria no teto</label>
                                </div>
                                <div class="linhasSubBloco1">
                                  <input type="checkbox" name="avaria_frente" />
                                  <label>Avaria na frente</label>
                                </div>
                                <div class="linhasSubBloco1">
                                  <input type="checkbox" name="sem_lacre" />
                                  <label>Sem lacre</label>
                                </div>
                                <div class="linhasSubBloco1">
                                  <input type="checkbox" name="adesivo_avaria" />
                                  <label>Adesivos avariados</label>
                                </div>
                              </div>
                              <div class="subBloco2">
                                <div class="linhasSubBloco2">
                                  <input type="checkbox" name="execesso_altura" />
                                  <label>Excesso de altura</label>
                                </div>
                                <div class="linhasSubBloco2">
                                  <input type="checkbox" name="execesso_direita" />
                                  <label>Excesso na direita</label>
                                </div>
                                <div class="linhasSubBloco2">
                                  <input type="checkbox" name="execesso_esquerda" />
                                  <label>Excesso na esquerda</label>
                                </div>
                                <div class="linhasSubBloco2">
                                  <input type="checkbox" name="execesso_frontal" />
                                  <label>Excesso frontal</label>
                                </div>
                                <div class="linhasSubBloco2">
                                  <input type="checkbox" name="painel_avaria" />
                                  <label>Painel avariado</label>
                                </div>
                                <div class="linhasSubBloco2">
                                  <input type="checkbox" name="sem_caboenergia" />
                                  <label>Sem cabo de energia</label>
                                </div>
                                <div class="linhasSubBloco2">
                                  <input type="checkbox" name="sem_lona" />
                                  <label>Sem lona</label>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="quadroBotao">
                        <input class="" id="pegar" type="submit" value="Enviar"/>
                        </form>
                      </div>
                  <?php 
                    } else {
                    
                    $conexao -> close();
                    echo "<div class='linhaErro'><p>Nenhum registro encontrado.</p></div> ";
                }}}?>
          
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