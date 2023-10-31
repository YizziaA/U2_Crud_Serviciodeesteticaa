<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: acceso.php');
}
?>

<?php
//including the database connection file
include_once("conexion.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM servicio WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar nuevo dato</a> | <a href="cerrarsesion.php">cerrar sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Cita</td>
			<td>Tipo de corte</td>
			<td>Tipo de limpieza</td>
			<td>Hora de llegada</td>
			<td>Hora de salida</td>
			<td>Accesorio</td>
			<td>Tipo de locion</td>
			<td>Precio total</td>
			<td>Actualizar</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['cita']."</td>";
			echo "<td>".$res['tipo_de_corte']."</td>";
			echo "<td>".$res['tipo_de_limpieza']."</td>";	
			echo "<td>".$res['hora_de_llegada']."</td>";
			echo "<td>".$res['hora_de_salida']."</td>";
			echo "<td>".$res['accesorio']."</td>";
			echo "<td>".$res['tipo_de_locion']."</td>";
			echo "<td>".$res['precio_total']."</td>";
			echo "<td><a href=\"editar.php?id=$res[id]\">Editar</a> | <a href=\"eliminar.php?id=$res[id]\" onClick=\"return confirm('Seguro que quiere borrar el registro?')\">Borrar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
