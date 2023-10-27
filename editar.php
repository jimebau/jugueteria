<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("conexion.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$Id_surcursal = $_POST['Id_surcursal'];
	$Direccion = $_POST['Direccion'];
	$Num_departamentos = $_POST['Num_departamentos'];	
	$Num_de_empleados = $_POST['Num_de_empleados'];
	$Tel_de_sucu = $_POST['Tel_de_sucu'];
	$Id_Empleado = $_POST['Id_Empleado'];
	$Num_gerente = $_POST['Num_gerente'];
	
	// checking empty fields
	if(empty($Id_surcursal) || empty($Direccion) || empty($Num_departamentos) || empty($Num_de_empleados) || empty($Tel_de_sucu) || empty($Id_Empleado) || empty($Num_gerente)) {
				
		if(empty($Id_surcursal)) {
			echo "<font color='red'>llena el campo Id_surcursal.</font><br/>";
		}
		
		if(empty($Direccion)) {
			echo "<font color='red'>llena el campo Direccion.</font><br/>";
		}
		
		if(empty($Num_departamentosbado)) {
			echo "<font color='red'>llena el campo Num_departamentos.</font><br/>";
		}	

		if(empty($Num_de_empleados)) {
			echo "<font color='red'>llena el campo Num_de_empleados.</font><br/>";
		}	

		if(empty($Tel_de_sucu)) {
			echo "<font color='red'>llena el campo Tel_de_sucu.</font><br/>";
		}	

		if(empty($Id_Empleado)) {
			echo "<font color='red'>llena el campo Id_Empleado.</font><br/>";
		}	

		if(empty($Num_gerente)) {
			echo "<font color='red'>llena el campo Num_gerente.</font><br/>";
		}	
	} else {	
		//updating the table
	    $result = mysqli_query($mysqli, "UPDATE sucursales SET Id_surcursal='$Id_surcursal', Direccion='$Direccion', Num_departamentos='$Num_departamentos', Num_de_empleados='$Num_de_empleados', Tel_de_sucu='$Tel_de_sucu', Id_Empleado='$Id_Empleado', Num_gerente='$Num_gerente' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: ver.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM sucursales WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$Id_surcursal = $res['Id_surcursal'];
	$Direccion = $res['Direccion'];
	$Num_departamentos = $res['Num_departamentos'];
	$Num_de_empleados = $res['Num_de_empleados'];
	$Tel_de_sucu = $res['Tel_de_sucu'];
	$Id_Empleado = $res['Id_Empleado'];
	$Num_gerente = $res['Num_gerente'];
}
?>
<html>
<head>	
	<title></title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver productos</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>Id_surcursal</td>
				<td><input type="text" name="Id_surcursal" value="<?php echo $Id_surcursal;?>"></td>
			</tr>
			<tr> 
				<td>Direccion</td>
				<td><input type="text" name="Direccion" value="<?php echo $Direccion;?>"></td>
			</tr>
			<tr> 
				<td>Num_departamentos</td>
				<td><input type="text" name="Num_departamentos" value="<?php echo $Num_departamentos;?>"></td>
			</tr>
			<tr> 
				<td>Num_de_empleados</td>
				<td><input type="text" name="Num_de_empleados" value="<?php echo $Num_de_empleados;?>"></td>
			</tr>
			<tr> 
				<td>Tel_de_sucu</td>
				<td><input type="text" name="Tel_de_sucu" value="<?php echo $Tel_de_sucu;?>"></td>
			</tr>
			<tr> 
				<td>Id_Empleado</td>
				<td><input type="text" name="Id_Empleado" value="<?php echo $Id_Empleado;?>"></td>
			</tr>
			<tr> 
				<td>Num_gerente</td>
				<td><input type="text" name="Num_gerente" value="<?php echo $Num_gerente;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Enviar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
