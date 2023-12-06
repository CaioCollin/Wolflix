<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
   body {
  background: url('assets/img/image.jpg')  repeat;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin: 0;
  font-family: 'Edu QLD Beginner', cursive;
}



    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      max-width: 800px;
      width: 100%;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .rounded-image {
      border-radius: 30%;
      width: 200px;
      height: 200px;
      object-fit: cover;
      margin-bottom: 20px;
    }

    .bodytext {
      display: flex;
      flex-direction: column;
      color: #333;
      font-size: 1.5em;
    }

    .bodytext p {
      font-size: 1.2em;
      margin: 8px 0;
      display: flex;
      align-items: center;
    }

    .icon {
      margin-right: 10px;
    }

    .back-button, .logout-button {
      position: absolute;
      top: 10px;
      padding: 8px 16px;
      font-size: 1.2em;
      cursor: pointer;
      display: flex;
      align-items: center;
      border: none;
      border-radius: 5px;
      transition: background-color 0.4s, transform 0.4s;
    }

    .back-button {
      right: 10px;
      background-color: #007BFF;
      color: white;
    }

    .logout-button {
      left: 10px;
      background-color: #FF0000;
      color: white;
    }

    .back-button:hover, .logout-button:hover {
      background-color: blue;
      transform: scale(1.1);
    }

    hr {
    border: none;
    height: 2px;
    background-color: blue;
    width: 100%;
    }


    @media (max-width: 768px) {
      .container {
        align-items: center;
      }
    }
  </style>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['user_email'])) {
  $usuario_logado = $_SESSION['user_email'];
  
  // Conectar ao banco de dados (substitua as informações conforme necessário)
  require_once('../components/conectaBD.php');

  // Verificar se a conexão foi estabelecida corretamente
  if (!$conn) {
      $mensagem = "Erro na conexão com o banco de dados: " . mysqli_connect_error();
  }

  // Consulta para obter o nome do usuário com base no e-mail
  $consulta = "SELECT nome FROM usuarios WHERE email = ?";
  $stmt = $conn->prepare($consulta);
  $stmt->bind_param("s", $usuario_logado);
  $stmt->execute();
  $stmt->bind_result($nome_usuario);
  $stmt->fetch();
  $stmt->close();

  // Fechar a conexão
  $conn->close();

} 
?>


<div class="container text-center text-white">
  <!-- Botão Sair -->


    <form action="closeusuario.php" method="post">
        <button type="submit" class="logout-button">
            <i class='bx bx-log-out icon' ></i>
            Sair
        </button>
    </form>

  <!-- Botão Voltar -->
  <button class="back-button" id="iconcoltar" onclick="goBack()">
    <i class='bx bx-arrow-back icon'></i>
    Voltar
  </button>

  <img src="assets/img/p6.png" alt="Imagem Redonda" class="rounded-image img-thumbnail">
  <div class="bodytext">
    <p>
      <i class='bx bxs-user icon' style="color: #007BFF;"></i>
      <span style="font-weight: bold;"><?php echo $nome_usuario; ?></span>
    </p>
    <p>
      <i class='bx bx-mail-send icon' style="color: #007BFF;"></i>
      <?php echo $usuario_logado; ?>
    </p>
  </div>
</div>

<script>
  function goBack() {
    window.history.back();
  }
</script>

</body>
</html>
