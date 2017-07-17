<?php

session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	} else {
	      header('Location: Error.html');

	exit;
	}
	$now = time();
  $expiracion = $_SESSION['expire'];




	if($now > $_SESSION['expire']) {
	session_destroy();

     header('Location: TiempoAgotado.html');
	exit;
	}
	?>
 <!DOCTYPE HTML>

 <html>
 	<head>
 		<title>Adquisiciones FING</title>
 		<meta charset="utf-8" />
 		<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/boostrap-piker.css">
    <link rel="stylesheet" href="assets/css/boostrap3.css">
 		<link rel="stylesheet" href="assets/css/main.css" />

    <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/boostrap-piker.js" charset="utf-8"></script>
 	</head>
 	<body>

 		<!-- Wrapper -->
 			<div id="wrapper">

				<script type="text/javascript">
		    function refrescar()
		 {
		     location.reload(true);
		 }
		    </script>

 				<!-- Nav -->
        <nav id="nav">
          <ul>
            <li><a href="index.php" class="active">Inicio</a></li>
            <li><a href="agregar.php"> <span class="icon  style6 fa-plus"> </span> Agregar Requisicion</a></li>
            <li><a href="modificar.php"><span class="icon  style7 fa-pencil"></span> Modificar Requisicion</a></li>
            <li><a href="cancelar.php"><span class="icon  style8 fa-close"></span> Cancelar Requisicion</a></li>
            <li><a href="PanelControl.php">Panel de Control  </a></li>
            <li><a href="logout.php">Cerrar Sesión ( <?php  $nombre = $_SESSION['username']; echo $nombre; ?>)</a></li>
          </ul>


        </nav>

 				<!-- Main -->
 					<div id="main">



