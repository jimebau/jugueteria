<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("conexion.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM sucursales WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Pagina Principal</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar nuevo dato</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	<h1>Tabla Sucursales</h1>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Id_surcursal</td>
			<td>Direccion</td>
			<td>Num_departamentos</td>
			<td>Num_de_empleados</td>
			<td>Tel_de_sucu</td>
			<td>Id_Empleado</td>
			<td>Num_gerente</td>
			<td>Actualizar</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['Id_surcursal']."</td>";
			echo "<td>".$res['Direccion']."</td>";
			echo "<td>".$res['Num_departamentos']."</td>";	
			echo "<td>".$res['Num_de_empleados']."</td>";
			echo "<td>".$res['Tel_de_sucu']."</td>";
			echo "<td>".$res['Id_Empleado']."</td>";
			echo "<td>".$res['Num_gerente']."</td>";
			echo "<td><a href=\"editar.php?id=$res[id]\">Editar</a> | <a href=\"borrar.php?id=$res[id]\" onClick=\"return confirm('Seguro que quiere borrar el registro?')\">Borrar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
