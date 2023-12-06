<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags para conjunto de caracteres e viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título da página -->
    <title>Login</title>
    <!-- Folhas de estilo externas para ícones de fontes e estilos personalizados -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
  
    <link rel="stylesheet" href="../components/CSS/style.css">
    <!-- <link rel="stylesheet" href="/BootStrap-teste/components/conectaBD.php"> -->
</head>


<style>
  #emailrepetido{
    font-size:20px;
    padding: 10px;
    color: red;
    font-weight: bold;
  }

    .smalerros{
        padding: 5px;
        color:white;
        font-size:20px;
    }

    #exibeEmail{
        display:none;
    }

    .inputUser.erro-input {
    border: 3px solid red;
    }

    .inputUser.valid-input {
        border: 2px solid green;
    }

   /* Seu CSS */
#formcadastrado {
    display: none;
    color: green;
    background: white;
    padding: 10px;
    border-radius: 5px;
    margin: 10px;
}

/* Adicione esta regra para mostrar o elemento quando a classe 'escondido' for removida */
#formcadastrado:not(.escondido) {
    display: block;
}


#mensagemlogin{
    padding:10px;
    color: red;
    font-size:20px
}

#mensagemloginsucesso{
    padding:10px;
    color: green;
    font-size:20px;
    color: green;
    padding: 10px;
}

#sucessomensagem{
    font-size:10px;
    color: green;
}


.inputUser{
    border:1px solid red;
    color:red;
}




</style>

<body>
    <?php
    require("../model/cadastrar_usuario.php");
    ?>
    

    <!-- Container para os formulários de login e cadastro -->
    <div class="container" id="container">
        <!-- Formulário de cadastro -->
        <div class="form-container sign-up">
            <!-- Formulário de registro com validação -->



        <form action="../model/cadastrar_usuario.php" method="post" enctype="multipart/form-data" id="formulariocadastro" onsubmit="return validateForm(event)">
            <h2>Cadastrar </h2>
            <!-- Exibir mensagens de resultado ou erro ou pode-->
            <!-- Seu HTML -->
            <small id="formcadastrado" class="escondido">
            usuário Cadastrado
            </small>

           

            <!-- Campos de entrada para nome de usuário, e-mail, senha -->
            <div class="input-box">
                <i class="bx bxs-user"></i>
                <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome">
            </div>
            <small id="nomeErro" class="smalerros"></small>

            <div class="input-box">
                <i class="bx bxs-envelope"></i>
                <input type="email" name="email" id="email" class="inputUser" placeholder="Email">
            </div>
            <small id="emailErro" class="smalerros">

            </small>

            <div class="input-box">
                <i class="bx bxs-lock-alt"></i>
                <input type="password" name="Password" id="Password" class="inputUser" placeholder="Senha">
            </div>
            <small id="senhaErro" class="smalerros"></small>

            <!-- Botão para enviar o formulário de cadastro -->
            <div class="button">
                <button class="btn" id="exibeEmail" type="button" onclick="verifyEmail(document.getElementById('email').value)">Verificar E-mail</button>
                <button class="btn" type="submit">Cadastrar</button>
            </div>

        </form>

            

            <!-- Botão para alternar para o formulário de login -->
            <button>Fazer Login</button><!-- NA TELA -->
        </div>

        <!-- Formulário de login -->
        <div class="form-container sign-in">
            <!-- Formulário de login -->
            <form id="loginForm" action="#" method="post">
                <h1>Login</h1>
                
                <!-- Campos de entrada para e-mail e senha -->
                <div class="input-box">
                    <i class="bx bxs-envelope"></i>
                    <input type="email" name="email" id="email" class="inputUser" placeholder="Email" required>
                </div>

                <div class="input-box">
                    <input type="password" name="password" class="inputUser" placeholder="Password" required>
                    <i class="bx bxs-lock-alt"></i>
                </div>

                <div id="mensagemlogin"></div>
                <div id="mensagemloginsucesso"></div>

                <!-- Link para recuperação de senha -->
                <a href="#" id="esqueceusenha">Esqueceu sua senha?</a>
                
                <!-- Botão para enviar o formulário de login -->
                <button type="submit" name="loginprincipal">Login</button>
            </form>
        </div>

        <!-- Container para alternar entre os formulários de cadastro e login -->
        <div class="toggle-container">
            <div class="toggle">
                <!-- Painel esquerdo para informações de login -->
                <div class="toggle-panel toggle-left">
                    <h1>Explore o Mundo do Entretenimento com a Wolflix</h1>
                    <p>A Wolflix oferece um extenso catálogo de filmes, documentários, séries e exclusivos Wolflix premiados. Desfrute à vontade, a qualquer momento.</p>
                    <!-- Botão oculto para alternar para o formulário de login -->
                    <button class="hidden" id="login">Fazer Login</button>
                </div>

                <!-- Painel direito para informações de cadastro -->
                
                <div class="toggle-panel toggle-right">
                    <div class="content">
                        <img src="imglogin/wolf.png" alt="Logo da Empresa" id="imglogo">
    
                        <h1 class="logo">
                            Wol<span>Flix</span>
                        </h1>
                        <p>Divirta-se com filmes épicos, séries de sucesso e muito mais...</p>
                        <!-- Botão oculto para alternar para o formulário de cadastro -->
                        <button class="hidden" id="register">Fazer Cadastrar</button>
                    </div>
                </div>

                
            </div>
        </div>

         
    </div>

    <!-- Arquivo JavaScript para validação de formulário e interatividade -->
    <script src="JS/script.js"></script>

    <!-- //Faz a parte do Login -->
    <script>
        document.getElementById('loginForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        // Obtenha os dados do formulário
        var formData = new FormData(this);

        // Faça uma requisição AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../model/usuario_login.php', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                // A requisição foi bem-sucedida
                var response = JSON.parse(xhr.responseText);
                
                // Verifique o status da resposta
                if (response.status === 'success') {
                    // Login bem-sucedido, exiba a mensagem
                    document.getElementById('mensagemloginsucesso').innerHTML = response.mensagem;

                    // Adicione um atraso de 2 segundos antes de redirecionar
                    setTimeout(function() {
                        window.location.href = ".../../../../../BootStrap-teste/components/main.php";
                    }, 2000);
                } else {
                    // Login falhou, exiba a mensagem de erro
                    exibirMensagemErro(response.mensagem);
                    // Adicione um atraso de 2 segundos antes de limpar a mensagem de erro
                    setTimeout(function() {
                        limparMensagemErro();
                    }, 3500);
                }
            } else {
                // O servidor retornou um erro
                exibirMensagemErro('Erro na requisição. Tente novamente.');
                
                
                // Adicione um atraso de 2 segundos antes de limpar a mensagem de erro
                setTimeout(function() {
                    limparMensagemErro();
                }, 2000);
            }
        };

        xhr.onerror = function () {
            // Um erro ocorreu na requisição
            exibirMensagemErro('Erro na requisição. Tente novamente.');
            
            // Adicione um atraso de 2 segundos antes de limpar a mensagem de erro
            setTimeout(function() {
                limparMensagemErro();
            }, 2000);
        };

        // Envie os dados do formulário
        xhr.send(formData);
    });

    function exibirMensagemErro(mensagem) {
        document.getElementById('mensagemlogin').innerHTML = mensagem;
        
    }

    function limparMensagemErro() {
        document.getElementById('mensagemlogin').innerHTML = '';
    }


