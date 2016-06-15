
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
?>
<!DOCTYPE html>
<html>
<head>
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
					<a href="../index.html">Cerrar Session</a>
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
								<table class="tabla" >
									<h4>Datos generales</h4>
									<tr>
										<td>
											<input type='file' name='img' id='img' />
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' placeholder='Nombre..'/>
										</td>
									</tr>
									<tr>
										<td>
											<input type='text' name='desc' id='desc' placeholder='Descripcion..'/>
										</td>
									</tr>
									<tr>
										<td>
											<select name='delegaciones' id='delegaciones' />
												<option value="1">mexico</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<input type='number' name='precio' id='precio' placeholder='Precio..' />
										</td>
									</tr>

									<tr>
										<td>
											<input type='submit' value='Dar de alta' />
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
						echo 'BAJAS';
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