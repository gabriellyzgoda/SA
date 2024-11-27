<?php
include_once('config.php');

$sql = "SELECT * FROM admin WHERE 1";
$resultado = $conexao->query($sql);

$user_data = $resultado->fetch_assoc(); 
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicial</title>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estilo.css" media="screen"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
</head>
<body>
    <div class="principal">
        <div class="social">
            <a class="icons" href="https://www.facebook.com/senaisc/events/?locale=es_LA&_rdr"><i class="fa-brands fa-square-facebook fa-xl"></i></a>
            <a class="icons" href="https://www.instagram.com/senai.sc/"><i class="fa-brands fa-instagram fa-xl"></i></a>
            <a class="icons" href="https://www.youtube.com/channel/UCQFD9JHT1tgBT9NhNIPrJ1A"><i class="fa-brands fa-youtube fa-xl"></i></a>
        </div>
        <div class="logo">
            <img src="imagens/modelosa.jpg" alt="Minha Figura" width="400" height="auto">
        </div>
        <div class="iniciar">
            <button onclick="editarAluno()">Iniciar</button>
        </div>
        <?php if (isset($_GET['erro'])) { ?>
                            <div class="linha-erro">
                                <div class="mensagem-erro">
                                    <p>
                                        <?php
                                        if ($_GET['erro'] == 1) {
                                            echo "Senha incorreta";
                                        } 
                                        ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
        <div id="formPopup" class="form-popup" style="display: none;">
            <form id="editForm" class="form-container" method="POST" action="verificaIndex.php">
                <div class="config-form">
                    <label for="senha">Digite a senha para continuar:</label>
                    <div class="newPassword">
                        <input type="text" id="senha" name="senha" required>
                    </div>
                    <div id="passwordPopup" class="popup-content"></div>
                    <div class="botoes-form">
                        <button type="submit" class="btn" value="Entrar">Entrar</button>
                        <button type="button" class="btn cancel" onclick="closeForm()">Fechar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="overlay" id="overlay" style="display: none;"></div>
</body>
<script>
function editarAluno() {
    document.getElementById("formPopup").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}

function closeForm() {
    document.getElementById("formPopup").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}
</script>
</html>