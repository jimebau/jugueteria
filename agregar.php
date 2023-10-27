<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
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
	$Id_surcursal = $_POST['Id_surcursal'];
	$Direccion = $_POST['Direccion'];
	$Num_departamentos = $_POST['Num_departamentos'];
	$Num_de_empleados = $_POST['Num_de_empleados'];
	$Tel_de_sucu = $_POST['Tel_de_sucu'];
	$Id_Empleado = $_POST['Id_Empleado'];
	$Num_gerente = $_POST['Num_gerente'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($Id_surcursal) || empty($Direccion) || empty($Num_departamentos) || empty($Num_de_empleados) || empty($Tel_de_sucu) || empty($Id_Empleado) || empty($Num_gerente)) {
				
		if(empty($Id_surcursal)) {
			echo "<font color='red'>completa el campo Id_surcursal.</font><br/>";
		}
		
		if(empty($Direccion)) {
			echo "<font color='red'>completa el campo Direccion.</font><br/>";
		}
		
		if(empty($Num_departamentos)) {
			echo "<font color='red'>completa el campo Num_departamentos.</font><br/>";
		}

		if(empty($Num_de_empleados)) {
			echo "<font color='red'>completa el campo Num_de_empleados.</font><br/>";
		}
		if(empty($Tel_de_sucu)) {
			echo "<font color='red'>completa el campo Tel_de_sucu.</font><br/>";
		}
		if(empty($Id_Empleado)) {
			echo "<font color='red'>completa el campo Id_Empleado.</font><br/>";
		}
		if(empty($Num_gerente)) {
			echo "<font color='red'>completa el campo Num_gerente.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO sucursales(Id_surcursal, Direccion, Num_departamentos, Num_de_empleados, Tel_de_sucu, Id_Empleado, Num_gerente, login_id) VALUES('$Id_surcursal','$Direccion','$Num_departamentos','$Num_de_empleados','$Tel_de_sucu','$Id_Empleado','$Num_gerente','$loginId')");
		
		//display success message
		echo "<font color='green'>Datos correctamente.";
		echo "<br/><a href='ver.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>
