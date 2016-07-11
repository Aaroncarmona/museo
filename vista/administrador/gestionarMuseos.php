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
		$museo = new Museo();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="../../favicon.png" />
	<link rel="stylesheet" type="text/css" href="../../recursos/css/estilo.css">
	<title>ACEM -- MUSEOS</title>
</head>
<body>
	<header>
		<table>
			<tr>
				<td class="henav"><a href="index.php"><img id="logo" src="../../recursos/imagenes/logo/logo.png"></a></td>
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
			<table class="tablaAdmG">
				<tr>
					<th colspan="6" id="estAgre">
						<a href="../../control/CtrlMuseo.php?accion=a">
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
					$list = $museo->listar();

						while ($datos = mysqli_fetch_array($list)) {
						 ?>
						 
						<tr>
							<td><?php echo $datos[0]; ?></td>
							<td><img  class = "imgMus" src="../../recursos/imagenes/museos/<?php echo $datos[0]  . "/" . $datos[1]; ?>" alt = "Museo"/></td>
							<td><?php echo substr($datos[2], 0 , 100) . "....."; ?></td>
							<td><?php echo $datos[3]; ?> </td>
							
							<td class="btnAccion">
								<a href="../../control/CtrlMuseo.php?accion=b&id=<?php echo $datos[4] ?>">
									<img class="icono" src="../../recursos/imagenes/eliminar.png" alt="eliminar"/>
								</a>
							
							</td>
							
							<td class="btnAccion">
								<a href="../../control/CtrlMuseo.php?accion=m&id=<?php echo $datos[4] ?>">
									<img class="icono" src="../../recursos/imagenes/editar.png" alt="modificar"/>
								</a>
							</td>

							<td class="btnAccion">
								<a href="gestionarSalas.php?id=<?php echo $datos[4] ?>">
									<img class="icono" src="../../recursos/imagenes/salas.png" alt="salas"/>
								</a>
							</td>
		           		</tr>
						<!--consulta -->
						<?php
				}

				?>
			</table>

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