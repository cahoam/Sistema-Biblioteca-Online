<?php
    include "connectDataBase.php";
    $sql = "SELECT * FROM livro";
    $result = mysqli_query($connect, $sql);
    $arquivo = fopen("xml/relatorioXML.xml","w");

    @fwrite($arquivo,"<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n");
    @fwrite($arquivo,"\n<livros>");
    while ($row = mysqli_fetch_array($result)) {
        $xml = "\n<livro>\n"; 
        $xml .= "<cod_livro>$row[0]</cod_livro>\n"; 
        $xml .= "<titulo>$row[1]</titulo>\n"; 
        $xml .= "</livro>\n";
        @fwrite($arquivo,$xml); 
    }
    @fwrite($arquivo,"\n\n</livros>"); 
    fclose($arquivo);
	header("location:xml/relatorioXML.xml");

?>