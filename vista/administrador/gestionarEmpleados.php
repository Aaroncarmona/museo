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
	<link rel="icon" type="image/png" href="../../favicon.png" />
	<link rel="stylesheet" type="text/css" href="../../recursos/css/estilo.css">
	<title>ACEM -- EMPLEADOS</title>
</head>
<body>
	<header>
		<table>
			<tr>
				<td class="henav"><a href="../../index.php"><img id="logo" src="../../recursos/imagenes/logo/logo.png"></a></td>
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
				<li><a href="../../index.php">Cerrar Session</a></li>
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
							<form name="frmAdminRegEmp" action="../../control/CtrlEmpleado.php">
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
											<input type='tel' name='telefono' id='telefono' pattern="^[1-9]{1}[0-9]*$" placeholder='Telefono..' required/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='mail' name='correo' id='correo' placeholder='Correo..' required/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='password' name='contrasena' id='contrasena' placeholder='Contrasena..' required/>
										</td>
									</tr>
                                    <tr>
                                        <td>
                                            <select name="tipoEmp" id="tipoEmp">
                                                <option value='0' >Selecciona un rol..</option>
                                            <?php
                                                $list = $control->listarTipoEmpleado();
                                                foreach ($list as $key => $value) {
                                                    echo '
                                                        <option value="'.$list[$key]->getId_temp() .'">'. $list[$key]->getTipo_emp() .'</option>
                                                    ';
                                                }

                                            ?>
                                            </section>
                                        </td>
                                    </tr>
									<tr>
										<td>
											<input type='submit' name="regEmpleado" value='Dar de alta'/>
										</td>
									</tr>
									<!--AGREGAR LA SELECCION-->
								</table>
							</form>
						<?php
						break;
					case 'b':

						$lista = $control->listarEmpleadoId($_REQUEST['id']);
						$datos = $control->mostrarTipoEmpleadoId($_REQUEST['id']);

						?>
							<form name="frmAdminEliEmp" action="../../control/CtrlEmpleado.php">
								<table class="tablafrm" >
									<tr>
										<th colspan="2">
											Eliminar empleado
										</th>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar"><strong>Nombre:</strong> <?php echo $lista->getNombre_emp(); ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar"><strong>Apellido P:</strong> <?php echo $lista->getApellido_pat(); ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar"><strong>Apellido M:</strong> <?php echo $lista->getApellido_mat(); ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar"><strong>Telefono:</strong> <?php echo $lista->getTelefono_emp(); ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar"><strong>Correo:</strong> <span class="blue"><?php echo $lista->getCorreo_emp(); ?></span></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar"><strong>Fecha Registro</strong> <?php echo $datos[1]; ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar"><strong>Rol:</strong> <?php echo $datos[0]; ?></span>
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

						$lista = $control->listarEmpleadoId($_REQUEST['id']);

						?>

						<form name="frmAdminModEmp" action="../../control/CtrlEmpleado.php">
								<input type="hidden" name="id" id="id" value='<?php echo $_REQUEST['id'] ?>'/>
								<table class="tablafrm" >
									<tr>
										<th>
											Modificar empleado
										</th>
									</tr>
									<tr>
										<td>
											<input type='text' name='nombreEmp' id='nombreEmp' placeholder='Nombre: <?php echo $lista->getNombre_emp(); ?>' autofocus/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='ape_pat' id='ape_pat' placeholder='Apellido P: <?php echo $lista->getApellido_pat(); ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='ape_mat' id='ape_mat' placeholder='Apellido M: <?php echo $lista->getApellido_mat(); ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='number' name='telefono' id='telefono' placeholder='Telefono: <?php echo $lista->getTelefono_emp(); ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='mail' name='correo' id='correo' placeholder='Correo: <?php echo $lista->getCorreo_emp(); ?>' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='password' name='contrasena' id='contrasena' placeholder='La contraseña solo se cambia'/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='submit' name="modEmpleado" value='Modificar'/>
										</td>
									</tr>
									<input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>" />
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
					$emp = $control->listarEmpleado();
			?>
			<table class="tablaAdmG">
				<tr>
					<th colspan="6" id="estAgre">
						<a name="agregarEmpleado" href="gestionarEmpleados.php?accion=a">
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
						<a name="eliminarEmpleado" href="gestionarEmpleados.php?accion=b&id=<?php echo $emp[$key]->getId_emp(); ?>">
							<img class="icono" src="../../recursos/imagenes/eliminar.png" alt="eliminar">
						</a>
					</td>
					<td class="btnAccion">
						<a name="modificarEmpleado" href="gestionarEmpleados.php?accion=m&id=<?php echo $emp[$key]->getId_emp(); ?>">
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
