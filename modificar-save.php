<?php



$FolioMod = $_POST["Folio"];
$FechaMod = $_POST["Fecha"];
$CosoreMod = $_POST["Cosore"];
$OrdenCompraMod = $_POST["OrdenCompra"];
$SolicitanteMod = $_POST["Area"];
$EstatusMod = $_POST["Estatus"];
$ObservacionesMod = $_POST["Observaciones"];

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
  $query = 'UPDATE requis SET Fecha="'.$FechaMod.'",IdEstatus='.$EstatusMod.',Cosore='.$CosoreMod.',OrdenCompra='.$OrdenCompraMod.',IdArea='.$SolicitanteMod .',Observaciones="'.$ObservacionesMod.'" WHERE Folio = '.$FolioMod.'  ';
echo $query ;
  $result = mysql_query($query);


  mysql_close($link);


  header('Location: modificar-set.php?Folio='.$FolioMod.'');
  exit;





 ?>
