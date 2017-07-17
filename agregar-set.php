<?php

session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	} else {
	      header('Location: Error.html');

	exit;
	}
	$now = time();
  $expiracion = $_SESSION['expire'];

  // echo "$now";
  // echo "<br>";
  // echo "$expiracion";

	if($now > $_SESSION['expire']) {
	session_destroy();

     header('Location: TiempoAgotado.html');
	exit;
	}
	?>

  <!DOCTYPE HTML>

  <html>
  	<head>
  		<title>Stellar by HTML5 UP</title>
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

  				<!-- Header -->



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

  						<!-- First Section -->


  						<!-- Second Section -->


  						<!-- Get Started -->
  							<section id="cta" class="main special">

                  <section>
                    <h2>Agregar Requisicion</h2>
                    <form method="post" action="#">
                      <div class="row uniform">
                        <div class="6u 12u$(xsmall)">
                          <input type="text" name="Folio" id="Folio" value="" placeholder="Folio"  required/>
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                          <input type="text" name="Fecha" id="datepicker" value="" placeholder="Fecha" required />
                        </div>
                        <div class="6u 12u$(xsmall)">
                          <input type="text" name="Cosore" id="Cosore" value="" placeholder="Cosore"  />
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                          <input type="text" name="OrdenCompra" id="OrdenCompra" value="" placeholder="Orden de Compra"  />
                        </div>
                        <div class="12u$">
                          <div class="select-wrapper">
                            <select name="Solicitante" id="Solicitante  " required>
                              <!-- <option value="">- Category -</option>
                              <option value="1">Manufacturing</option>
                              <option value="1">Shipping</option>
                              <option value="1">Administration</option>
                              <option value="1">Human Resources</option> -->

                              <option value="0" >Seleccione Solicitante</option>

                              <?php
                                $link = @mysql_connect("localhost", "root","sr1920la")
                                    or die ("Error al conectar a la base de datos.");
                                @mysql_select_db("Compras", $link)
                                    or die ("Error al conectar a la base de datos.");

                                // $query = "SELECT Folio, Fecha, Solicitante, IdEstatus FROM Requis";
                                $query = "SELECT IdArea,Descripcion  From catcareas order by Descripcion ";

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


                              <option value="0">Estatus de Requisicion</option>

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
                          <textarea name="Observaciones" id="Observaciones" placeholder="Observaciones" rows="6"></textarea>
                        </div>
                        <div class="12u$">
                          <ul class="actions">
                            <li><input type="submit" value="Guardar" class="special" /></li>
                            <li><input type="reset" value="Reset" /></li>
                          </ul>
                        </div>
                      </div>
                    </form>
                  </section>

                  <?php

                    $Folio = $_POST["Folio"];
                    $Fecha = $_POST["Fecha"];
                    $Cosore = $_POST["Cosore"];
                    $Solicitante = $_POST["Solicitante"];
                    $Estatus = $_POST["Estatus"];
                    $Observaciones = $_POST["Observaciones"];
                    $OrdenCompra = $_POST["OrdenCompra"];
                    $nombre = $_SESSION['username'];


                    $link = @mysql_connect("localhost", "root","sr1920la")
                        or die ("Error al conectar a la base de datos.");
                    @mysql_select_db("Compras", $link)
                        or die ("Error al conectar a la base de datos.");

                    // $query = "SELECT Folio, Fecha, Solicitante, IdEstatus FROM Requis";
                    $query = 'INSERT INTO Requis( Folio, Fecha, Solicitante, IdEstatus, Cosore, OrdenCompra, UsuarioRealizo, FechaMovimiento, IdArea, Observaciones) VALUES ('.$Folio.', "'.$Fecha.'", "Solicitante", '.$Estatus.', '.$Cosore.', '.$OrdenCompra.', "'.$nombre.'", NOW(), '.$Solicitante.', "'.$Observaciones.'")';

echo $query;



                    $result = mysql_query($query);


                    mysql_close($link);



                    if ($nombre != '')

                     {
                    // echo '<p class="bg-success" >Usuario <b>'.$Nombre.' </b>con el puesto de <b>'.$Puesto.' </b>fue dado de alta Correctamente </p>' ;
                    }
                    else {
                      echo "Error al dar de alta";
                    }

                   ?>


  							</section>

  					</div>

  				<!-- Footer -->
  					<footer id="footer">


  						<p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
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


        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true,
        forceParse: false,



    });


});

  </script>
