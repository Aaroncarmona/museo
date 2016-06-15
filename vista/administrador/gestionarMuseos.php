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
				<li>
					<a href="inicioAdministrador.php">Regresar</a>
				</li>
				<li>
					<a href="gestionarMuseos.html ">Gestionar Museos</a>
				</li>
				<li><a href="gestionarEmpleados.html">Gestionar Empleados</a></li>
				<li><a href="estadistica.php">Estadisticas</a></li>
				<li>
					<a href="../../index.html">Cerrar Session</a>
				</li>
			</ul>
		</aside>	
		<section id="principal">
			<H2>Museos</H2>

			<br/>
			<table class="tabla">
				<tr>
					<th colspan="6">
						<a href="../../control/CtrlMuseo.php?accion=a">
							<img class="icono" src="../../recursos/imagenes/agregar.png"> 
						</a>
					</th>
				</tr>
				<tr>
					<th>Museo</th>
					<th>Descripcion</th>
					<th>Delegacion</th>
					<th colspan="3">Accion</th>
				</tr>
				<tr>
					<th>Museo de la luz</th>
					<th> </th>
					<th> </th>
					
					<th>
						<a href="../../control/CtrlMuseo.php?accion=b">
							<img class="icono" src="../../recursos/imagenes/eliminar.png">
						</a>
					
					</th>
					
					<th>
						<a href="../../control/CtrlMuseo.php?accion=m">
							<img class="icono" src="../../recursos/imagenes/editar.png"</th>
						</a>
					</th>
					<th>
						<a href="../../control/CtrlMuseo.php?accion=salas">
							Salas
						</a>
					</th>
           		</tr>
			</table>
		
           

		</section>

	
	</div>
	
		<footer id="pie">
		<i>Derechos Reservados©2016 EagleCode</i>
	</footer>
	</body>
</html>