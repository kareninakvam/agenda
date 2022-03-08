<?php 
require 'config/config.php';

$id = 0;

if (isset ($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);
}

if (isset($_POST['nome'])&& !empty($_POST ['nome'])){

    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes ($_POST['email']);
    $endereco = addslashes($_POST['endereco']);

    $sql= "UPDATE contatos SET nome = '$nome', telefone ='$telefone', email = '$email', endereco = '$endereco' WHERE id ='$id'";
    $sql = $pdo->query($sql);
    header ("Location: index.php");
}

$sql = "SELECT * FROM contatos WHERE id ='$id'";
$sql = $pdo->query($sql);

if ($sql -> rowCount () > 0){
    $dado = $sql -> fetch();
}else {
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
        <br><br>
        <h1><?php echo $dado['nome']?></h1>
        <form method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputName4">Nome</label>
              <input type="text" class="form-control" placeholder="Nome" name="nome" value= "<?php echo $dado['nome']?>">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control"  name="email" value= "<?php echo $dado['email']?>">
            </div>
            <div class="form-group col-md-6">
              <label for="inputTel">Telefone</label>
              <input type="tel" class="form-control"  name="telefone" value= "<?php echo $dado['telefone']?>">
            </div>
            <div class="form-group col-md-6">
              <label for="inputAddress">Endereço</label>
              <input type="text" class="form-control"  name="endereco" value= "<?php echo $dado['endereco']?>">
            </div>
          </div>
          <div class="form-group">
            <br>
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </div>
        </form>
      </div>


    </div>
  </section>
</body>
</html>