
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

  <style media="screen">
  input[placeholder] {
    color: #2980b9;
  }
  input::-webkit-input-placeholder {
  color: #e74c3c;
}
input:-moz-placeholder {
  color: #e74c3c;
}
input:-ms-input-placeholder {
  color: #e74c3c;
}

  </style>
 	</head>
 	<body>

    <script type="text/javascript">
    function refrescar()
 {
     location.reload(true);
 }
    </script>
 		<!-- Wrapper -->
 			<div id="wrapper">

 				<!-- Header -->
 					<header id="header" class="alt">
 						<span class="logo"><img src="images/logo.svg"   alt="" /></span>
 						<h1>Facultad de Ingeniería</h1>
            <h2>Departamento de Adquisiciones</h2>
            <p>Favor de revisar el estatus de sus requisiciones.</p>

 					</header>

 				<!-- Nav -->
 					<nav id="nav">
 						<ul>
              <li><a href="index.php">Inicio</a></li>
 							<li><a href="entrar.html" class="active">Entrar</a></li>

 							<!-- <li><a href="#second">Second Section</a></li>
 							<li><a href="#cta">Get Started</a></li> -->
 						</ul>
 					</nav>

 				<!-- Main -->
 					<div id="main">



<!-- Table seccion  -->
              <section id="cta" class="main special">
                <header class="major">
                  <h2>Estatus de Requisiciones</h2>
                  <p>
                        Busqueda de Requisiciones

                        <form method="post" action="busquedaRequi.php" id="FormBuscar">
                        <div class="row uniform">
                          <div class="10u 12u$(xsmall)">
                            <input type="text" name="requi" id="requi" value="" placeholder="Requi"  />
                          </div>
                          <div class="2u$ 12u$(xsmall)">
                            <input type="submit" name="" value="Buscar Por No.Requi">
                          </div>
                        </div>

                      </form>

                      <form method="post" action="busquedaFecha.php" id="FormBuscar">
                      <div class="row uniform">
                        <div class="10u 12u$(xsmall)">
                          <input type="text" name="Fecha" id="datepicker" value="" placeholder="Fecha"  readonly="true" />
                        </div>
                        <div class="2u$ 12u$(xsmall)">
                          <input type="submit" name="" value="Buscar Por Fecha">
                        </div>
                      </div>

                    </form>

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



                          if ($row["Estatus"] == 'Cancelada' || $row["Estatus"] == 'No Recibida' )
                           {
                             echo '
                             <tr>
                               <th scope="row">'.$row["Folio"].'</th>
                               <td>'.  $row["Fecha"] .'</td>
                               <td>'.  $row["Area"].'</td>
                               <td style="color:red; font-weight: bold;">'.$row["Estatus"].'</td>
                             </tr>';
                          }
                          else {
                            echo '
                            <tr>
                              <th scope="row">'.$row["Folio"].'</th>
                              <td>'.  $row["Fecha"] .'</td>
                              <td>'.  $row["Area"].'</td>
                              <td>'.  $row["Estatus"].'</td>
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
