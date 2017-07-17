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
  		<link rel="stylesheet" href="assets/css/main.css" />

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
  							<section id="first" class="main special">
  								<header class="major">
  									<h2>Panel de control</h2>
  								</header>
  								<ul class="features">
  									<li>
  										<span class="icon major style6 fa-plus"></span>
  										<h3>Agregar Requisicion</h3>
  										<!-- <p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p> -->
                      <a href="agregar.php" class="button">Agregar</a>
  									</li>

  									<li>
  										<span class="icon major style7 fa-pencil"></span>
  										<h3>Modificar Requisicion</h3>
  										<!-- <p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p> -->
                      <a href="modificar.php" class="button">Modificar</a>

                    </li>
  									<li>
  										<span class="icon major style8 fa-close"></span>
  										<h3>Cancelar Requisicion</h3>
  										<!-- <p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p> -->
                      <a href="cancelar.php" class="button">Cancelar</a>

                    </li>
  								</ul>
  								<footer class="major">
  									<!-- <ul class="actions">
  										<li><a href="generic.html" class="button">Learn More</a></li>
  									</ul> -->
  								</footer>
  							</section>

  						<!-- Second Section -->
  							<section id="indicadores" class="main special">
  								<header class="major">
  									<h2>Estadisticas</h2>
  									<p>En esta seccion podemos observar el numero de requisiciones capturadas</p>
  								</header>
  								<ul class="statistics">
  									<li class="style1">
  										<span class="icon fa-code-fork"></span>
  										<strong>5,120</strong> Etiam
  									</li>
  									<li class="style2">
  										<span class="icon fa-folder-open-o"></span>
  										<strong>8,192</strong> Magna
  									</li>
  									<li class="style3">
  										<span class="icon fa-signal"></span>
  										<strong>2,048</strong> Tempus
  									</li>
  									<li class="style4">
  										<span class="icon fa-laptop"></span>
  										<strong>4,096</strong> Aliquam
  									</li>
  									<li class="style5">
  										<span class="icon fa-diamond"></span>
  										<strong>1,024</strong> Nullam
  									</li>
  								</ul>
  								<!-- <p class="content">Nam elementum nisl et mi a commodo porttitor. Morbi sit amet nisl eu arcu faucibus hendrerit vel a risus. Nam a orci mi, elementum ac arcu sit amet, fermentum pellentesque et purus. Integer maximus varius lorem, sed convallis diam accumsan sed. Etiam porttitor placerat sapien, sed eleifend a enim pulvinar faucibus semper quis ut arcu. Ut non nisl a mollis est efficitur vestibulum. Integer eget purus nec nulla mattis et accumsan ut magna libero. Morbi auctor iaculis porttitor. Sed ut magna ac risus et hendrerit scelerisque. Praesent eleifend lacus in lectus aliquam porta. Cras eu ornare dui curabitur lacinia.</p> -->
  								<!-- <footer class="major">
  									<ul class="actions">
  										<li><a href="generic.html" class="button">Learn More</a></li>
  									</ul>
  								</footer> -->
  							</section>

  						<!-- Get Started -->
  							<section id="cta" class="main special">
  								<header class="major">
  									<h2>Agregar / Modificar <br> Areas</h2>
  									<p>Seccion donde es posible agregar areas que no esten en el catalogo de areas.</p>
  								</header>
  								<footer class="major">
  									<ul class="actions">
  										<li><a href="agregarAreas.php" class="button special">Agregar</a></li>
  										<li><a href="modificarUsuario.php" class="button">Modificar</a></li>
  									</ul>
  								</footer>
  							</section>

  					</div>

  				<!-- Footer -->
  					<footer id="footer">
  						<section>
                <h2>Departamento de Adquisiciones</h2>
                <p>Plataforma desarollada para dar seguimiento a los estatus de las requicisiones.</p>
                <ul class="actions">
                  <li><a href="logout.php" class="button">Salir</a></li>
                  <li><a href="index.php" class="button">Inicio</a></li>
                </ul>
  						</section>
  						<section>
  							<h2>Secretaria Administrativa</h2>
  							<dl class="alt">
  								<dt>Direccion</dt>
  								<dd>Circuito No 1   &bull;  Campus Universitario 2 </dd>
  								<dt>Telefono</dt>
  								<dd>442 95 00  &bull;  Ext. 2553  &bull;  Ext. 2590  &bull;  Ext. 2560</dd>
  								<dt>Correo</dt>
  								<dd><a href="#">fing.compras@gmail.com</a></dd>
  							</dl>
  							<ul class="icons">
  								<li><a href="#" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
  								<li><a href="#" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
  								<li><a href="#" class="icon fa-instagram alt"><span class="label">Instagram</span></a></li>
  								<li><a href="#" class="icon fa-github alt"><span class="label">GitHub</span></a></li>
  								<li><a href="#" class="icon fa-dribbble alt"><span class="label">Dribbble</span></a></li>
  							</ul>
  						</section>
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
