// Obtém referências para os elementos do DOM
const registerBtn = document.getElementById('register');
const container = document.getElementById('container');
const loginBtn = document.getElementById('login');

// Adiciona ou remove a classe 'active' do contêiner ao clicar nos botões de registro e login
registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// Função de Validação do Formulário de Registro
// function validateForm() {
//     // Obtém os valores dos campos
//     var nome = document.getElementById('nome').value;
//     var email = document.getElementById('email').value;
//     var senha = document.getElementById('Password').value;

//     // Inicializa as mensagens de erro
//     document.getElementById("nomeErro").innerText = "";
//     document.getElementById("emailErro").innerText = "";
//     document.getElementById("senhaErro").innerText = "";

//     // Realiza as validações desejadas
//     if (nome.trim() === "") {
//         document.getElementById("nomeErro").innerText = "O campo Nome é obrigatório.";
//         return false;  // Impede o envio do formulário se a validação falhar
//     }

//     if (email.trim() === "") {
//         document.getElementById("emailErro").innerText = "O campo E-mail é obrigatório.";
//         return false;
//     }

//     if (senha.trim() === "") {
//         document.getElementById("senhaErro").innerText = "O campo Senha é obrigatório.";
//         return false;
//     }

//     // Se todas as validações passarem, retorna true para permitir o envio do formulário
//     document.getElementById("result").innerText = "Formulário válido!"; // Exibe mensagem de sucesso ou outra ação desejada
//     return true;
// }




// Função para validar se o campo não está vazio
function validateNotEmpty(value, errorMessage) {
    if (value == "") {
        displayErrorMessage(errorMessage);
        return false;
    }
    return true;
}

// Função para validar o formato de email
function validateEmail(email, errorMessage) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        displayErrorMessage(errorMessage);
        return false;
    }
    return true;
}

// Função para validar se as senhas coincidem
function validatePasswordMatch(password, cPassword, errorMessage) {
    if (cPassword !== password) {
        displayErrorMessage(errorMessage);
        return false;
    }
    return true;
}

// Função para exibir mensagens de erro
function displayErrorMessage(message) {
    document.getElementById("result").innerHTML = message;
}

// Função para exibir mensagens de sucesso
function displaySuccessMessage(message) {
    document.getElementById("result").innerHTML = message;
}

// Função para exibir o popup
function displayPopup() {
    var popup = document.getElementById('popup');
    popup.classList.add("open-slide");
}

// Função para fechar o popup
function closeSlide() {
    var popup = document.getElementById('popup');
    popup.classList.remove("open-slide");
}

// Aguarda até que todo o conteúdo da página seja carregado antes de executar o código
document.addEventListener("DOMContentLoaded", function () {
    // Adiciona um ouvinte de eventos para o envio do formulário
    var form = document.forms["FormCadastro"];
    form.addEventListener("submit", function (event) {
        // Impede o envio do formulário se a validação falhar
        if (!validateForm()) {
            event.preventDefault();
        }
    });
});
