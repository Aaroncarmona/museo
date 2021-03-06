﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="icon" type="image/png" href="../favicon.png" />
	<link rel="stylesheet" type="text/css" href="../recursos/css/estilo.css">
		<title>ACEM </title>
</head>
<body>
	<header>
		<table>
			<tr>
				<td class="henav">
					<a href="../index.php">
						<img id="logo" src="../recursos/imagenes/logo/logo.png">
					</a>
				</td>
				<td>
					<h1 id="tituloH1Header">ACEM</h1>
					<h4>Aplicacion para la Consulta y Evaluacion de Museos</h4>
				</td>

				<td class="henav2">
					<!--PARA QUE EL TEXTO SE QUEDE ENMEDIO-->
				</td>
			</tr>
		</table>
		<nav id="navegacion">
			<ul>
				<li>
					<a href="../index.php">Inicio
						<img class="icono"src="../recursos/imagenes/home.png">
					</a>
				</li>
			</ul>
		</nav>
	</header>


	<div id="contenedor">

		<section id="principal">
			<form  action="../control/CtrlInicioSesion.php">
				<table  class ="iniciarSesion">
					<tr>
						<th>Inicio de sesión <br/> <img class="tam" src="../recursos/imagenes/inicio.png" ></th>
					</tr>

					<tr>
						<td>
							<input type="email" name="correo" id="correo" placeholder="Correo electorinico.." required autofocus />
						</td>
					</tr>

					<tr>
						<td class="dato">
							<input type="password" name="contra" id="contra" placeholder="Contraseña..." required>
						</td>
					</tr>

					<tr>
						<td>
							<select name="tipousuario" id="tipousuario">
								<option value="1">Administrador</option>
								<option value="2">Empleado</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" id="btnIniciar" name="btnIniciar" value="Iniciar Sesion"/>
						</td>
					</tr>
				</table>
			</form>
		</section>

	</div>

	<footer id="pie">
		<i>Derechos Reservados©2016 EagleCode</i>
	</footer>

</body>
</html>
