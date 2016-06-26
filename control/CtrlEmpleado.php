<?php 
	session_start();
	if(!isset($_SESSION['correo'])){
		?>
		<script>
			alert("Tines que iniciar sesion, para entrar a esta pagina");
			window.location="../vista/frmInicioSesion.html";
		</script>
		<?php
	}else{
		include("../datos/GestionEmpleado.php");
		$gesEm = new GestionEmpleado();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../recursos/css/estilo.css">
	<title>El buscando el chido de museos</title>
</head>
<body>
	<header>
		<table>
			<tr>
				<td class="henav"><a href="index.html"><img id="logo" src="../recursos/imagenes/logo/logo.png"></a></td>
				<td><h1 id="tituloH1Header">ACEM</h1><h4>Aplicacion para la Consulta y Evaluacion de Museos</h4></td>
				<td class="henav2">
					
				</td>
			</tr>
			</table>
	</header>
	<nav id="navegacion">
		<br/>
		<br/>
	</nav>

	<div id="contenedorAdministrador">

		<aside>
			<ul id="menuAdmin">
				<li>
					<a href="../vista/administrador/gestionarMuseos.php">Regresar</a>
				</li>
			</ul>
		</aside>	
		<section id="principal">
		<?php

			if (isset($_REQUEST['accion'])) {
				switch ($_REQUEST['accion']) {
					case 'a':
						/*include('../vista/administrador/Museos/agregar.php');*/
						?>
							<form action="CtrlEmpleado.php">
								<table class="tablafrm" >
									<tr>
										<th>
											Registrar empleado
										</th>
									</tr>
									<tr>
										<td>
											<input type='text' name='nombreEmp' id='nombreEmp' placeholder='Nombre..' required autofocus/>
										</td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td>
											<input type='text' name='ape_pat' id='ape_pat' placeholder='Apellido Materno..' required/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='ape_mat' id='ape_mat' placeholder='Apellido Paterno..' required/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='number' name='telefono' id='telefono' placeholder='Telefono..' required/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='mail' name='correo' id='correo' placeholder='Correo..' required/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='contrasena' id='contrasena' placeholder='Contrasena..' required/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='submit' name="regEmpleado" value='Dar de alta'/>
										</td>
									</tr>
								</table>
							</form>
						<?php
						break;
					case 'b':
						if($gesEm->eliminar($_REQUEST['id'])){ 
							?><script> 
							window.location="../vista/administrador/gestionarEmpleados.php"; 	
							</script><?php
						}
						break;
					case 'm':
						$reg = mysqli_fetch_array($gesEm->getEmpleado($_REQUEST['id']));
						
						?>

						<form action="CtrlEmpleado.php">
								<input type="hidden" name="id" id="id" value='<?php echo $_REQUEST['id'] ?>'/>
								<table class="tablafrm" >
									<tr>
										<th>
											Modificar empleado
										</th>
									</tr>
									<tr>
										<td>
											<input type='text' name='nombreEmp' id='nombreEmp' placeholder='<?php echo $reg[1]; ?>' autofocus/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='ape_pat' id='ape_pat' placeholder='<?php echo $reg[2]; ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='ape_mat' id='ape_mat' placeholder='<?php echo $reg[3]; ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='number' name='telefono' id='telefono' placeholder='<?php echo $reg[4]; ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='mail' name='correo' id='correo' placeholder='<?php echo $reg[5]; ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='contrasena' id='contrasena' placeholder='<?php echo $reg[5]; ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='submit' name="modEmpleado" value='Modificar'/>
										</td>
									</tr>
								</table>
							</form>
						<?php
						break;
					default:
						?>
						<script>
							alert("No se reconoce esa accion");
							window.location="../vista/administrador/gestionarEmpleados.php";
						</script>
						<?php
						break;
				}
			}else if(isset($_REQUEST['regEmpleado'])){
				
				$status = $gesEm->agregar(
					$_REQUEST['nombreEmp'],
					$_REQUEST['ape_pat'],
					$_REQUEST['ape_mat'],
					$_REQUEST['telefono'],
					$_REQUEST['correo'],
					$_REQUEST['contrasena']
					);

				if($status){
					?><script> window.location="../vista/administrador/gestionarEmpleados.php"; </script><?php
				}else{
					?><script> window.location="CtrlEmpleado.php?accion=a"; </script><?php
				}
			}else if(isset($_REQUEST['modEmpleado'])){
				$estado = $gesEm->actualizar(
					$_REQUEST['id'],
					$_REQUEST['nombreEmp'],
					$_REQUEST['ape_pat'],
					$_REQUEST['ape_mat'],
					$_REQUEST['telefono'],
					$_REQUEST['correo'],
					$_REQUEST['contrasena']
					);
				if($estado){
					?><script> 
					alert("Se a actualizado la informacion");
					window.location="../vista/administrador/gestionarEmpleados.php"; </script><?php
				}else{
					?><script> 
					alert("No se pudo actualizar la informacion");
					window.location="../vista/administrador/gestionarEmpleados.php"; </script><?php
				}
			}
		?>
		<footer id="pie">
		<i>Derechos Reservados©2016 EagleCode</i>
	</footer>
	</body>
</html>
<?php
	}
?>
