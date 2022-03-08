<?php 

require 'config/config.php';

if (isset ($_POST['nome'])&& !empty ($_POST['nome'])){
 
  $nome = addslashes($_POST['nome']);
  $email = addslashes($_POST['email']);
  $telefone = addslashes($_POST['telefone']);
  $endereco = addslashes($_POST['endereco']);


  $sql = "INSERT INTO contatos SET nome = '$nome', telefone = '$telefone', endereco = '$endereco', email = '$email'";
  $sql= $pdo->query($sql);

  header ("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<section>
    <div class="fundo">

      <div class="margem">
        <br><br><br>
        <form method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputName4">Nome</label>
              <input type="text" class="form-control" placeholder="Nome" name="nome">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control"  placeholder="Email" name="email">
            </div>
            <div class="form-group col-md-6">
              <label for="inputTel">Telefone</label>
              <input type="tel" class="form-control" placeholder="Telefone" name="telefone">
            </div>
            <div class="form-group col-md-6">
              <label for="inputAddress">Endereço</label>
              <input type="text" class="form-control"  placeholder="Rua dos Bobos, nº 0" name="endereco">
            </div>
          </div>
          <div class="form-group">
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </form>
      </div>


    </div>
  </section>
</body>
</html>