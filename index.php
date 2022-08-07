<?php
    include "formulario.php";
    session_start();

    $_SESSION['logado'] =false;
    $_SESSION['nome'] = null;
    $_SESSION['senha'] = null;
    $_SESSION['id'] = null;

    if(isset($_POST["visitante"]))
    {  
        header("location: home.php"); 
        exit();
    }

    if(isset($_POST['submit_login']))
    { 
        $login_nome = $_POST['login_nome'];
        $login_senha = $_POST['login_senha'];

        $usuario = "SELECT nome, senha FROM usuarios WHERE nome = '{$login_nome}' and senha = '{$login_senha}'";
        $result = mysqli_query($con, $usuario);
        $row = mysqli_num_rows($result);
        
        
        if($row>=1)
        {       
            $_SESSION['nome'] = $login_nome;
            $_SESSION['senha'] = $login_senha;
            $_SESSION['logado'] = true;
            
            header("location: home.php"); 
        }else{
            $msg = "Usuario Invalido!";
        }
    }

    if(isset($_POST['submit_cad']))
    {
        include_once("formulario.php");
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $confSenha =  $_POST['confSenha'];
        $email = $_POST['email'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        
        $usuario = "SELECT nome, senha FROM usuarios WHERE nome = '{$nome}' and senha = '{$senha}'";

        $result = mysqli_query($con, $usuario);
        $row = mysqli_num_rows($result);
        
        if($row>=1)
        {   
            header("location: index.php"); 
            exit();
        }else{
        if ($senha == $confSenha)
        {
            $result = mysqli_query($con, "INSERT INTO usuarios(nome,senha,email,cidade,estado) VALUES ('$nome', '$senha','$email','$cidade','$estado')");
            header("location: index.php"); 
            exit();
        }
        else
        {
            $msg = "Senha Invalida!!";
        }
        }

    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Monitoramento</title>
    <link rel="shortcut icon" href="imgs/cachorro.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div id="conteudo">
        <section id="text_introd">
            <h1>Sistema de Monitoriamento <br> e Prevenção de Enchentes</h1>
            <p>O SMPE ajuda você a ficar por dentro dos problemas causados por chuvas, sempre lhe informando o melhor </p>
        </section>

        <main id="area_form">
            <div id="form_titulo">
                <h1>Login</h1>
            </div>
            <form action="index.php" method="post">
                <div id="form">
                    <label>Seu nome:</label><br>
                    <input name="login_nome" class="form_caixa" placeholder="Digite seu nome" type="text"><br><br>
                    
                    <label>Senha:</label><br>
                    <input name="login_senha" class="form_caixa" placeholder="Digite sua senha" type="password"><br><br>

                    <label>Confirme sua senha:</label><br>
                    <input name="confirm_senha" class="form_caixa" placeholder="Digite sua senha novamente" type="password"><br><br>

                    <input class="botao" type="submit" name="submit_login" id="submit_login" value="Entrar">
                    <input class="botao" type="submit" name="visitante" id="visitante" value="visitante">
                    
                    <p>não possui cadastro?
                        <a class="trigger" onclick="showModal()" href="#">Aqui</a>
                    </p>   
                    
                    <?php
                        echo "<p id='alerta'>$msg</p>";                      
                    ?>
                </div>

            </form>
        </main>
    </div>



    
    <div class="modal" id="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal()">
                &times;
            </span>
            <form action="index.php" method="POST">
                <div>
                    <label>Seu nome:</label><br>
                    <input class="form_caixa" name="nome" placeholder="Digite seu nome" type="text" required><br><br>
                    
                    <label>Senha:</label><br>
                    <input class="form_caixa" name="senha" placeholder="Digite sua senha" type="password" required><br><br>
    
                    <label>Confirme sua senha:</label><br>
                    <input class="form_caixa" name="confSenha" placeholder="Digite sua senha novamente" type="password"><br><br>
                    
                    <label>e-mail:</label><br>
                    <input class="form_caixa" name="email" placeholder="Digite seu sobrenome" type="text" required><br><br>
    
                    <label>telefone:</label><br>
                    <input class="form_caixa" name="telefone" placeholder="Digite seu sobrenome" type="text" required><br><br>
    
                    <select name="estado" id="estado" onchange="buscaCidades(this.value)" required>
                        <option name="estado" value="">Selecione o Estado</option>
                        <option name="estado" value="AC">Acre</option>
                        <option name="estado" value="AL">Alagoas</option>
                        <option name="estado" value="SP">São Paulo</option>
                    </select>
                    <br/>
    
                    <select value="cidade" name="cidade" id="cidade" required></select>
                    <script src="js/cidade.js"></script>
                    <br><br>

                    <input id="botao" type="submit" name="submit_cad" id="submit_cad" value="Cadastre-se">
                    
                </div>
            </form>
        </div>
    </div>


    <script>
        function showModal() {
            var element = document.getElementById("modal");
            element.classList.add("show-modal");
        }

        function closeModal() {
            var element = document.getElementById("modal");
            element.classList.remove("show-modal");
        }
    </script>
    
</body>
</html>