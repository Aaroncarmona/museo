<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8/>
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
				include("../control/CtrlSala.php");
				include("../datos/Sala.php");

				$controlMuseo = new CtrlMuse();
				$controlSala = new CtrlSala();

				$listMuseo = $controlMuseo->listarMuseoId($_REQUEST['id']);
			?>
			<div class="verMuseoPrincipal">
				<h2><?php echo $listMuseo[2] ?></h2>
				<hr class="hr-100">
				<img class="imgMus-100" src="../recursos/imagenes/museos/<?php echo $listMuseo[2] ?>/<?php echo $listMuseo[1] ?>" alt="museo">
				<p>
					<?php echo $listMuseo[5] ?>
				</p>
				
				<?php 
					$listSala = $controlSala->listarSala($_REQUEST['id']); 
					foreach ($listSala as $key => $value) {
				?>

				<div class="verMuseoPrincipalSala">
					<h3><?php echo $listSala[$key]->getNombre_sala(); ?></h3>
					<hr class="hr-100">
					<p>
						<?php echo $listSala[$key]->getCuerpo_sala(); ?>
					</p>
				</div>
				<?php } ?>

			</div>


		</section>




	</div>


	<footer id="pie">
		<i>Derechos Reservados©2016 EagleCode</i>
		<a href="vista/frmInicioSesion.html">Webmaster</a>
	</footer>
</body>
</html>
