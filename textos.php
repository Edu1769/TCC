<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/texto.css">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    include_once("formulario.php");
    $msgs[] = array();
    $users[] = array();
    $i=0;
    $logged = $_SESSION['logado'];
    $nome = $_SESSION['nome'];

    if($logged == 1)
    {
        $mensagem = mysqli_query($con,"SELECT texto FROM text order by id desc");
        $usuario = mysqli_query($con,"SELECT nome FROM text order by id desc");
        while($msg = mysqli_fetch_assoc($mensagem)){
            $msgs[] = $msg;
        }

        while($user = mysqli_fetch_assoc($usuario)){
            $users[] = $user;
        }

        while($i <count($msgs))
        {
            foreach($msgs[$i] as $value){
                foreach($users[$i] as $value1){
                    echo "<div id='textos'>";
                    echo "<p id='nome_t'>$value1 </p>";
                    echo "<p>$value</p>";
                    echo "</div>";
                }
            }
            $i = $i+1;
        }
    }
    else{
        echo "<p id='negado'>Faça o login para acessar os comentarios<br> </p>";
    }
?>

</body>
</html>