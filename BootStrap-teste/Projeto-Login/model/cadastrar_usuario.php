<?php

require_once('.../../../../../BootStrap-teste/components/conectaBD.php');
require_once('Usuario.php');

session_start();

// Inicializar mensagens de erro
$erros = array();

// Conectar ao banco de dados
$conexao = conectarBanco();

// Script para criar a tabela usuarios se não existir
$sql_criar_tabela = "
   CREATE TABLE IF NOT EXISTS usuarios (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nome VARCHAR(255) NOT NULL,
       email VARCHAR(255) NOT NULL UNIQUE,
       senha VARCHAR(255) NOT NULL
   )
";

if ($conexao->query($sql_criar_tabela) === FALSE) {
   die("Erro ao criar a tabela usuarios: " . $conexao->error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Obtém os dados do formulário
   $nome = $_POST["nome"];
   $email = $_POST["email"];
   $senha = $_POST["Password"];

   // Verificar se o usuário já existe pelo e-mail
   $sql_verificar_usuario = "SELECT * FROM usuarios WHERE email = '$email'";
   $resultado_verificar_usuario = $conexao->query($sql_verificar_usuario);

   if ($resultado_verificar_usuario->num_rows > 0) {
      // Usuário já existe, adicionar mensagem de erro na sessão
      $erros[] = "Usuário com este e-mail já cadastrado.";
      $_SESSION['emailErro'] = "E-mail já cadastrado.";
   }

   // Se não houver erros de validação, continuar com o processamento
   if (empty($erros)) {
      // Usuário não existe, criar a entidade
      $usuario = new Usuario($nome, $email, $senha);

      // Inserir usuário no banco de dados
      $sql_inserir = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
      if ($conexao->query($sql_inserir) === TRUE) {
         $_SESSION['user_email'] = $email;
         $_SESSION['mensagem_sucesso'] = "Cadastro realizado com sucesso!";
         header("Location: .../../../../../BootStrap-teste/components/main.php");
         exit();
      } else {
         $erros[] = "Erro ao cadastrar: " . $conexao->error;
      }
   }

   // Armazenar mensagens de erro na sessão para exibir na página de formulário
   $_SESSION['erros'] = $erros;
   header("Location: ../components/login.php");
   exit();
}

// Fechar a conexão
$conexao->close();
?>
