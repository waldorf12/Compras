<?php
session_start();
	?>

	<?php

	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "sr1920la";
	$db_name = "Compras";
	$tbl_name = "Usuarios";
		$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
	 die("La conexion falló: " . $conexion->connect_error);
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

  echo "$username";

  if ($username == '')
  {
   header('Location: Error.html');
  }



	$sql = "SELECT * FROM $tbl_name WHERE Usuario = '$username'";

	$result = $conexion->query($sql);


	if ($result->num_rows > 0) {
	 }
	 $row = $result->fetch_array(MYSQLI_ASSOC);
	 if ( $password == $row['password'] ) {

	    $_SESSION['loggedin'] = true;
	    $_SESSION['username'] = $username;
	    $_SESSION['start'] = time();
	    $_SESSION['expire'] = $_SESSION['start'] + (15 * 60);

	    echo "Bienvenido! " . $_SESSION['username'];
	     header('Location: PanelControl.php');
	 } else {
	    header('Location: Error.html');


	 }
	 mysqli_close($conexion);
	 ?>
