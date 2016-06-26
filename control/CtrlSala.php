
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
		include("../datos/Sala.php");
		$sala = new Sala();
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
							<form action="CtrlSala.php">
								<table class="tablafrm" >
									<tr>
										<th>
											Registrar sala
										</th>
									</tr>
									<tr>
										<td>
											<select name='id_mus' id='id_mus' />
											<option value='0'>Seleccione un museo..</option>
												<?php
													$list = $sala->listarMuseos();
												    while ($dato = mysqli_fetch_array($list)) {
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
											<input type='text' name='nombre_sala' id='nombre_sala' placeholder=' Nombre de la sala..' required autofocus/>
										</td>
									</tr>
									<tr>
										<td>
											<textarea rows="6" placeholder='Descripcion sala' cols="50" name='desc_sala' id='desc_sala' required></textarea>
										</td>
									</tr>

									<tr>
										<td>
											<input type='submit' name="regSala" value='Dar de alta'/>
										</td>
									</tr>
								</table>
							</form>
						<?php
						break;
					case 'b':
						if($sala->eliminar($_REQUEST['id'])){ 
							?><script> 
							window.location="../vista/administrador/gestionarSalas.php"; 	
							</script><?php
						}
						break;
					case 'm':
						$reg = mysqli_fetch_array($sala->getSala($_REQUEST['id']));
						
						?>

						<form action="CtrlSala.php">
							<input type="hidden" name="id" id="id" value='<?php echo $_REQUEST['id'] ?>'/>
								<table class="tablafrm" >
									<tr>
										<th>
											Modificar sala
										</th>
									</tr>
									<tr>
										<td>
											<label>Archivo actual: <?php echo $reg[0]; ?></label>
											<input type='text' name='nombre_sala' id='nombre_sala' placeholder='<?php echo $reg[1]; ?>' autofocus/>
										</td>
									</tr>
										<tr>
										<td>
											<textarea rows="6" placeholder='Descripcion sala' cols="50" name='desc_sala' id='desc_sala'></textarea>
										</td>
									</tr>
									<tr>
										<td>
											<select name='id_mus' id='id_mus' />
											<option value='<?php echo $reg[3]; ?>'>
												<?php echo $reg[3]; ?>
											</option>
												<?php
													$list = $sala->listarMuseos();
													while ($dato = mysqli_fetch_array($list)) {
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
											<input type='submit' name="modSala" value='Modificar'/>
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
							window.location="../vista/administrador/gestionarSalas.php";
						</script>
						<?php
						break;
				}
			}else if(isset($_REQUEST['regSala'])){
				
				$status = $sala->agregar(
					$_REQUEST['id_mus'],
					$_REQUEST['nombre_sala'],
					$_REQUEST['desc_sala']
					
					);

				if($status){
					?><script> window.location="../vista/administrador/gestionarSalas.php"; </script><?php
				}else{
					?><script> window.location="CtrlSala.php?accion=a"; </script><?php
				}
			}else if(isset($_REQUEST['modSala'])){
				$estado = $sala->actualizar(
					$_REQUEST['id'],
					$_REQUEST['id_mus'],
					$_REQUEST['nombre_sala'],
					$_REQUEST['desc_sala']
					);
				if($estado){
					?><script> 
					alert("Se a actualizado la informacion");
					window.location="../vista/administrador/gestionarSalas.php"; </script><?php
				}else{
					?><script> 
					alert("No se pudo actualizar la informacion");
					window.location="../vista/administrador/gestionarSalas.php"; </script><?php
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