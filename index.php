<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
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
					<a href="quienes.html">¿Quienes somos?  <img class="icono"src="recursos/imagenes/quienes.png"></a>
				</li>
				<li>
					<p><b>/</b></p>
				</li>
				<li>
					<a href="acem.html">¿Para que sirve ACEM?  <img class="icono"src="recursos/imagenes/sirve.png"></a>
				</li>
			</ul>
		</nav>
	</header>

	<div id="buscadorPrincipal">
		<form name="frmVis-bus" id="buscar" action="#">
			<input type="text" name="busqueda" id="busqueda" placeholder="Nombre / Delegacion "/>

			<select name="del" id="del">
				
			</select>

			<input type="submit" name="buscar" class="subBuscar" value="Buscar" />
		</form>
	</div>

	<div id="contenedor">
		<aside id="lateral">
			
		</aside>

	<section id="principal">
		<?php
			include("datos/Conexion.php");
			include("control/CtrlMuse.php");
			$control = new CtrlMuse();

			$list = $control->listarMuseo();

			foreach ($list as $key => $value) {
				
		?>
		<div class="vis-bus-contenedor">
			<div class="vis-bus-titulo">
				<h2><a href="vista/verMuseo.php?id=<?php echo $list[$key][0] ?>"><?php echo $list[$key][2] ?></a></h2>
			</div>

			<div class="vis-bus-img">
				<img src="recursos/imagenes/museos/<?php echo $list[$key][2]?>/<?php echo $list[$key][1]?>">
			</div>

			<div class="vis-bus-textCon">
				<div class="vis-bus-text">
					<p>
						<?php echo substr($list[$key][5],0, 200) . "..."?> 
					</p>
				</div>
				<hr class="hr-100">
				Puntuacion<br/>
				<div class="ec-stars">
						<a href="#" title="Votar con 1 estrellas">&#9733;</a>
						<a href="#" title="Votar con 2 estrellas">&#9733;</a>
						<a href="#" title="Votar con 3 estrellas">&#9733;</a>
						<a href="#" title="Votar con 4 estrellas">&#9733;</a>
						<a href="#" title="Votar con 5 estrellas">&#9733;</a>
				</div>
			</div>

			<div class="vis-bus-evaluar">
				<a href="vista/evaluar.php?id=<?php echo $list[$key][0] ?>"><img src="vista/evaluar.php" alt="evaluar"></a>
			</div>
			
		</div>
		<?php } ?>
	</section>
	</div>
	<footer id="pie">
		<i>Derechos Reservados©2016 EagleCode</i>
		<a href="vista/sesion.php">Webmaster</a>
	</footer>

</body>
</html>
