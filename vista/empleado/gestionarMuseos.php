<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="../../favicon.png" />
	<link rel="stylesheet" type="text/css" href="../../recursos/css/estilo.css">
	<title>El buscando el chido de museos</title>
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
				<li>
					<a href="gestionarMuseos.php">Gestionar Museos</a>
				</li>
				<li><a href="estadistica.php">Estadisticas</a></li>
				<li>
					<a href="../../index.php">Cerrar Session</a>
				</li>
			</ul>
		</aside>
		<section id="principal">
			<H2>Museos</H2>

			<br/>
			<table class="tabla">
				<th>Nombre de los Museos</th><th>Descripcion</th><th>Delegacion</th>
				<tr><th>Museo de la luz</th><th></th><th></th><th><img class="icono"src="../../recursos/imagenes/eliminar.png"></th><th><img class="icono"src="../../recursos/imagenes/editar.png"</th><th><form action="salas.html"><input type="submit" value="salas">
               </form></th></tr>
				<td><a href="Museos/agregar.php"><img class="icono"src="../../recursos/imagenes/agregar.png"> </a></td>

			</table>



		</section>


	</div>

		<footer id="pie">
		<i>Derechos Reservados©2016 EagleCode</i>
	</footer>
	</body>
</html>