<!-- Table seccion  -->
              <section id="cta" class="main special">
                <header class="major">
                  <h2>Modificación de Requisiciones</h2>
                  <p>


                        <form method="get" action="modificar-set.php" id="FormBuscar">
                        <div class="row uniform">
                          <div class="10u 12u$(xsmall)">
                            <input type="text" name="Folio" id="requi" value="" placeholder="Folio"  />
                          </div>
                          <div class="2u$ 12u$(xsmall)">
                            <input type="submit" name="" value="Modificar">
                          </div>
                        </div>

                      </form>



                  </p>
                </header>

                <?php
                  $link = @mysql_connect("localhost", "root","sr1920la")
                      or die ("Error al conectar a la base de datos.");
                  @mysql_select_db("Compras", $link)
                      or die ("Error al conectar a la base de datos.");

                    $FolioGet = $_GET['Folio'];


                  // $query = "SELECT Folio, Fecha, Solicitante, IdEstatus FROM Requis";
                  $query = 'SELECT *,b.Descipcion As Estatus ,c.Descripcion As Area  FROM requis a inner join CatcEstatus b on a.IdEstatus = b.IdEstatus  inner join CatcAreas c on a.IdArea = c.IdArea where Folio = '.$FolioGet.' ';


                  $result = mysql_query($query);

                  $row = mysql_fetch_array($result);

                  $FolioMod = $row["Folio"];
                  $FechaMod = $row["Fecha"];
                  $CosoreMod = $row["Cosore"];
                  $OrdenCompraMod = $row["OrdenCompra"];
                  $SolicitanteMod = $row["IdArea"];
                  $SolicitanteModDesc = $row["Area"];
                  $EstatusMod = $row["IdEstatus"];
                  $EstatusModDesc = $row["Estatus"];
                  $ObservacionesMod = $row["Observaciones"];






                  mysql_free_result($result);
                  mysql_close($link);
                ?>



                <footer class="major">
                  <form method="post" action="modificar-save.php">
                    <div class="row uniform">
                      <div class="6u 12u$(xsmall)">
                        <input type="text" name="Folio" id="Folio" value="<?php echo $FolioMod ; ?>" placeholder="Folio"  readonly="true"/>
                      </div>
                      <div class="6u$ 12u$(xsmall)">
                        <input type="text" name="Fecha" id="datepicker" value="<?php echo $FechaMod ; ?>" placeholder="Fecha" required readonly="true" />
                      </div>
                      <div class="6u 12u$(xsmall)">
                        <input type="text" name="Cosore" id="Cosore" value="<?php echo $CosoreMod ; ?>" placeholder="Cosore"  />
                      </div>
                      <div class="6u$ 12u$(xsmall)">
                        <input type="text" name="OrdenCompra" id="OrdenCompra" value="<?php echo $OrdenCompraMod ; ?>" placeholder="Orden de Compra"  />
                      </div>
                      <div class="12u$">
                        <div class="select-wrapper">
                          <select name="Area" id="Solicitante  " >
                            <!-- <option value="">- Category -</option>
                            <option value="1">Manufacturing</option>
                            <option value="1">Shipping</option>
                            <option value="1">Administration</option>
                            <option value="1">Human Resources</option> -->

                            <option value="<?php echo $SolicitanteMod ; ?>" > <?php echo $SolicitanteModDesc ; ?> </option>

                            <?php
                              $link = @mysql_connect("localhost", "root","sr1920la")
                                  or die ("Error al conectar a la base de datos.");
                              @mysql_select_db("Compras", $link)
                                  or die ("Error al conectar a la base de datos.");

                              // $query = "SELECT Folio, Fecha, Solicitante, IdEstatus FROM Requis";
                              $query = "SELECT IdArea,Descripcion  From catcareas order by Descripcion";

                              $result = mysql_query($query);
                              $numero = 0;
                              while($row = mysql_fetch_array($result))
                              {

                                  echo '<option value="'.$row["IdArea"].'">'.$row["Descripcion"].'</option>';
                              }


                              mysql_free_result($result);
                              mysql_close($link);
                            ?>


                          </select>
                        </div>
                      </div>
                      <div class="12u$">
                        <div class="select-wrapper">
                          <select name="Estatus" id="Estatus" required>


                            <option value="<?php echo $EstatusMod; ?>" > <?php echo $EstatusModDesc; ?></option>

                            <?php
                              $link = @mysql_connect("localhost", "root","sr1920la")
                                  or die ("Error al conectar a la base de datos.");
                              @mysql_select_db("Compras", $link)
                                  or die ("Error al conectar a la base de datos.");

                              // $query = "SELECT Folio, Fecha, Solicitante, IdEstatus FROM Requis";
                              $query = "SELECT * From CatcEstatus";

                              $result = mysql_query($query);
                              $numero = 0;
                              while($row = mysql_fetch_array($result))
                              {

                                  echo '<option value="'.$row["IdEstatus"].'">'.$row["Descipcion"]. '</option>';
                              }


                              mysql_free_result($result);
                              mysql_close($link);
                            ?>


                          </select>
                        </div>
                      </div>






                      <div class="12u$">
                        <textarea name="Observaciones" id="Observaciones" placeholder="Observaciones" rows="6"><?php echo $ObservacionesMod ; ?></textarea>
                      </div>
                      <div class="12u$">
                        <ul class="actions">
                          <li><input type="submit" value="Guardar" class="special" /></li>
                        </ul>
                      </div>
                    </div>
                  </form>

            </footer>
              </section>

 					</div>

 				<!-- Footer -->
 					<footer id="footer">
 						<section>
 							<h2>Departamento de Adquisiciones</h2>
 							<p>Plataforma desarollada para dar seguimiento a los estatus de las requicisiones.</p>
 							<ul class="actions">
 								<li><a href="entrar.html" class="button">Entrar</a></li>
                <li><a href="index.php" class="button">Inicio</a></li>
 							</ul>
 						</section>
 						<section>
 							<h2>Secretaría Administrativa</h2>
 							<dl class="alt">
 								<dt>Direccion </dt>
 								<dd>Circuito No 1   &bull;  Campus Universitario 2  </dd>
 								<dt>Telefono</dt>
 								<dd>442 95 00  &bull;  Ext. 2553  &bull;  Ext. 2590  &bull;  Ext. 2526</dd>
 								<dt>Email</dt>
 								<dd><a href="#">Maritza Flores - fing.compras@gmail.com</a><br> <a href="#">Rocio Ramirez - comprasingenieria@outlook.com</a><br> <a href="#">Luis R. Valdez - lrvaldez@uach.mx</a></dd>
 							</dl>
 							<ul class="icons">
 								<li><a href="#" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
 								<li><a href="#" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
 								<li><a href="#" class="icon fa-instagram alt"><span class="label">Instagram</span></a></li>
 								<li><a href="#" class="icon fa-github alt"><span class="label">GitHub</span></a></li>
 								<li><a href="#" class="icon fa-dribbble alt"><span class="label">Dribbble</span></a></li>
 							</ul>
 						</section>
 						<p class="copyright">&copy; Copyright. Design: Secretaría Administrativa - Facultad de Ingeniería </p>
 					</footer>

 			</div>

 		<!-- Scripts -->
 			<script src="assets/js/jquery.min.js"></script>
 			<script src="assets/js/jquery.scrollex.min.js"></script>
 			<script src="assets/js/jquery.scrolly.min.js"></script>
 			<script src="assets/js/skel.min.js"></script>
 			<script src="assets/js/util.js"></script>
 			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
 			<script src="assets/js/main.js"></script>

 	</body>
 </html>

 <script src="assets/js/boostrap-piker.js" charset="utf-8"></script>
 <script type="text/javascript">



 $(document).ready(function(){


   $('#datepicker').datepicker({


       format: 'yyyy/mm/dd',
       autoclose: true,
       todayHighlight: true,
       forceParse: false,



   });


});

 </script>
