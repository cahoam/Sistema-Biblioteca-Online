<?php

    include "connectDataBase.php";
    session_start();

	$codigoLivroEntrada = explode(" ",$_POST["codigoLivroInput"]);
	$biblioCodeEntrada = explode(" ",$_POST["bibioCodeInput"]);
	$numeroUsuarioEntrada = $_POST["numeroUsuarioInput"];

	$sqlUsuario = "SELECT num_cartao FROM usuario WHERE num_cartao = $numeroUsuarioEntrada";
	
	if(mysqli_num_rows(mysqli_query($connect, $sqlUsuario)) > 0){
		$sqlEmprestimo = "SELECT cod_livro FROM livro_emprestimo WHERE cod_livro = $codigoLivroEntrada[0]";
        if(mysqli_num_rows(mysqli_query($connect, $sqlEmprestimo)) > 0){
            $data = date('y/m/d');
            $sql = "UPDATE livro_emprestimo SET data_devolucao = '$data' WHERE cod_livro = '$codigoLivroEntrada[0]' AND nr_cartao = $numeroUsuarioEntrada AND data_devolucao IS NULL ";
            mysqli_query($connect,$sql);
            if(mysqli_affected_rows($connect)>0){
			    $sql = "UPDATE livro_copia SET qt_copia = (qt_copia+1) WHERE cod_livro = $codigoLivroEntrada[0]";
                mysqli_query($connect,$sql);
				$_SESSION['verificaDevolucao'] = "true";
			    header("location:devolucao.php");
            }else{
				$_SESSION['verificaDevolucao'] = "error";
			    header("location:devolucao.php");
            }
        }else{
			$_SESSION['verificaDevolucaoLivro'] = "empty";
			header("location:devolucao.php");
		}
		mysqli_close($connect);	
	}else{
		$_SESSION['verificaDevolucaoUser'] = "true";
		header("location:devolucao.php");
	}
	mysqli_close($connect);	

	
?>