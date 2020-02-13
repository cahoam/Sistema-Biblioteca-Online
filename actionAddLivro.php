<?php

    include "connectDataBase.php";

	if($connect){
		$tituloLivro = $_POST["tituloLivroInput"];
		$quantCopia = $_POST["copiasInput"];


		$sql = "INSERT INTO livro (cod_livro, titulo) VALUES (NULL, '$tituloLivro')";
		if (mysqli_query($connect, $sql)) {
			$sql = "INSERT INTO livro_copia (cod_livro, qt_copia) VALUES (LAST_INSERT_ID(), $quantCopia)";
			if(mysqli_query($connect, $sql)){
				session_start();
				$_SESSION['statusAdd'] = "true";
				header("location:actionAdmin.php");
			}else{
				$_SESSION['statusAdd'] = "false";
				header("location:actionAdmin.php");
			}
		} else {
	    	echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}
	}else{
		echo "erro ao conectar";
	}

	mysqli_close($connect);
?>