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
		
		include("../../control/CtrlSala.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../recursos/css/estilo.css">
	<title>ACEM -- SALAS</title>
</head>
<body>
	<header>
		<table>
			<tr>
				<td class="henav"><a href="index.html"><img id="logo" src="../../recursos/imagenes/logo/logo.png"></a></td>
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
					<a href="gestionarMuseos.php">Regresar</a>
				</li>
				<li>
					<a href="../../index.html">Cerrar Session</a>
				</li>
			</ul>
		</aside>	
		<section id="principal">
			<h1>Administracion de Salas</h1>
			<br><hr>
			<?php 
				$control = new CtrlSala();
				if(isset($_REQUEST['accion'])){
					switch($_REQUEST['accion']){
						case 'a':
						?>
							<form action="../../control/CtrlSala.php">
								<table class="tablafrm" >
									<tr>
										<th>
											Registro de sala
										</th>
									</tr>
									<tr>
										<td>
											<input type='text' name='nombreSal' id='nombreSal' placeholder='Nombre..' required autofocus/>
										</td>
									</tr>
									<tr>
										<td>
											<textarea rows="10" placeholder='Cuerpo..' cols="50" name='cuerpoSal' id='cuerpoSal'></textarea>
										</td>
									</tr>
									<tr>
										<td>
											<input type='submit' name="btnReg" value='Registrar' />
										</td>
									</tr>
								</table>
								<input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>"/>
								<!--<input type="hidden" name="idSal" value="<?php echo $_REQUEST['idsal'] ?>"/> -->
							</form>
						<?php
						break;
						case 'b':
						$lista = $control->listarSalaId($_REQUEST['id'],$_REQUEST['idsal']);

						?>
							<form action="../../control/CtrlSala.php">
								<table class="tablafrm" >
									<tr>
										<th colspan="2">
											Eliminar Sala
										</th>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar"><?php echo "<strong>" ?>Nombre: <?php echo "</strong>" .$lista->getNombre_sala(); ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="txtBorrar"><?php echo "<strong>" ?> Cuerpo: <?php echo "</strong> <br>" .substr($lista->getCuerpo_sala() , 0 , 40 ) . "...."; ?></span>
										</td>
									</tr>
									<tr>
										<td>
											<input type="submit" name="bajaSala" value="Aceptar"/>
										</td>
										<td>
											<input type="submit" name="bajaSalaCan" value="Cancelar"/>
										</td>
									</tr>
								</table>
								<input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>" />
								<input type="hidden" name="idSal" value="<?php echo $_REQUEST['idsal'] ?>"/>
							</form>
						<?php
						break;
						case 'm':

						$lista = $control->listarSalaId($_REQUEST['id'],$_REQUEST['idsal']);
						
						?>

						<form action="../../control/CtrlSala.php">
								
								<input type="hidden" name="id" id="id" value='<?php echo $_REQUEST['id'] ?>'/>
								<input type="hidden" name="idsal" id="idsal" value='<?php echo $_REQUEST['idsal'] ?>'/>

								<table class="tablafrm" >
									<tr>
										<th>
											Modificar Sala
										</th>
									</tr>
									<tr>
										<td>
											<input type='text' name='nombreSal' id='nombreSal' placeholder='Nombre: <?php echo $lista->getNombre_sala(); ?>' autofocus/>
										</td>
									</tr>
									<tr>
										<td>
											<textarea rows="10" placeholder='Cuerpo: <?php echo $lista->getCuerpo_sala(); ?>' cols="50" name='cuerpoSal' id='cuerpoSal'></textarea>
										</td>
									</tr>
									<tr>
										<td>
											<input type='submit' name="modSala" value='Modificar'/>
										</td>
									</tr>
									<input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>" />
								</table>
							</form>
						<?php
						break;
					}
				}else{

					$salas = $control->listarSala($_REQUEST['id']);
			?>
			<table class="tablaAdmG">
				<tr>
					<th colspan="7" id="estAgre">
						<a href="gestionarSalas.php?accion=a&id=<?php echo $_REQUEST['id']?>">
							<img class="icono" src="../../recursos/imagenes/agregar.png"> 
						</a>
					</th>
				</tr>
				<tr>
					<th>Sala</th>
					<th>Contenido</th>
					<th colspan="2">Accion</th>
				</tr>

				<!--consulta -->
						<?php 
						if($salas[0] == null){
							echo "<td colspan = '4'>No existen registros</td>";

						}else{
						foreach ($salas as $key => $value) {

						 ?>
						<tr>
							<td><?php echo $salas[$key]->getNombre_sala(); ?> </td>
							<td><?php echo substr($salas[$key]->getCuerpo_sala(), 0 , 20) . "....."; ?> </td>
							
							<td class="btnAccion">
								<a href="gestionarSalas.php?accion=b&id=<?php echo $salas[$key]->getId_mus();?>&idsal=<?php echo $salas[$key]->getId_sala();?>">
									<img class="icono" src="../../recursos/imagenes/eliminar.png" alt="eliminar">
								</a>
							</td>
							
							<td class="btnAccion">
								<a href="gestionarSalas.php?accion=m&id=<?php echo $salas[$key]->getId_mus();?>&idsal=<?php echo $salas[$key]->getId_sala();?>">
									<img class="icono" src="../../recursos/imagenes/editar.png" alt="modificar">
								</a>
							</td>

		           		</tr>
						<!--consulta -->
						<?php } //FOREACH
						}//IF ?>
			</table>
			<?php } ?>
		</section>

	
	</div>
	
		<footer id="pie">
		<i>Derechos Reservados©2016 EagleCode</i>
	</footer>
	</body>
</html>

<?php } ?>