</script>







    <!-- //Faz a parte do Cadastro -->
<script>
        function validateForm(event) {
            // Previne o comportamento padrão do envio do formulário
            event.preventDefault();

            // Obtém os valores dos campos
            var nome = document.getElementById('nome').value;
            var email = document.getElementById('email').value;
            var senha = document.getElementById('Password').value;

            // Inicializa as mensagens de erro
            document.getElementById("nomeErro").innerText = "";
            document.getElementById("emailErro").innerText = "";
            document.getElementById("senhaErro").innerText = "";

            // Realiza as validações desejadas
            if (nome.trim() === "") {
                document.getElementById("nomeErro").innerText = "O campo Nome é obrigatório.";
                document.getElementById('nome').classList.add('erro-input');
                return false;
            } else {
                document.getElementById('nome').classList.add('valid-input');
            }


            if (email.trim() === "") {
                document.getElementById("emailErro").innerText = "O campo E-mail é obrigatório.";
                document.getElementById('email').classList.add('erro-input');
                return false;
            }else{
                document.getElementById('email').classList.add('valid-input');
            }



            if (senha.trim() === "") {
                document.getElementById("senhaErro").innerText = "O campo Senha é obrigatório.";
                document.getElementById('Password').classList.add('erro-input');
                return false;
            }else{
                document.getElementById('Password').classList.add('valid-input');
            }

            // Adiciona a verificação de e-mail existente
            verifyEmail(email);
        }

        function verifyEmail(email) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);

                document.getElementById('email').classList.remove('erro-input', 'valid-input');


                if (response.exists) {
                    // alert('Email ja foi cadastrado');
                    document.getElementById("emailErro").innerText = "Este e-mail já está cadastrado .";
                    document.getElementById('email').classList.add('erro-input');
                } else{
                    
                    document.getElementById('formcadastrado').classList.remove('escondido');

                    // E aguarde 2 segundos antes de redirecionar
                    setTimeout(function () {
                        alert("Usuário Cadastrado, aguarde...");

                        // Agora, faça o submit do formulário programaticamente
                        document.getElementById("formulariocadastro").submit();

                    }, 2000);
                }
            }
        };

        // Ajusta para o método POST e envia os dados como parte do corpo da requisição
        xmlhttp.open("POST", "../model/verificar_email.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("email=" + email);

        // window.location.href = ".../../../../../BootStrap-teste/components/main.php";
        
        }

</script>



</body>

</html>
