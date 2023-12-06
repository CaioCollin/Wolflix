<?php
require_once('.../../../../../BootStrap-teste/components/conectaBD.php');

// Conectar ao banco de dados
$conexao = conectarBanco();

// Obtém o e-mail enviado via POST
$email = $_POST["email"];

// Verifica se o e-mail já existe no banco de dados
$sql_verificar_usuario = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado_verificar_usuario = $conexao->query($sql_verificar_usuario);

// Monta a resposta em formato JSON
$response = ['exists' => ($resultado_verificar_usuario->num_rows > 0)];

// Fecha a conexão
$conexao->close();

// Retorna a resposta em formato JSON
echo json_encode($response);
?>
