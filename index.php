<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8/>
	<link rel="icon" type="image/png" href="favicon.png" />
	<link rel="stylesheet" type="text/css" href="recursos/css/estilo.css">
	<title>ACEM - INDEX	</title>
</head>
<body>
	<header>
		<table>
			<tr>
				<td class="henav"><a href="index.php"><img id="logo" src="recursos/imagenes/logo/logo.png"></a></td>
				<td><h1 id="tituloH1Header">ACEM</h1><h4>Aplicacion para la Consulta y Evaluacion de Museos</h4></td>
				<td class="henav2">

				</td>
			</tr>
		</table>
		<nav id="navegacion">
			<ul>
				<li>
					<a href="index.php">Inicio  <img class="icono"src="recursos/imagenes/home.png"></a>
				</li>

				<li>
					<p><b>/</b></p>
				</li>
				<li>
					<a href="quienes.html">Quienes somos  <img class="icono"src="recursos/imagenes/quienes.png"></a>
				</li>
				<li>
					<p><b>/</b></p>
				</li>
				<li>
					<a href="acem.html">Para que sirve ACEM  <img class="icono"src="recursos/imagenes/sirve.png"></a>
				</li>
				<li>
					<p><b>/</b></p>
				</li>
				<li>
					<a href="evaluar.html">Evaluar  <img class="icono"src="recursos/imagenes/museo.png"></a>
				</li>


			</ul>
		</nav>
	</header>

	<div id="buscadorPrincipal">
		<form id="buscar" action="#">
			<input type="text" name="busqueda" id="busqueda" placeholder="Nombre / Delegacion "/>
			<input type="submit" name="buscar" class="subBuscar" value="Buscar" />
		</form>
	</div>

	<div id="contenedor">
		<aside id="lateral">
			aqui van los filtros


	<hr/>
	</aside>

	<section id="principal">
		<h1>Museo</h1>
		<br/><hr/><br/>
		<table class="tabla">
			<tr>
				<td class="tdMuseoImg">
					<img class="museos" src="recursos/imagenes/museos/MIDE/mide.jpg">
				</td>
				<td class="tdMuseo">
					<h4><a href="">Museo Interactivo de economia (MIDE)...</a></h4>
					<p>Horario: Cierra pronto · 09–18</p>
					<p>Teléfono: 01 55 5130 4600</p>
					<div class="ec-stars">
						<a href="#" title="Votar con 1 estrellas">&#9733;</a>
						<a href="#" title="Votar con 2 estrellas">&#9733;</a>
						<a href="#" title="Votar con 3 estrellas">&#9733;</a>
						<a href="#" title="Votar con 4 estrellas">&#9733;</a>
						<a href="#" title="Votar con 5 estrellas">&#9733;</a>
					</div>
				</td>
			</tr>
		</table>
	</section>
	</div>
	<footer id="pie">
		<i>Derechos Reservados©2016 EagleCode</i>
		<a href="vista/sesion.php">Webmaster</a>
	</footer>

</body>
</html>
