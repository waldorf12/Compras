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
                  <h2>Cancelar de Requisiciones</h2>
                  <p>
                        Nota: Cuando precione la X se cancelara automaticamente la requisicion.





                  </p>
                </header>
                <footer class="major">

                  <style media="screen">
                  table th{
                    text-align: center;
                  }

                  </style>

                  <table class="table table-striped">
                  <thead>
                    <tr>
											 <th>Accion</th>
                      <th>Folio</th>
                      <th>Fecha</th>
                      <th>Solicitante</th>
                      <th>Estatus</th>

                    </tr>
                  </thead>


                  <tbody>
                    <?php
                      $link = @mysql_connect("localhost", "root","sr1920la")
                          or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
                      @mysql_select_db("compras", $link)
                          or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");

                      // $query = "SELECT Folio, Fecha, Solicitante, IdEstatus FROM Requis";
//                       $query = "Select a.Folio, a.Fecha,  b.Descipcion as Estatus,d.Descripcion As Area
// From Requis a inner join CatcEstatus b on a.IdEstatus = b.IdEstatus
// Inner join Solicitantes c on a.IdSolicitante = c.IdSolicitante
// Inner Join CatcAreas d on c.IdArea = d.IdArea";

$query = 'SELECT a.Folio,a.Fecha,b.Descripcion As Area ,c.Descipcion As Estatus  FROM requis a INNER JOIN catcareas b on a.IdArea = b.IdArea INNER JOIN catcestatus c on a.IdEstatus = c.IdEstatus ORDER BY a.Folio ';

                      $result = mysql_query($query);
                      $numero = 0;
                      while($row = mysql_fetch_array($result))
                      {



                          if ($row["Estatus"] == 'No Recibida' )
                           {
                             echo '
                             <tr>
														 <th ><a href="cancelar-save.php?Folio='.$row["Folio"].'"><span class="btn btn-secundary"><span class="icon  style8 fa-close"></span></span></a></th>

                               <th scope="row">'.$row["Folio"].'</th>
                               <td>'.  $row["Fecha"] .'</td>
                               <td>'.  $row["Area"].'</td>
                               <td style="color:red; font-weight: bold;">'.$row["Estatus"].'</td>
                             </tr>';
                          }

                          elseif ($row["Estatus"] == 'Cancelada'  )

                          {

                            echo '
                            <tr>
                            <th ><span class="btn btn-secundary"><span class=""></span></span></th>

                              <th scope="row">'.$row["Folio"].'</th>
                              <td>'.  $row["Fecha"] .'</td>
                              <td>'.  $row["Area"].'</td>
                              <td style="color:red; font-weight: bold;" >'.  $row["Estatus"].'</td>
                            </tr>';


                          }
                          else {
                            echo '
                            <tr>
                            <th ><a href="cancelar-save.php?Folio='.$row["Folio"].'"><span class="btn btn-secundary"><span class="icon  style8 fa-close"></span></span></a></th>

                              <th scope="row">'.$row["Folio"].'</th>
                              <td>'.  $row["Fecha"] .'</td>
                              <td>'.  $row["Area"].'</td>
                              <td >'.  $row["Estatus"].'</td>
                            </tr>';
                          }


                      }


                      mysql_free_result($result);
                      mysql_close($link);
                    ?>

                  </tbody>
                </table>



                  <ul class="actions">
										<li><input type="button"class="button special" value="Refrescar" onclick="refrescar();"></li>
                    <!-- <li><a href="generic.html" class="button">Learn More</a></li> -->
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
