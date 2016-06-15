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
											<input type='file' name='img' id='img' value='a.png'/>
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
									<tr>
										<td>
											<input type='submit' value='Cancelar' />
										</td>
									</tr>
								</form>
							</table>
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
						echo 'MODIFICAR';
						break;
					default:
						?>
						<script>
							alert("No se reconoce esa accion");
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