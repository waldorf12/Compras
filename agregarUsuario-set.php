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

  <html lang="es">
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
                    <h2>Agregar Solicitante</h2>
                    <form method="post" action="agregarUsuario-set.php">
                      <div class="row uniform">
                        <div class="6u 12u$(xsmall)">
                          <input type="text" name="Nombre" id="Nombre" value="" placeholder="Nombre"  required/>
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                          <input type="text" name="Puesto" id="Puesto" value="" placeholder="Puesto" required />
                        </div>

                        <div class="12u$">
                          <div class="select-wrapper">
                            <select name="IdArea" id="Area" >

                              <option value="0" >Seleccione un Area</option>

                              <?php
                                $link = @mysql_connect("localhost", "root","sr1920la")
                                    or die ("Error al conectar a la base de datos.");
                                @mysql_select_db("Compras", $link)
                                    or die ("Error al conectar a la base de datos.");

                                // $query = "SELECT Folio, Fecha, Solicitante, IdEstatus FROM Requis";
                                $query = "SELECT * From CatcAreas";

                                $result = mysql_query($query);
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
                          <ul class="actions">
                            <li><input type="submit" value="Guardar" class="special" /></li>
                            <li><input type="reset" value="Reset" /></li>
                          </ul>
                        </div>
                      </div>
                    </form>
                  </section>

                <?php

                  $Nombre = $_POST["Nombre"];
                  $Puesto = $_POST["Puesto"];
                  $IdArea = $_POST["IdArea"];


                  $link = @mysql_connect("localhost", "root","sr1920la")
                      or die ("Error al conectar a la base de datos.");
                  @mysql_select_db("Compras", $link)
                      or die ("Error al conectar a la base de datos.");

                  // $query = "SELECT Folio, Fecha, Solicitante, IdEstatus FROM Requis";
                  $query = 'Insert into Solicitantes (Nombre, IdArea, Puesto)  VALUES ("'.$Nombre.'",'.$IdArea.',"'.$Puesto.'") ';





                  $result = mysql_query($query);


                  mysql_close($link);



                  if ($Nombre != '')

                   {
                  echo '<p class="bg-success" >Usuario <b>'.$Nombre.' </b>con el puesto de <b>'.$Puesto.' </b>fue dado de alta Correctamente </p>' ;
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
