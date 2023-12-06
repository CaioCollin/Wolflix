<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Carregamento</title>
  <style>
    body {
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background: url('assets/img/<?php echo isset($_GET['imagem']) ? $_GET['imagem'] : 'default.jpg'; ?>') no-repeat center center fixed;
        background-size: contain; /* Ajuste para 'contain' para que a imagem se ajuste sem cortes */
        background-color: black;
    }

    .loading-container {
        text-align: center;
        color: white;
        z-index: 1; /* Coloca o conteúdo na frente da imagem de fundo */
    }

    .loading-spinner {
        border: 8px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top: 8px solid #fff;
        width: 40vw; /* Ajuste o tamanho em relação à largura da tela */
        height: 40vw; /* Ajuste o tamanho em relação à largura da tela */
        max-width: 120px; /* Limitar o tamanho máximo */
        max-height: 120px; /* Limitar o tamanho máximo */
        animation: spin 1s linear infinite;
        margin-bottom: 20px;
    }

    .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 8px 16px;
        font-size: 1.2em;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: background-color 0.4s, transform 0.4s;
    }

    .back-button:hover {
        background-color: blue;
        transform: scale(1.1);
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    p {
        font-size: 1.5em; /* Ajuste o tamanho da fonte conforme necessário */
        margin: 0;
    }
  </style>
</head>
<body>

<div class="loading-container">
  <div class="loading-spinner"></div>
  <p>Carregando...</p>
  <button class="back-button" onclick="goBack()">
    <i class='bx bx-arrow-back'></i>
    Voltar
  </button>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<!-- ATUALIZAÇÃO DE FILMES - TREILER DE NOVOS FILMES -->
<script>
function redirecionarSeTiverVideo() {
    // Obtém o nome da imagem a partir do parâmetro da URL
    var nomeDaImagem = "<?php echo isset($_GET['imagem']) ? $_GET['imagem'] : ''; ?>";

    // Remove a extensão ".jpg" ou ".jpeg" da imagem
    var nomeDoVideo = nomeDaImagem.replace(/\.jpe?g$/i, '') + '.mp4';

    console.log("Nome da imagem: " + nomeDaImagem);
    console.log("Nome do vídeo antes: " + nomeDoVideo);

    // Verifica se o vídeo existe
    var xhr = new XMLHttpRequest();
    xhr.open("HEAD", 'assets/ms-vidoes/' + nomeDoVideo, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            // Se o vídeo existe, redireciona após 2 segundos
            if (xhr.status == 200) {
                setTimeout(function () {
                    window.location.href = 'carregarfind.php?imagem=' + nomeDaImagem + '&video=' + nomeDoVideo;
                }, 2000);
            }
            // Se o vídeo não existe, permanece na página
        }
    };

    xhr.send();
}

// Chama a função após o carregamento da página
window.onload = function () {
    redirecionarSeTiverVideo();
};
</script>



</body>
</html>
