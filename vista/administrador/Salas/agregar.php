<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../../recursos/css/estilo.css">
	<title>El buscando el chido de museos</title>
</head>
<body>
	<header>
		<table>
			<tr>
				<td class="henav" style="background : #2b8f79;border-radius: 0px 25px 25px 0px;"><a href="index.html"><img id="logo" src="../../../recursos/imagenes/logo/logo.png"></a></td>
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
					<a href="../inicioAdministrador.html ">Inicio   </a>
				</li>
				<li>
					<a href="../gestionarMuseos.html ">Gestionar Museos </a>
				</li>
				<li><a href="../gestionarEmpleados.html">Gestionar Empleados</a></li>
				<li><a href="../evaluaciones.html">Evaluaciones</a></li>
				<li>
					<a href="../../../index.html">Cerrar Session</a>
				</li>
			</ul>
		</aside>	
		<section id="principal">
			<H2>Agregar Salas</H2>
			<br/>
              <form action="Ctrlagregarsala.php">
              <table class="tabla" >
              	<h4>Sala</h4>
            
              	<tr>
              		<th>Nombre de la sala</th>
              		<th>Descripcion</th>
              	</tr>
              	<tr>
              		<td>
              			<input type="text" id="nombre" style="width:100%;height:70px;">
              		</td>
              
              		<td>
              			<textarea name="cuerpo" id="cuerpo" cols="35" rows="5"></textarea>

              		</td>
              	</tr>
              	<tr><td><input type="submit" value="Enviar" ></td>
              	 </form>
              <form action="../gestionarMuseos.html">
              		<td><input type="submit" value="Cancelar" ></td></tr><br/>
              	</form>
              </table>
         
        

		</section>

	
	</div>

	
		<footer id="pie">
		<p><i>Derechos Reservados©2016 EagleCode</i></p>
	</footer>
	</body>
</html>