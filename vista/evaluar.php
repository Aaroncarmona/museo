<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="icon" type="image/png" href="favicon.png" />
	<link rel="stylesheet" type="text/css" href="../recursos/css/estilo.css">
		<title>ACEM - INDEX	</title>
</head>
<body>
	<header>
		<table>
			<tr>
				<td class="henav"><a href="../index.php"><img id="logo" src="../recursos/imagenes/logo/logo.png"></a></td>
				<td><h1 id="tituloH1Header">ACEM</h1><h4>Aplicacion para la Consulta y Evaluacion de Museos</h4></td>
				<td class="henav2">

				</td>
			</tr>
		</table>
		<nav id="navegacion">
			<ul>
				<li>
					<a href="../index.php">Inicio  <img class="icono"src="../recursos/imagenes/home.png"></a>
				</li>

				<li>
					<p><b>/</b></p>
				</li>
				<li>
					<a href="../quienes.html">Quienes somos  <img class="icono"src="../recursos/imagenes/quienes.png"></a>
				</li>
				<li>
					<p><b>/</b></p>
				</li>
				<li>
					<a href="../acem.html">Para que sirve ACEM  <img class="icono"src="../recursos/imagenes/sirve.png"></a>
				</li>
				<li>
					<p><b>/</b></p>
				</li>
			</ul>
		</nav>
	</header>


	<div id="contenedor">



		<aside id="lateral">
			<div class="info_vis">
					<img src="../recursos/imagenes/varios/aside.png">
			</div>
		</aside>

		<section id="principal">
			<?php 
				include("../control/CtrlMuse.php");
				include("../datos/Conexion.php");
				include("../control/CtrlSala.php");
				include("../datos/Sala.php");

				$controlMuseo = new CtrlMuse();
				$controlSala = new CtrlSala();

				$listMuseo = $controlMuseo->listarMuseoId($_REQUEST['id']);
			?>
			
			<form name="frmAdminRegMus" action="../../control/CtrlEvaluar.php">
				<table class="tablafrm" >
					<tr>
						<th>
							Evaluacion del museo 
							<br><h5>x</h5>
						</th>
					</tr>
					<tr>
						<td>
							<select name="tvis" id="tvis" required>
								<option value="0">Tipo de visitante</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<select name="estado" id="estado">
								<option value="0">Estado del que nos visita</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<div class="radioButton">	
								<input type="radio" name="rbPuntaje" value="1">1
							 	<input type="radio" name="rbPuntaje" value="2">2
							 	<input type="radio" name="rbPuntaje" value="3">3
							 	<input type="radio" name="rbPuntaje" value="4">4
							 	<input type="radio" name="rbPuntaje" value="5">5
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="radioButton">
								<input type="radio" name="rbSexo" value="h">HOMBRE
							 	<input type="radio" name="rbSexo" value="m">MUJER
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<textarea rows="6" placeholder='Platicanos de tu experiencia' cols="50" name='desc' id='opinion' required></textarea>
						</td>
					</tr>

					<tr>
						<td>
							<input type='submit' name="regMuseo" value='Evaluar'/>
						</td>
					</tr>
				</table>
			</form>
		</section>




	</div>


	<footer id="pie">
		<i>Derechos Reservados©2016 EagleCode</i>
		<a href="../vista/frmInicioSesion.html">Webmaster</a>
	</footer>
</body>
</html>
