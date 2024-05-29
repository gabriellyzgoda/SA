<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once('config.php');
include_once('config.php');

// Verifica se o usuário está logado
if(!isset($_SESSION['email'])) {
    header("Location: login.php?erro=false");
    exit;
}
$sql = "SELECT * FROM cadastro
WHERE professor = 0";
// puxa conexão
$resultado = $conexao->query($sql);
$row = $resultado -> fetch_array();
$_SESSION["nome"]= $row[0];
$_SESSION["email"]= $row[1];
$_SESSION["cargo"]= $row[2];
$conexao -> close();?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Aluno</title>
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="estiloContainer.css" media="screen"/>
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
          <div class="dropdown-perfil">
            <a href="#" >
                <div class="circulo">
                        <i class="fa-solid fa-user"></i>
                </div>
            </a>
            <div class="dropdown-content">
              <div class="dropdown-section">
                <h4>Nome:</h4>
                <p><?php echo $row['nome'];?></p>
              </div>
              <div class="dropdown-section">
                <h4>Email:</h4>
                <p><?php echo $row['email'];?></p>
              </div>
              <div class="dropdown-section">
                <h4>Cargo:</h4>
                <p><?php echo $row['cargo'];?></p>
              </div>
            </div>
          </div>
          <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a>      
        </div>
    </header>
    <div class="sidebar ">
      
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
         <h1>Vistoria e Conferência - Container</h1>
        </div>
    </div>
    <div class="linha-vistoria">
      <div class="quadro-vistoria">
      <form class="form" method="post" action="" id="" name="" >
        <div class="quadroForm">
            <div class="bloco01">
              <div class="linhasBloco01">
                <label>Placa do caminhão:</label>
                <input type="text" name="un" placeholder="">
              </div>
              <div class="linhasBloco01">
                <label>Nome do caminhão:</label>
                <input type="text" name="un" placeholder="">
              </div>
              <div class="linhasBloco01">
                <label>Container:</label>
                <input type="text" name="un" placeholder="">
              </div>
              <div class="linhasBloco01">
                <label>Cliente:</label>
                <input type="text" name="un" placeholder="">
              </div>
              <div class="linhasBloco01">
                <label>Tipo:</label>
                <input type="text" name="un" placeholder="">
              </div>
              <div class="linhasBloco01">
                <label>Lacre:</label>
                <input type="text" name="un" placeholder="">
              </div>
              <div class="linhasBloco01">
                <label>Lacre SIF:</label>
                <input type="text" name="un" placeholder="">
              </div>
              <div class="linhasBloco01">
                <label>Temperatura:</label>
                <input type="text" name="un" placeholder="">
              </div>
              <div class="linhasBloco01">
                <label>IMO:</label>
                <input type="text" name="un" placeholder="">
              </div>
              <div class="linhasBloco01">
                <label>Nº ONU:</label>
                <input type="text" name="un" placeholder="">
              </div>
            </div>
            <div class="bloco02">
              <div class="bloco02Titulo">
                <p>Assinale se houver alguma avaria:</p>
              </div>
              <div class="bloco02Quadro">
                <div class="subBloco1">
                  <div class="linhasSubBloco1">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Container bem desgastado</label>
                  </div>
                  <div class="linhasSubBloco1">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Avaria na lateral direita</label>
                  </div>
                  <div class="linhasSubBloco1">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Avaria na lateral esquerda</label>
                  </div>
                  <div class="linhasSubBloco1">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Avaria no teto</label>
                  </div>
                  <div class="linhasSubBloco1">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Avaria na frente</label>
                  </div>
                  <div class="linhasSubBloco1">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Sem lacre</label>
                  </div>
                  <div class="linhasSubBloco1">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Adesivos avariados</label>
                  </div>
                </div>
                <div class="subBloco2">
                  <div class="linhasSubBloco2">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Excesso de altura</label>
                  </div>
                  <div class="linhasSubBloco2">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Excesso na direita</label>
                  </div>
                  <div class="linhasSubBloco2">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Excesso na esquerda</label>
                  </div>
                  <div class="linhasSubBloco2">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Excesso frontal</label>
                  </div>
                  <div class="linhasSubBloco2">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Painel avariado</label>
                  </div>
                  <div class="linhasSubBloco2">
                    <input type="checkbox" id="saida" name="saida" />
                    <label>Sem cabo de energia</label>
                  </div>
                  <div class="linhasSubBloco2">
                    <input type="checkbox" id="saida" name="saida" />
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