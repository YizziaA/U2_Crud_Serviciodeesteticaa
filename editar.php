<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: acceso.php');
}
?>

<?php
// including the database connection file
include_once("conexion.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$cita = $_POST['cita'];
	$tipo = $_POST['tipo_de_corte'];
	$tipoli = $_POST['tipo_de_limpieza'];
	$hora_de_llegada = $_POST['hora_de_llegada'];
	$hora_de_salida = $_POST['hora_de_salida'];
	$accesorio = $_POST['accesorio'];
	$tipo_de_locion = $_POST['tipo_de_locion'];
	$precio_total = $_POST['precio_total'];
	
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
		//updating the table
	    $result = mysqli_query($mysqli, "UPDATE servicio SET cita='$cita', tipo_de_corte='$tipo', tipo_de_limpieza='$tipoli', hora_de_llegada='$hora_de_llegada', hora_de_salida='$hora_de_salida', accesorio='$accesorio', tipo_de_locion='$tipo_de_locion', precio_total='$precio_total' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is vista.php
		header("Location: vista.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM servicio WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$cita = $res['cita'];
	$tipo = $res['tipo_de_corte'];
	$tipoli = $res['tipo_de_limpieza'];
	$hora_de_llegada = $res['hora_de_llegada'];
	$hora_de_salida = $res['hora_de_salida'];
	$accesorio = $res['accesorio'];
	$tipo_de_locion = $res['tipo_de_locion'];
	$precio_total = $res['precio_total'];

}
?>
<html>
<head>	
	<title>Editar datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="vista.php">Ver productos</a> | <a href="cerrarsesion.php">cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>Cita</td>
				<td><input type="text" name="cita" value="<?php echo $cita;?>"></td>
			</tr>
			<tr> 
				<td>Tipo de corte</td>
				<td><input type="text" name="tipo_de_corte" value="<?php echo $tipo;?>"></td>
			</tr>
			<tr> 
				<td>Tipo de limpieza</td>
				<td><input type="text" name="tipo_de_limpieza" value="<?php echo $tipoli;?>"></td>
			</tr>
			<tr> 
				<td>Hora de llegada</td>
				<td><input type="text" name="hora_de_llegada" value="<?php echo $hora_de_llegada;?>"></td>
			</tr>
			<tr> 
				<td>Hora de salida</td>
				<td><input type="text" name="hora_de_salida" value="<?php echo $hora_de_salida;?>"></td>
			</tr>
			<tr> 
				<td>accesorio</td>
				<td><input type="text" name="accesorio" value="<?php echo $accesorio;?>"></td>
			</tr>
			<tr> 
				<td>Tipo de locion</td>
				<td><input type="text" name="tipo_de_locion" value="<?php echo $tipo_de_locion;?>"></td>
			</tr>
			<tr> 
				<td>Prescio total</td>
				<td><input type="text" name="precio_total" value="<?php echo $precio_total;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Editar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
