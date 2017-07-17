<?php



$FolioMod = $_GET["Folio"];

//
// echo " | ";
// echo $FolioMod;
// echo " | ";
// echo $FechaMod;
// echo " | ";
// echo $CosoreMod;
// echo " | ";
// echo $OrdenCompraMod;
// echo " | ";
// echo $SolicitanteMod;
// echo " | ";
// echo $EstatusMod;
// echo " | ";
// echo $ObservacionesMod;



  $link = @mysql_connect("localhost", "root","sr1920la")
      or die ("Error al conectar a la base de datos.");
  @mysql_select_db("Compras", $link)
      or die ("Error al conectar a la base de datos.");

  // $query = "SELECT Folio, Fecha, Solicitante, IdEstatus FROM Requis";
  $query = 'UPDATE requis SET IdEstatus= 4 WHERE Folio = '.$FolioMod.'  ';
echo $query ;
  $result = mysql_query($query);


  mysql_close($link);


  header('Location: cancelar.php?Folio='.$FolioMod.'');
  exit;





 ?>
