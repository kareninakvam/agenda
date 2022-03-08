<?php 
session_start();
require 'config/config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="fundo">

        <h1>Agenda de Contatos</h1>
            
        <button type="button" class="btn btn-dark"> <a href="cadastrar.php">Cadastrar</a></button>

    
        <div class ="container">
        <table class="table">
            <thead class="table table-striped table-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            $sql= "SELECT * FROM contatos";
            $sql= $pdo->query($sql);
            if ($sql->rowCount() > 0){
                foreach ($sql-> fetchAll() as $contato): ?>
                    <tr>
                    <td><?php echo $contato['nome']?></td>
                    <td><?php echo $contato['telefone']?></td>
                    <td><?php echo $contato['email']?></td>
                    <td><?php echo $contato['endereco']?></td>
                    <td><?php echo '<a href="editar.php?id='.$contato['id'].'">Editar</a>|<a href="excluir.php?id='.$contato['id'].'">Excluir</a>' ?><td>
                    </tr>
            <?php
            endforeach;
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</body>

</html>