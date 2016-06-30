<?php 
	session_start();

	if(!isset($_SESSION['correo'])){
		?>
		<script>
			alert("Tines que iniciar sesion, para entrar a esta pagina");
			window.location="../frmInicioSesion.html";
		</script>
		<?php
	}else{
		include("../../control/CtrlEmpleado.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../recursos/css/estilo.css">
	<title>ACEM -- EMPLEADOS</title>
</head>
<body>
	<header>
		<table>
			<tr>
				<td class="henav"><a href="index.html"><img id="logo" src="../../recursos/imagenes/logo/logo.png"></a></td>
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
				<li><a href="inicioAdministrador.php">Inicio Administrador</a></li>
				<li><a href="gestionarMuseos.php">Gestionar Museos</a></li>
				<li><a href="estadistica.php">Ver estadistica</a></li>
				<li><a href="../../index.html">Cerrar Session</a></li>
			</ul>
		</aside>	
		<section id="principal">
			<h1>Administracion de Empleados</h1>
			<br><hr>
			<?php
				$control = new CtrlEmpleado();				
				if(isset($_REQUEST['accion'])){
					switch($_REQUEST['accion']){
						case 'a':
						/*include('../vista/administrador/Museos/agregar.php');*/
						?>
							<form action="../../control/CtrlEmpleado.php">
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
											<input type='text' name='ape_pat' id='ape_pat' placeholder='Apellido Paterno..' required/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='ape_mat' id='ape_mat' placeholder='Apellido Materno..' required/>
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
						
						$lista = $control->listarId($_REQUEST['id']);

						?>
							<form action="../../control/CtrlEmpleado.php">
								<table class="tablafrm" >
									<tr>
										<th colspan="2">
											Eliminar empleado
										</th>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar">Nombre: <?php echo $lista->getNombre_emp(); ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar">Apellido P: <?php echo $lista->getApellido_pat(); ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar">Apellido M: <?php echo $lista->getApellido_mat(); ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar">Telefono: <?php echo $lista->getTelefono_emp(); ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar">Correo: <?php echo $lista->getCorreo_emp(); ?></span>
										</td>
									</tr>
									<tr>
										<td>
											<input type="submit" name="bajaEmpleado" value="Aceptar"/>
										</td>
										<td>
											<input type="submit" name="bajaEmpleadoCan" value="Cancelar"/>
										</td>
									</tr>
								</table>
								<input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>" />
							</form>
						<?php
						break;
					case 'm':

						$lista = $control->listarId($_REQUEST['id']);
						
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
											<input type='text' name='nombreEmp' id='nombreEmp' placeholder='<?php echo $lista->getNombre_emp(); ?>' autofocus/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='ape_pat' id='ape_pat' placeholder='<?php echo $lista->getApellido_pat(); ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='ape_mat' id='ape_mat' placeholder='<?php echo $lista->getApellido_mat(); ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='number' name='telefono' id='telefono' placeholder='<?php echo $lista->getTelefono_emp(); ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='mail' name='correo' id='correo' placeholder='<?php echo $lista->getCorreo_emp(); ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='password' name='contrasena' id='contrasena' placeholder='La contraseña solo se cambia' autocomplete="off"/>
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
				}else{
					$emp = $control->listar();
			?>
			<table class="tablaAdmG">
				<tr>
					<th colspan="6" id="estAgre">
						<a href="gestionarEmpleados.php?accion=a">
							<img class="icono" src="../../recursos/imagenes/agregar.png"> 
						</a>
					</th>
				</tr>
				<tr>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th colspan="3">Accion</th>
				</tr>
				<?php
				foreach ($emp as $key => $value) { 
				?>
				<tr>
					<td><?php echo $emp[$key]->getNombre_emp(); ?></td>
					<td><?php echo $emp[$key]->getApellido_pat(); ?></td>
					<td><?php echo $emp[$key]->getApellido_mat(); ?></td>
					<td class="btnAccion">
						<a href="gestionarEmpleados.php?accion=b&id=<?php echo $emp[$key]->getId_emp(); ?>">
							<img class="icono" src="../../recursos/imagenes/eliminar.png" alt="eliminar">
						</a>
					</td>
					<td class="btnAccion">
						<a href="gestionarEmpleados.php?accion=m&id=<?php echo $emp[$key]->getId_emp(); ?>">
							<img class="icono" src="../../recursos/imagenes/editar.png" alt="modificar">
						</a>
					</td>
				</tr>
				<?php } ?>
			</table>
			<?php } ?>
		</section>

	
	</div>
	
		<footer id="pie">
		<i>Derechos Reservados©2016 EagleCode</i>
	</footer>
	</body>
</html>

<?php
	}
?>