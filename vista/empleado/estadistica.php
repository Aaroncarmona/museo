<!DOCTYPE html>
<html>
<?php
	if(!isset($_SESSION['correo'])){
?>
<head>
	<link rel="icon" type="image/png" href="../../favicon.png" />
	<link rel="stylesheet" type="text/css" href="../../recursos/css/estilo.css">
	<title>ACEM -- Evalucaciones</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="../../control/js/script.js"></script>
	<header>
		<table>
			<tr>
				<td class="henav" style="background : #2b8f79;border-radius: 0px 25px 25px 0px;"><a href="index.html"><img id="logo" src="../../recursos/imagenes/logo/logo.png"></a></td>
				<td><h1 id="tituloH1Header">ACEM</h1><h4>Aplicacion para la Consulta y Evaluacion de Museos</h4></td>
				<td class="henav">

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
					<a href="gestionarMuseos.php">Gestionar Museos </a>
				</li>
				<li><a href="estadistica.php">Estadisticas</a></li>
				<li>
					<a href="../../index.html">Cerrar Session</a>
				</li>
			</ul>
		</aside>
		<section id="principal">
			<H2>Evaluaciones</H2>
			<form action="evaluaciones.php">
			  <fieldset>
			    <legend>Filtros de busqueda</legend>
				<input type="checkbox" id="filtro" value="edad" onclick="mostrar()">Edad
				<input type="checkbox" id="filtro2" value="visitante" onclick="mostrar()">Visitante <br>Tipo de visitante
				<select name="Tvi" id="Tvi">
					<option value="1">Estudiante</option>
				</select>
			  </fieldset>
			</form>

			<div id="container"></div>
		</section>
	</div>

		<footer id="pie">
		<p><i>Derechos Reservados©2016 EagleCode</i></p>
	</footer>
	</body>
	<?php
	}else{
		echo "No tienes privilegios para ver la pagina. Inicia sesion";
	}
	?>
</html>
