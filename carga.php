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
    <link rel="stylesheet" type="text/css" href="estiloCarga.css" media="screen"/>
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
         <h1>Vistoria e Conferência - Carga</h1>
        </div>
      <div class="linhaVistoria">
        <div class="quadroCarga">
          <form>
            <div class="linha01">
              <div class="linha01-01">
                <label>Nota Fiscal:</label>
                <input type="text" name="un" placeholder="">
              </div>
              <div class="linha01-02">
                <label>Doca:</label>
                <input type="text" name="un" placeholder="">
              </div>
              <div class="linha01-03">
                <label>Pedido de compra:</label>
                <input type="text" name="un" placeholder="">
              </div>
            </div>
            <div class="linha02">
              <label>Sem pedido:</label>
              <button>OK</button>
            </div>
            <div class="linha03">
              <div class="quadroProdutos">
                  <div class="tituloQuadroProdutos">
                    <p>Produtos</p>
                  </div>
                  <div class="produtos">
                    <div class="produto01">
                      <div class="produtoLinha1">
                        <div class="numeroProduto"><p>1</p></div>
                        <input type="text" id="nome" name="">
                        <label>Faltando?</label>
                        <input type="checkbox" id="saida" name="saida" />
                        <label>Avaria?</label>
                        <input type="checkbox" id="saida" name="saida" />
                      </div>
                      <div class="produtoLinha2">
                        <div class="produtoLinha2-Bloco1">
                          <label>UN</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco2">
                          <label>QTD</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco3">
                          <label>R$/Un</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco4">
                          <label>R$ Total</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco5">
                          <button>OK</button>
                        </div>
                      </div>
                    </div>
                    <div class="produto02">
                      <div class="produtoLinha1">
                        <div class="numeroProduto"><p>2</p></div>
                        <input type="text" id="nome" name="">
                        <label>Faltando?</label>
                        <input type="checkbox" id="saida" name="saida" />
                        <label>Avaria?</label>
                        <input type="checkbox" id="saida" name="saida" />
                      </div>
                      <div class="produtoLinha2">
                        <div class="produtoLinha2-Bloco1">
                          <label>UN</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco2">
                          <label>QTD</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco3">
                          <label>R$/Un</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco4">
                          <label>R$ Total</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco5">
                          <button>OK</button>
                        </div>
                      </div>
                    </div>
                    <div class="produto03">
                      <div class="produtoLinha1">
                        <div class="numeroProduto"><p>3</p></div>
                        <input type="text" id="nome" name="">
                        <label>Faltando?</label>
                        <input type="checkbox" id="saida" name="saida" />
                        <label>Avaria?</label>
                        <input type="checkbox" id="saida" name="saida" />
                      </div>
                      <div class="produtoLinha2">
                        <div class="produtoLinha2-Bloco1">
                          <label>UN</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco2">
                          <label>QTD</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco3">
                          <label>R$/Un</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco4">
                          <label>R$ Total</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco5">
                          <button>OK</button>
                        </div>
                      </div>
                    </div>
                    <div class="produto04">
                      <div class="produtoLinha1">
                        <div class="numeroProduto"><p>4</p></div>
                        <input type="text" id="nome" name="">
                        <label>Faltando?</label>
                        <input type="checkbox" id="saida" name="saida" />
                        <label>Avaria?</label>
                        <input type="checkbox" id="saida" name="saida" />
                      </div>
                      <div class="produtoLinha2">
                        <div class="produtoLinha2-Bloco1">
                          <label>UN</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco2">
                          <label>QTD</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco3">
                          <label>R$/Un</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco4">
                          <label>R$ Total</label>
                          <input type="text" name="">
                        </div>
                        <div class="produtoLinha2-Bloco5">
                          <button>OK</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="linha04">
              <input class="" id="pegar" type="submit" value="Enviar"/>
            </div>
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