<?php

    include "connectDataBase.php";
    session_start();

	if($connect){
		$pesquisa = $_POST["pesquisaTime"];

		$sql = "SELECT livro.cod_livro, livro.titulo, livro_copia.qt_copia FROM livro INNER JOIN livro_copia ON livro.cod_livro = livro_copia.cod_livro WHERE livro.titulo LIKE '%Teste%' ";



		if (mysqli_query($connect, $sql)) {
			$_SESSION['statusPesquisa'] = "true";
			$_SESSION['pesquisaTexto'] = $pesquisa;
			header("location:estanteVirtual.php");
		} else {
			$_SESSION['statusPesquisa'] = "false";
			header("location:estanteVirtual.php");
		}
	}else{
		echo "Erro de conexao ao servidor";
	}


	mysqli_close($connect);
?>