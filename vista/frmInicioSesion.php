<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8/>

	<link rel="stylesheet" type="text/css" href="../recursos/css/estilo.css">
		<title>ACEM </title>
</head>
<body>
	<header>
		<table>
			<tr>
				<td class="henav" style="background : #2b8f79;border-radius: 0px 25px 25px 0px;"><a href="index.html"><img id="logo" src="../recursos/imagenes/logo/logo.png"></a></td>
				<td><h1 id="tituloH1Header">ACEM</h1><h4>Aplicacion para la Consulta y Evaluacion de Museos</h4></td>
				<td class="henav">
					
				</td>
			</tr>
		</table>
		<nav id="navegacion">
			<ul>
					<li>
					<a href="../index.html">Inicio</a>
				</li>
				<li>
					<p><b>/</b></p>
				</li>
				<li>
					<a href="../quienes.html">Quienes somos</a>
				</li>
				<li>
					<p><b>/</b></p>
				</li>
				<li>
					<a href="../acem.html">Para que sirve ACEM</a>
				</li>
				
				
			</ul>
		</nav>
	</header>


	<div id="contenedor">
	
			<aside id="lateral">
			aqui van los filtros 
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			

	<hr/>	
	
	</aside>
		
		
		
		<section id="principal">
<form method ="post" action="../control/CtrlInicioSesion.php">
<table  class ="form">
	<th>Inicio de sesión <img class="tam" src="../recursos/imagenes/inicio.png" ></th>
	<tr><td>Usuario:</td></tr>
<tr><td><INPUT NAME="nombre" id="nombre" TYPE="text"size="15" placeholder="usuario" required autofocus/></td></tr>
	<tr><td>Contraseña:</td></tr>
<tr><td class="dato"><INPUT TYPE="password" id="password" NAME="password" placeholder="Password" size="15" required/></td>
<tr><td><input type="submit" value="iniciar" class="boton"></td></tr><br/>
		</form>
			
	</table>
</section>

</div>
	<footer id="pie">
		
	</footer>
</body>
</html>

