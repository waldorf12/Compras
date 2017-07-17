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
                    <form method="post" action="agregarArea-set.php">
                      <div class="row uniform">
                        <div class="12u 12u$(xsmall)">
                          <input type="text" name="NombreArea" id="Nombre" value="" placeholder="Nombre"  required/>
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
