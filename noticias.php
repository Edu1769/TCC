<?php
    session_start();
    include_once("formulario.php");
    $logged = $_SESSION['logado'];
    $nome = $_SESSION['nome'];
    if($logged==1)
    {
        if(isset($_POST['submit_text']))
        {  
            $texto = $_POST['texto'];
            $result = mysqli_query($con, "INSERT INTO text(texto,nome) VALUES ('$texto','$nome')");
            header("location: noticias.php"); 
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/cabecalho2.css">
    <link rel="stylesheet" href="styles/noticias.css">
    <link rel="stylesheet" href="styles/texto.css">
    <title>Document</title>
</head>
<body>
    <header id="cabecalho">
        <nav>
            <a href="index.html"><img id="img_dog" src="imgs/cachorro1.png" alt=""></a>
            <div id="mobile_menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div> 
            </div>
            <ul id="nav-list">
                <li><a class="menu_nav" href="home.php">HOME</a></li>
                <li><a class="menu_nav" href="dados.php">DADOS</a></li>
                <li><a class="menu_nav" href="noticias.php">NOTICIAS</a></li>
                <?php
                    if($logged == 1)
                    {
                        echo "<li><a class='menu_nav logout' href='index.php'>LOGOUT</a></li>";
                    }
                    else{
                        echo "<li><a class='menu_nav' href='index.php'>LOGIN</a></li>";
                    }
                ?>
                
            </ul>
        </nav>
        <main>
            <form action="noticias.php" method="POST">
                <textarea data-panel="{&quot;focusable&quot;:true,&quot;clickOnActivate&quot;:true}" name="texto" id="text" placeholder="Escreva sua noticia..." maxlength="200"></textarea> <br>
                <input type="submit" name="submit_text" id="submit_text" value="Enviar">

            </form>
            
            <iframe id="noticias" src="textos.php" frameborder="0">
                
            </iframe>
        </main>
    </header>
</body>
</html>