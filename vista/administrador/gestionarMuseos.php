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

		include("../../datos/Museo.php");
		include("../../control/CtrlMuse.php");
		include("../../datos/Conexion.php");
		
		$museo = new Museo();
		$ctrlMuseo = new CtrlMuse();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="../../favicon.png" />
	<link rel="stylesheet" type="text/css" href="../../recursos/css/estilo.css">
	<title>ACEM -- MUSEOS</title>
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
				<li><a href="gestionarEmpleados.php">Gestionar Empleados</a></li>
				<li><a href="estadistica.php">Ver estadisticas</a></li>
				<li><a href="../../control/CtrlInicioSesion.php?sesion=close">Cerrar Session</a></li>
			</ul>
		</aside>	

		<section id="principal">
			<h1>Administracion de Museos</h1>
			<br>
			<hr>
			<?php
				if(isset($_REQUEST['accion'])){ //muestra la session correspondiente
					switch($_REQUEST['accion']){
						case 'a':
							?>
							<form name="frmAdminRegMus" action="../../control/CtrlMuse.php">
								<table class="tablafrm" >
									<tr>
										<th>
											Registrar museo
										</th>
									</tr>
									<tr>
										<td>
											<input type='file' name='img' id='img' accept='image/*' required/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='nombre' id='nombre' placeholder='Nombre..' required autofocus/>
										</td>
									</tr>
									<tr>
										<td>
											<select name='delegaciones' id='delegaciones' />
											<option value='0'>Seleccione una delegacion..</option>
												<?php
													$list = $ctrlMuseo->listarDelegaciones();
													while ($dato = mysqli_fetch_array($list)){
														echo "
															<option value='$dato[0]'>$dato[1]</option>
														";
													}
												?>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='dir' id='dir' placeholder='Direccion..' required/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='number' name='precio' id='precio' placeholder='Precio..' required/>
										</td>
									</tr>

									<tr>
										<td>
											<textarea rows="6" placeholder='Descripcion' cols="50" name='desc' id='desc' required></textarea>
										</td>
									</tr>

									<tr>
										<td>
											<input type='submit' name="regMuseo" value='Dar de alta'/>
										</td>
									</tr>
								</table>
							</form>
						<?php
						break;
						case 'b':
							$lista = $ctrlMuseo->listarMuseoId($_REQUEST['id']);
						?>
							<form name="frmAdminEliMus" action="../../control/CtrlMuse.php">
								<table class="tablafrm" >
									<tr>
										<th colspan="2">
											Se eliminara el museo <?php echo $lista[2]; ?>
										</th>
									</tr>
									<tr>
										<td colspan="2">
											<br/>
											<span class="txtBorrar">
											<img src="../../recursos/imagenes/museos/<?php echo $lista[2] ?>/<?php echo $lista[1]; ?>"/>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<br/>
											<span class="txtBorrar"><strong>Descripcion:</strong><br/><?php echo substr($lista[5], 0 , 100 ); ?> ...</span><br/><br/><br/>
										</td>
									</tr>
									<tr>
										<td>
											<input type="submit" name="bajaMuseo" value="Aceptar"/>
										</td>
										<td>
											<input type="submit" name="bajaMuseoCan" value="Cancelar"/>
										</td>
									</tr>
								</table>
								<input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>" />
							</form>
						<?php
						break;
						case 'm':

						$lista = $ctrlMuseo->listarMuseoId($_REQUEST['id']);
						
						?>

						<form name="frmAdminActMus" action="../../control/CtrlMuse.php" enctype="multipart/form-data">
								<input type="hidden" name="id" id="id" value='<?php echo $_REQUEST['id'] ?>'/>
								<table class="tablafrm" >
									<tr>
										<th>
											<h2>Modificar museo</h2>
											<h6><?php echo $lista[2]; ?></h6>
										</th>
									</tr>
									<tr>
										<td>
											

											<img  class = "imgMus-100" src="../../recursos/imagenes/museos/<?php echo $lista[2] . "/" . $lista[1]?>"/>
											<label>Archivo actual: <?php echo $lista[1]; ?></label>
										</td>
									</tr>
									<tr>
										<td>
											
											<input type='file' name='img' id='img' accept='image/*'/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='nombre' id='nombre' placeholder='NOMBRE: <?php echo $lista[2]; ?>' autofocus/>
										</td>
									</tr>
									<tr>
										<td>
											<textarea rows="10" placeholder='CUERPO DE LA PAGINA: <?php echo $lista[5]; ?>' cols="50" name='desc' id='desc'></textarea>
										</td>
									</tr>
									<tr>
										<td>
											<select name='delegaciones' id='delegaciones' />
											<option value='<?php echo $lista[6]; ?>' >
												<?php echo $lista[3]; ?>
											</option>
												<?php
													$listaDel = $ctrlMuseo->listarDelegaciones();
													while ($dato = mysqli_fetch_array($listaDel)) {
														echo "
															<option value='$dato[0]'>$dato[1]</option>
														";
													}
												?>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='dir' id='dir' placeholder='DIRECCION : <?php echo $lista[7]; ?>'/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='number' name='precio' id='precio' placeholder='PRECIO : $<?php echo $lista[4]; ?>' />
										</td>
									</tr>

									<tr>
										<td>
											<input type='submit' name="modMuseo" value='Modificar'/>
										</td>
									</tr>
								</table>
							</form>
						<?php



						break;
						default:
							?><script>
								window.location="gestionarMuseos.php";
							</script><?php
						break;
					}
				}else{//en caso que no seleccione una accion.
					?>







<table class="tablaAdmG">
	<tr>
		<th colspan="6" id="estAgre">
			<a href="gestionarMuseos.php?accion=a">
				<img class="icono" src="../../recursos/imagenes/agregar.png"> 
			</a>
		</th>
	</tr>
	<tr>
		<th>Museo</th>
		<th>Imagen</th>
		<th>Descripcion</th>
		<th>Delegacion</th>
		<th colspan="3">Accion</th>
	</tr>

	<!--consulta -->
	<?php 
		$datos = $ctrlMuseo->listarMuseo();

			foreach ($datos as $key => $value) {
			 ?>
			 
			<tr>
				<td><?php echo $datos[$key][2]; ?></td>
				<td><img  class = "imgMus" src="../../recursos/imagenes/museos/<?php echo $datos[$key][2]  . "/" . $datos[$key][1]; ?>" alt = "Museo"/></td>
				<td><?php echo substr($datos[$key][5], 0 , 100) . "....."; ?></td>
				<td><?php echo $datos[$key][3]; ?> </td>
				
				<td class="btnAccion">
					<a href="gestionarMuseos.php?accion=b&id=<?php echo $datos[$key][0]; ?>">
						<img class="icono" src="../../recursos/imagenes/eliminar.png" alt="eliminar"/>
					</a>
				
				</td>
				
				<td class="btnAccion">
					<a href="gestionarMuseos.php?accion=m&id=<?php echo $datos[$key][0]; ?>">
						<img class="icono" src="../../recursos/imagenes/editar.png" alt="modificar"/>
					</a>
				</td>

				<td class="btnAccion">
					<a href="gestionarSalas.php?id=<?php echo $datos[$key][0]; ?>">
						<img class="icono" src="../../recursos/imagenes/salas.png" alt="salas"/>
					</a>
				</td>
       		</tr>
			<!--consulta -->
			<?php
			}
			?>
		</table>









					<?php
				}
			?>

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