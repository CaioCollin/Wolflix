<?php
// Conectar ao banco de dados (substitua as informações conforme necessário)
require_once('.../../../../../BootStrap-teste/components/conectaBD.php');

// Variável para armazenar a mensagem
$mensagem = "";


// Verificar se a conexão foi estabelecida corretamente
if (!$conn) {
    $mensagem = "Erro na conexão com o banco de dados: " . mysqli_connect_error();
}

// Processar dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($mensagem)) {
    // Validar o formulário
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Exemplo de validação: Verificar se os campos não estão vazios
    if (empty($email) || empty($password)) {
        $mensagem = "Por favor, preencha todos os campos do formulário.";
    } else {
        // Utilizar consultas preparadas para evitar injeção de SQL
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $stmt = $conn->prepare($sql);

        // Verificar se a preparação da consulta foi bem-sucedida
        if ($stmt) {
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Usuário autenticado com sucesso
                session_start();
                $_SESSION['user_email'] = $email;
                $mensagem = "Login bem-sucedido!";
                echo json_encode(['status' => 'success', 'mensagem' => $mensagem]);
                exit(); // Encerre o script após o envio do JSON
            } else {
                // Credenciais inválidas
                $mensagem = "Credenciais inválidas. Tente novamente.";
                echo json_encode(['status' => 'error', 'mensagem' => $mensagem]);
                exit(); // Encerre o script após o envio do JSON
            }
            
            

            // Fechar a declaração
            $stmt->close();
        } else {
            $mensagem = "Erro na preparação da consulta: " . $conn->error;
        }
    }
}

// Fechar a conexão
$conn->close();

// Retorne a mensagem como JSON
header('Content-Type: application/json');
echo json_encode(['mensagem' => $mensagem]);


?>
