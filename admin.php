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
  </head>
  <body class="FadeIn">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
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
      <li class="nav-item">
        <a class="nav-link" href="estanteVirtual.php">Estante Virtual</a>
      </li
      <li class="nav-item">
        <a class="nav-link" href="relatorio.php">Relatório</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="admin.php">Admin</a>
      </li>

    </ul>
  </div>
</nav>

<selection class="admin-header site-centraliza">

  <div class="container container-bg col-xs-3 col-sm-3 col-md-3 col-lg-3 borda">
    <div class="row">

      <div class="col-sm">
        <div class="container">
          <form action="actionAdmin.php" method="POST">

            <div class="form-group fontColorWhite">
              <label for="exampleFormControlInput1 text-white"></label>
              <h5 class="card-title text-center text-white">Administradores podem adicionar livros, realize seu login abaixo</h5>
                <div class="col fontColorWhite">
                  <label for="exampleFormControlInput1 text-info">USUÁRIO</label>
                  <input type="text" name="usuarioAdminInput" required="required" class="form-control" id="exampleFormControlInput1" placeholder="Admin">
                </div>

                <div class="col fontColorWhite">
                  <label for="exampleFormControlInput1 text-info">SENHA</label>
                  <input type="password" name="senhaInput"  class="form-control" id="inputAddress" placeholder="*********">
                </div>

            </div>
            <center><button type="submit" class="btn btn-success">LOGIN</button></center>
            <label for="exampleFormControlInput1 text-white"></label>
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
  </body>
</html>