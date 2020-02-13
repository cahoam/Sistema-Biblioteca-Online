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

   <?php
    session_start();
    ?>


   <title>Biblio.tk</title>
   
   <script type="text/javascript">
function copiarTexto() {
    var textoCopiado = document.getElementById("link");
    textoCopiado.select();
    document.execCommand("Copy");
    alert("Texto Copiado: " + textoCopiado.value);
}

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); 
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    
    return v;
}
function id( el ){
  return document.getElementById( el );
}
window.onload = function(){
  id('telefone').onkeypress = function(){
    mascara( this, mtel );
  }
}
</script>
   
  </head>
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
      <li class="nav-item active">
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


<selection class="site-header">

  <div class="container container-bg borda col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div class="row">


      <div class="col-sm">
        <div class="container">
          <form action="actionCadastro.php" method="POST">
            <center><img src="imgs/logobiblio.png" class="row justify-content-center" width="100" height="100"></center>
            <div class="form-row">
              <div class="col fontColorWhite">
                <label for="exampleFormControlInput1 text-info">NOME</label>
                <input type="text" name="nomeInput" required="required" pattern="[a-zA-Zá-ýÁ-Ýã-õÃ-Õ\s]+$" maxlength="12" class="form-control" id="exampleFormControlInput1" placeholder="João">

              </div>
              <div class="col fontColorWhite">
                <label for="exampleFormControlInput1">SOBRENOME</label>
                <input type="text" name="sobrenomeInput" required="required" pattern="[a-zA-Z\s]+$" maxlength="18" class="form-control" id="exampleFormControlInput1" placeholder="Marcelino">
              </div>
            </div>
            <div class="form-group fontColorWhite">
              <label for="inputAddress">ENDEREÇO</label>
              <input type="text" name="enderecoInput" required="required" class="form-control" maxlength="50" id="inputAddress" placeholder="Avenida J.K, nº 0">
            </div>
            <div class="form-group fontColorWhite">
              <label for="inputAddress">TELEFONE</label>
              <input type="text" name="telefoneInput" required="required" class="form-control" id="telefone" placeholder="(63) 9 8401-0238" size="15" maxlength="15">
            </div>
            <center><button type="submit" class="btn btn-success">CADASTRAR</button></center>
            <label for="exampleFormControlInput1 text-white"></label>
            
            <?php
              error_reporting(0);
              if($_SESSION['statusCadastro'] == "true"){
                echo '';
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Cadastro Realizado!</strong> 
                    Este é seu numero de usuário: <strong>'.$_SESSION["codigoUsuario"].'</strong> <br>Guarde-o para realizar emprestimos!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                $_SESSION['statusCadastro'] = "false";
              }else{
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
  </body>
</html>