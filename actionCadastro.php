<?php

    include "connectDataBase.php";
    session_start();
    

	$enderecoEntrada = $_POST["enderecoInput"];
	$nomeEntrada = $_POST["nomeInput"]." ".$_POST["sobrenomeInput"];
	$telefoneEntrada = $_POST["telefoneInput"];

	$sql = "INSERT INTO usuario (nome, endereco, telefone) VALUES ('$nomeEntrada', '$enderecoEntrada', '$telefoneEntrada')";	


	if (mysqli_query($connect, $sql)) {
		$id = mysqli_insert_id($connect);
		$_SESSION['codigoUsuario'] = $id;
		$_SESSION['statusCadastro'] = "true";
		header("location:cadastroUser.php");
	} else {
		$_SESSION['statusCadastro'] = "false";
		header("location:cadastroUser.php");
	}

	mysqli_close($connect);
?>