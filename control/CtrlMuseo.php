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
		include("../datos/Museo.php");
		$mus = new Museo();
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
							<form action="CtrlMuseo.php">
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
													$list = $mus->listarDelegaciones();
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
						if($mus->eliminar($_REQUEST['id'])){ 
							?><script> 
							window.location="../vista/administrador/gestionarMuseos.php"; 	
							</script><?php
						}
						break;
					case 'm':
						$reg = mysqli_fetch_array($mus->getMuseo($_REQUEST['id']));
						
						?>

						<form action="CtrlMuseo.php" enctype="multipart/form-data">
								<input type="hidden" name="id" id="id" value='<?php echo $_REQUEST['id'] ?>'/>
								<table class="tablafrm" >
									<tr>
										<th>
											<h2>Modificar museo</h2>
											<h6><?php echo $reg[1]; ?></h6>
										</th>
									</tr>
									<tr>
										<td>
											
											<img  class = "imgMus-100" src="../recursos/imagenes/museos/<?php echo $reg[1]  . "/" . $reg[0]; ?>" alt = "Museo"/>
											<label>Archivo actual: <?php echo $reg[0]; ?></label>
										</td>
									</tr>
									<tr>
										<td>
											
											<input type='file' name='img' id='img' accept='image/*'/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='nombre' id='nombre' placeholder='NOMBRE: <?php echo $reg[1]; ?>' autofocus/>
										</td>
									</tr>
									<tr>
										<td>
											<textarea rows="10" placeholder='CUERPO DE LA PAGINA: <?php echo $reg[6]; ?>' cols="50" name='desc' id='desc'></textarea>
										</td>
									</tr>
									<tr>
										<td>
											<select name='delegaciones' id='delegaciones' />
											<option value='<?php echo $reg[2]; ?>'>
												<?php echo $reg[3]; ?>
											</option>
												<?php
													$list = $mus->listarDelegaciones();
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
											<input type='text' name='dir' id='dir' placeholder='DIRECCION : <?php echo $reg[4]; ?>'/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='number' name='precio' id='precio' placeholder='PRECIO : $<?php echo $reg[5]; ?>' />
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
						?>
						<script>
							alert("No se reconoce esa accion");
							window.location="../vista/administrador/gestionarMuseos.php";
						</script>
						<?php
						break;
				}
			}else if(isset($_REQUEST['regMuseo'])){
				
				$status = $mus->agregar(
					$_REQUEST['img'],
					$_REQUEST['nombre'],
					$_REQUEST['desc'],
					$_REQUEST['delegaciones'],
					$_REQUEST['dir'],
					$_REQUEST['precio']
					);

				if($status){
					?><script> window.location="../vista/administrador/gestionarMuseos.php"; </script><?php
				}else{
					?><script> window.location="CtrlMuseo.php?accion=a"; </script><?php
				}
			}else if(isset($_REQUEST['modMuseo'])){
				$estado = $mus->actualizar(
					$_REQUEST['id'],
					$_REQUEST['img'],
					$_REQUEST['nombre'],
					$_REQUEST['desc'],
					$_REQUEST['delegaciones'],
					$_REQUEST['dir'],
					$_REQUEST['precio']
					);
				if($estado){
					?><script> 
					/*alert("Se a actualizado la informacion");*/
					window.location="../vista/administrador/gestionarMuseos.php"; </script><?php
				}else{
					?><script> 
					alert("No se pudo actualizar la informacion");
					window.location="../vista/administrador/gestionarMuseos.php"; </script><?php
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