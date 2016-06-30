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
		include("../../datos/GestionEmpleado.php");
		$gesEmpleado = new GestionEmpleado();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../recursos/css/estilo.css">
	<title>El buscando el chido de museos</title>
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
			<H2>EMPLEADOS</H2>

			<br/>
			<table class="tablaAdmG">
				<tr>
					<th colspan="6" id="estAgre">
						<a href="../../control/CtrlEmpleado.php?accion=a">
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

				<!--consulta -->
				<?php 
					$list = $gesEmpleado->listar();
					while ($datos = mysqli_fetch_array($list)) {
						 ?>
						<tr>
							<td><?php echo $datos[0]; ?></td>
							<td><?php echo $datos[1]; ?></td>
							<td><?php echo $datos[2]; ?> </td>
							
							<td class="btnAccion">
								<a href="../../control/CtrlEmpleado.php?accion=b&id=<?php echo $datos[5] ?>">
									<img class="icono" src="../../recursos/imagenes/eliminar.png" alt="eliminar">
								</a>
							
							</td>
							
							<td class="btnAccion">
								<a href="../../control/CtrlEmpleado.php?accion=m&id=<?php echo $datos[5] ?>">
									<img class="icono" src="../../recursos/imagenes/editar.png" alt="modificar">
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