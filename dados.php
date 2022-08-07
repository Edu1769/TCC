<?php
    include_once("formulario.php");
    session_start();
    $logged = $_SESSION['logado'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Monitoramento</title>
    <link rel="shortcut icon" href="imgs/cachorro.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/dados.css">
    <link rel="stylesheet" href="styles/cabecalho2.css">
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
    </header>
    <main>
        <table>
            <tr>
                <th>Data</th>
                <th>Umidade</th>
                <th>Volume de chuva</th>
                <th>Nivel D'Água</th>
            </tr>
            <tr>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            
        </table>
    </main>
</body>
</html>