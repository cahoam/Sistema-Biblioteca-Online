<?php

include "connectDataBase.php";
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT livro.titulo FROM livro WHERE livro.titulo LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["titulo"];
 }
 echo json_encode($data);
}

?>