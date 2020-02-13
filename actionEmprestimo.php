<?php

    include "connectDataBase.php";
    session_start();

	$codigoLivroEntrada = explode(" ",$_POST["codigoLivroInput"]);
	$biblioCodeEntrada = explode(" ",$_POST["bibioCodeInput"]);
	$numeroUsuarioEntrada = $_POST["numeroUsuarioInput"];

    $sql = "SELECT * FROM livro_emprestimo WHERE cod_livro = '$codigoLivroEntrada[0]' AND nr_cartao = '$numeroUsuarioEntrada' AND data_devolucao IS NULL";
	
	if(mysqli_num_rows(mysqli_query($connect, $sql)) > 0){
        $_SESSION['verificaEmprestimoRepitido'] = "true";
    	header("location:emprestimo.php");
	}else{
    	$sql = "SELECT num_cartao FROM usuario WHERE num_cartao = $numeroUsuarioEntrada";
    	if(mysqli_num_rows(mysqli_query($connect, $sql)) > 0){
	    	$sql = "SELECT qt_copia FROM livro_copia WHERE cod_livro = $codigoLivroEntrada[0]";
    
	    	$result = mysqli_query($connect, $sql);
		    $row = mysqli_fetch_assoc($result);

    		if($row['qt_copia'] != 0){
    			//faz aluguel
	    		$data =date('y/m/d');
		    	$sql = "INSERT INTO livro_emprestimo (cod_livro, cod_unidade, nr_cartao, data_emprestimo) VALUES ('$codigoLivroEntrada[0]','$biblioCodeEntrada[0]','$numeroUsuarioEntrada','$data')";
	    		//$sql = "UPDATE livro_copia SET qt_copia = qt_copia-1 WHERE cod_livro = $codigoLivroEntrada[0]";
		    	if(mysqli_query($connect, $sql)){
			
			    	$_SESSION['verificaEmprestimo'] = "true";
				    header("location:emprestimo.php");
    			}else{
	    			$_SESSION['verificaEmprestimo'] = "false";
		    		header("location:emprestimo.php");
		    	}
	    	}else{
	    		$_SESSION['verificaEmprestimoLivro'] = "empty";
	    		header("location:emprestimo.php");
	    	}

    		mysqli_close($connect);	
    	}else{
    		$_SESSION['verificaEmprestimoUser'] = "true";
    		header("location:emprestimo.php");
    	}
	}
	
?>