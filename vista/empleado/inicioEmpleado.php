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
?>
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
					<a href="gestionarMuseos.php">Gestionar Museos </a>
				</li>
				<li><a href="estadistica.php">Estadisticas</a></li>
				<li>
					<a href="../../index.php">Cerrar Session</a>
				</li>
			</ul>
		</aside>
		<section id="principal">
			<H2>BIENVENIDO AL EMPLEADO...</H2>
			<br/>
            <div class="slider">
		<ul>
			<li><img class="galeria" src="../../recursos/imagenes/img1.jpg" alt=""></li>
			<li><img class="galeria" src="../../recursos/imagenes/img2.jpg" alt=""></li>
			<li><img class="galeria" src="../../recursos/imagenes/img3.jpg" alt=""></li>
			<li><img class="galeria" src="../../recursos/imagenes/img4.jpg" alt=""></li>
     </ul>
		</div>

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
