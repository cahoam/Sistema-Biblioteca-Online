<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Page-Enter" content="RevealTrans(Duration=2,Transition=12)">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">




   <title>Biblio.tk</title>
  </head class="">
  <body class="FadeIn">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="index.html">Biblio.tk</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cadastroUser.php">Cadastro de usuários</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Empréstimo de livros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="emprestimo.php">Empréstimo</a>
          <a class="dropdown-item" href="devolucao.php">Devolução</a> 
      </li>
      <li class="nav-item active">
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
    <form class="form-inline" action="actionEstantePesquisa.php" method="POST">
    <input type="text" name="pesquisaTime" id="pesquisaTime" class="form-control mr-sm-2" autocomplete="off" placeholder="Titulo do Livro"/>
    <button class="btn btn-success" type="submit">Pesquisar Livro</button>
  </form>
</nav>

<selection class="site-header">
  <div class="container col-xs-5 col-sm-5 col-md-5 col-lg-5 site-centraliza"/>
    <div class="container-bg borda" style="max-height: 600px; overflow-x: auto;">
      <table class="table text-white">
        <thead>
          <tr>
            <th scope="col">Código do Livro</th>
            <th scope="col">Titulo</th>
            <th scope="col">Quantidade</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include "connectDataBase.php";
            session_start();
            error_reporting(0);
            $search = $_SESSION['pesquisaTexto'];
            
            if ($_SESSION['statusPesquisa'] == "true") {
              $sql = "SELECT livro.cod_livro, livro.titulo, livro_copia.qt_copia FROM livro INNER JOIN livro_copia ON livro.cod_livro = livro_copia.cod_livro WHERE livro.titulo LIKE '%$search%' ";

              $result = mysqli_query($connect, $sql);


              if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><td>".$row["cod_livro"]."</td><td>".$row["titulo"]."</td><td>".$row["qt_copia"]."</td></tr>";
                }
              }else{
                echo '
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Nenhum livro encontrado!</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  ';
              }
              $_SESSION['statusPesquisa'] = "false";
            }else{
              $sql = "SELECT livro.cod_livro, livro.titulo, livro_copia.qt_copia FROM livro INNER JOIN livro_copia ON livro.cod_livro = livro_copia.cod_livro";

              $result = mysqli_query($connect, $sql);


              if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><td>".$row["cod_livro"]."</td><td>".$row["titulo"]."</td><td>".$row["qt_copia"]."</td></tr>";
                }
              }else{
              echo "<tr><td>"."NULL"."</td><td>"."NULL"."</td><td>"."NULL"."</td></tr>";
              }  
            }
            mysqli_close($connect);
          ?>
        </tbody>
      </table>
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
 
 $('#pesquisaTime').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"fetchEstante.php",
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