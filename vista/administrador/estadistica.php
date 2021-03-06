<!DOCTYPE html>
<html>
<?php
	if(!isset($_SESSION['correo'])){
?>
<head>
	<meta charset="utf-8">
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
				<li><a href="gestionarMuseos.php">Gestionar Museos </a></li>
				<li><a href="gestionarEmpleados.php">Gestionar Empleados</a></li>
				<li><a href="../../index.php">Cerrar Session</a></li>
			</ul>
		</aside>
		<section id="principal">
			<h1>Evaluaciones</h1><br/><hr/><br/>
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
		<i>Derechos Reservados©2016 EagleCode</i>
	</footer>
	</body>
</html>

<?php
	}
?>
