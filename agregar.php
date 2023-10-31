<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: acceso.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
//including the database connection file
include_once("conexion.php");

if(isset($_POST['Submit'])) {	
	$cita = $_POST['cita'];
	$tipo = $_POST['tipo_de_corte'];
	$tipoli = $_POST['tipo_de_limpieza'];
	$hora_de_llegada = $_POST['hora_de_llegada'];
	$hora_de_salida = $_POST['hora_de_salida'];
	$accesorio = $_POST['accesorio'];
	$tipo_de_locion = $_POST['tipo_de_locion'];
	$precio_total = $_POST['precio_total'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($cita) || empty($tipo) || empty($tipoli) || empty($hora_de_llegada) || empty($hora_de_salida) || empty($accesorio) || empty($tipo_de_locion) || empty($precio_total)) {
			
		if(empty($cita)) {
			echo "<font color='red'>completa el campo cita.</font><br/>";
		}
		
		if(empty($tipo)) {
			echo "<font color='red'>completa el campo tipo_de_corte.</font><br/>";
		}
		
		if(empty($tipoli)) {
			echo "<font color='red'>completa el campo tipo_de_limpieza.</font><br/>";
		}

		if(empty($hora_de_llegada)) {
			echo "<font color='red'>completa el campo hora_de_llegada.</font><br/>";
		}
		if(empty($hora_de_salida)) {
			echo "<font color='red'>completa el campo hora_de_salida.</font><br/>";
		}
		if(empty($accesorio)) {
			echo "<font color='red'>completa el campo accesorio.</font><br/>";
		}
		if(empty($tipo_de_locion)) {
			echo "<font color='red'>completa el campo tipo_de_locion.</font><br/>";
		}
		if(empty($precio_total)) {
			echo "<font color='red'>completa el campo precio_total.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO servicio(cita, tipo_de_corte, tipo_de_limpieza, hora_de_llegada, hora_de_salida, accesorio, tipo_de_locion, precio_total, login_id) VALUES('$cita','$tipo','$tipoli','$hora_de_llegada','$hora_de_salida','$accesorio','$tipo_de_locion','$precio_total','$loginId')");
		
		//display success message
		echo "<font color='green'>Datos agregados correctamente.";
		echo "<br/><a href='vista.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>
