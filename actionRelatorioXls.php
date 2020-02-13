<?php
$xml= new DOMDocument;
$xml->load( "xml/relatorioXML.xml" ); // Se o XML for externo, troque "gamefc.xml" pelo link
 
if (!$xml) {
    echo "Erro ao abrir arquivo!";
    exit;
}
 
$ver = simplexml_import_dom($xml);
 
echo "<table>"; 
echo "<tr><th>Código Livro</th><th>Titulo</th></tr>";
 
foreach ($ver as $valor) {
echo "<tr>";
echo "<td>" . $valor->cod_livro. "</td>";
echo "<td>" . $valor->titulo."</td>";
echo "</tr>";
}
echo "</table>";
 
?>