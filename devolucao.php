<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Page-Enter" content="RevealTrans(Duration=2,Transition=12)">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

   <?php
    session_start();
    ?>

   <title>Biblio.tk</title>
  </head>
  <body class="fadeIn">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="index.html">Biblio.tk</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cadastroUser.php">Cadastro de usuários</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Empréstimo de livros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="emprestimo.php">Empréstimo</a>
          <a class="dropdown-item" href="devolucao.php">Devolução</a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="estanteVirtual.php">Estante Virtual</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="relatorio.php">Relatório</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Admin</a>
      </li>
      

    </ul>
  </div>
</nav>


<selection class="background-emprestimo">

  <div class="container container-bg col-xs-3 col-sm-3 col-md-3 col-lg-3 borda">
    <div class="row">

      <div class="col-sm">
        <div class="container">
          <form action="actionDevolucao.php" method="POST">
            <center><img src="imgs/emprestimo.png" class="row justify-content-center" width="100" height="100"></center>
            <h5 class="card-title text-center text-white">Preencha corretamente os campos abaixo para devolução</h5>
            <div class="form-group fontColorWhite">
                <div class="col fontColorWhite">
                  <label for="exampleFormControlInput1 text-info">CÓDIGO DO LIVRO</label>
                  <input type="text" name="codigoLivroInput" id="codigoLivroInput" class="form-control mr-sm-2" autocomplete="off" placeholder="Use Somente Numeros"/>
                  
                </div>

                <div class="col fontColorWhite">
                  <label for="exampleFormControlSelect1 text-info">BIBLIO-CODE</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="bibioCodeInput">
                    <?php
                      //conexao ao db
                      include "connectDataBase.php";

                      //Lê a biblio cadastrada
                      $sql = "SELECT cod_unidade, nome_unidade FROM biblioteca";
                      $result = mysqli_query($connect, $sql);

                      if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<option>".$row["cod_unidade"]." - ".$row["nome_unidade"]."</option>";
                        }
                      }else{
                        echo "<option>"."NULL"."</option>";
                      }

                      mysqli_close($connect);
                    ?>
                  </select>
                </div>

                <div class="col fontColorWhite">
                  <label for="exampleFormControlInput1 text-info">NUMERO DE USUÁRIO</label>
                  <input type="text" name="numeroUsuarioInput" required="required"  class="form-control" id="inputAddress" pattern="[0-9]+$" placeholder="Use Somente Numeros">
                </div>
            </div>
            <center><button type="submit" class="btn btn-success">CONCLUIDO</button></center>
            <label for="exampleFormControlInput1 text-white"></label>
            <?php
              error_reporting(0);
              //Verifica o status de actionDevolucao.php 
              if($_SESSION['verificaDevolucaoUser'] == "true"){
                echo '';
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Usuário não encontrado!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ';
                $_SESSION['verificaDevolucaoUser'] = "false";
              }else{
                if($_SESSION['verificaDevolucao']=="true"){
                  echo '';
                  echo '
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  Devolução realizada com sucesso!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  ';
                  $_SESSION['verificaDevolucao'] = "false";
                }elseif($_SESSION['verificaDevolucao'] == "error"){
                  echo '';
                  echo '
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <center>Falha na devolução!<br>Livro não emprestado.</center>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  ';
                  $_SESSION['verificaDevolucao'] = "false";
                  
                }
                if($_SESSION['verificaDevolucaoLivro']=="empty"){
                  echo '';
                  echo '
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  Livro não alugado ou inexistente no sistema!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  ';
                  $_SESSION['verificaDevolucaoLivro'] = "false";
                }else{
                }
              }
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</selection>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  </body>
</html>


<script>
$(document).ready(function(){
 
 $('#codigoLivroInput').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"fetchEmprestimo.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>