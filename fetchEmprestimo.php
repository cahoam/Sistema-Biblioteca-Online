<?php

include "connectDataBase.php";
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "SELECT livro.cod_livro, livro.titulo FROM livro WHERE livro.cod_livro LIKE '%".$request."%'";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["cod_livro"]." - ".$row["titulo"];
 }
 echo json_encode($data);
}

?>