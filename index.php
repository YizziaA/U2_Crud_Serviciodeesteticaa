<?php session_start(); ?>
<html>
<head>
	<title>Pagina principal</title>
	<link href="estilo.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		BIENVENIDOS A MI VETERINARIA
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenido <?php echo $_SESSION['name'] ?> ! <a href='cerrarsesion.php'>cerrar sesion</a><br/>
		<br/>
		<a href='vista.php'>Ver y editar productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar dado de alta para acceder a la pagina.<br/><br/>";
		echo "<a href='acceso.php'>Iniciar secion</a> | <a href='registro.php'>Registrar</a>";
	}
	?>
	<div id="footer">
		Creado por <a href="https://yizziaa.github.io/Veterinaria-Huellitas/" title="Mukesh Chapagain">Yizzia Amahorani Monge Mancinas</a>
	</div>
</body>
</html>
