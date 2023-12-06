<?php
// Obtém o nome da imagem e do vídeo a partir dos parâmetros da URL
$nomeDaImagem = isset($_GET['imagem']) ? $_GET['imagem'] : '';
$nomeDoVideo = isset($_GET['video']) ? $_GET['video'] : '';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        * {
            font-family: 'Edu QLD Beginner', cursive;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        .modal {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 99999;
            opacity: 0;
            transition: opacity 400ms ease-in;
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background:
            linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)),
                url('assets/img/<?php echo $nomeDaImagem; ?>')  repeat ;
            background-position: center center; 
        }

        .modal:target {
            opacity: 1;
            pointer-events: auto;
        }

        .modal>div {
            width: 70%;
            max-height: 80%;
            position: relative;
            padding: 15px 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 20px;
            margin: 0 auto;
        }

        .video-container {
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: relative;
        }

        .video-container video {
            display: flex;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /*caio */
        #meuVideo {
            display: flex;
            width: 100%;
            height: 500px;
            border-radius: 10px;
            box-shadow: 0 0 20px 10px rgba(0, 0, 0, 0.8);
        }

        .fechar {
            position: absolute;
            width: 30px;
            right: -15px;
            top: -20px;
            text-align: center;
            line-height: 30px;
            margin-top: 5px;
            background: #ff4545;
            border-radius: 50%;
            font-size: 16px;
            color: white;
            cursor: pointer;
        }

        #abrirModal {
            display: flex;
            cursor: pointer;
        }

        #ptext {
            color: orange;
        }
    </style>
</head>

<body>
    <i class='bx bxs-right-arrow' onclick="querochamaraquiomodal()"></i>
    <a id="ptext" onclick="querochamaraquiomodal()">VER FILME</a>
    <div id="abrirModal" class="modal">
        <div>
            <a href="main.php" title="Fechar" class="fechar" onclick="fecharModal()">x</a>
            <div class="video-container">
                <video id="meuVideo" controls>
                    <source src="assets/ms-vidoes/<?php echo $nomeDoVideo; ?>" type="video/mp4">
                    Seu navegador não suporta o elemento de vídeo.
                </video>
            </div>
        </div>
    </div>
    <script>
    window.onload = function () {
        // Função para abrir automaticamente o modal ao carregar a página
        querochamaraquiomodal();

        // Adiciona um evento de clique ao botão de fechar
        document.getElementById('fecharModalBtn').addEventListener('click', function () {
            // Função para fechar o modal
            fecharModal();

            // Redireciona para a página main.php após fechar o modal
            window.location.href = 'main.php';
        });
    };

    function querochamaraquiomodal() {
        document.getElementById('abrirModal').style.opacity = '1';
        document.getElementById('abrirModal').style.pointerEvents = 'auto';
        document.getElementById('meuVideo').play();
    }

    function fecharModal() {
        document.getElementById('abrirModal').style.opacity = '0';
        document.getElementById('abrirModal').style.pointerEvents = 'none';
        document.getElementById('meuVideo').pause();
    }
</script>

</body>

</html>
