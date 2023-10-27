<?php session_start(); ?>
<html>
<head>
	<title>Pagina Principal</title>
	<link href="estilo.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenid@ a mi negocio Jugueteria<br>
		Jimena Muñoz Bautista
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenido <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>cerrar sesion</a><br/>
		<br/>
		<a href='ver.php'>Ver y editar productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar dado de alta para acceder a la pagina.<br/><br/>";
		echo "<a href='login.php'>Iniciar sesion</a> | <a href='registro.php'>Registrar</a>";
	}
	?>
	<div id="footer">
		Creado por <a href="https://jimebau.github.io/jugueteriaJmBau/webmaster.html" title="Mukesh Chapagain">Jimena Muñoz Bautista</a>
	</div>
</body>
</html>
