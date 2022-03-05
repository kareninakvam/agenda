<?php 
session_start();

if (isset ($_POST ['email']) && !empty ($_POST['email']) ){
    $email = addslashes ($_POST ['email']);
    $senha = addslashes ($_POST ['senha']);
    
    try {
        require 'config/config.php';
        $sql = $pdo -> query ("SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'");

        if ($sql ->rowCount() > 0){
            $dado = $sql -> fetch();
            $_SESSION ['id'] = $dado['id'];

            header ("Location: index.php");
        }

    } catch (PDOException $e) {
        echo "Falhou a conexão: ".$e->getMessage();   
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="fundo">
       <div class="form-container">
            <div class="form-background"></div>
            <form method="POST">
                <input type="email" name="email" id="email" placeholder="E-mail">
                <input type="password" name="senha" id="senha" placeholder="Senha">
                <input type="submit" class="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>

</html>