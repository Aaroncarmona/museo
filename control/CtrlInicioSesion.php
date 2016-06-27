<?php 

	/*SE MANDAN A LLAMAR LAS CUATRO CLASES A UTILIZAR*/

	include("../datos/Conexion.php"); //CONEXION A LA BASE DE DATOS
	include("../datos/Empleado.php"); //CLASE DE EMPLEADO
	include("../datos/Tipo_empleado.php"); //CLASE DEL TIPO DE EMPLEADO
	/*include("../datos/Detalle_tipo_empleados.php"); 
														DETALLE DE TIPO
														EMPLEADO QUE TEINE
														RELACION CON
														EMPLEADO Y TIPO_EMPLEADO
													*/
	
	/*SE INSTANCIO UN OBJETO EN LAS CLASES*/
	$con = new Conexion();//INSTANCIA DE CONEXION
	$emp = new Empleado();//INSTANCIA DE EMPLEADO

	echo $con->selectFrInner("e.uno,e.dos",
							 "Primera , Segunda",
							 "p.nombreUno = e.nombreDos , p.nombreUno = f.nombreTres");
	$con->conectar();

	if (isset($btnIniciar)) {
		/*
			SI EL BOTON DEL FORMULARIO QUE INVOCA AL CONTROL
			ES CLICKEADO, SE EJECTUA EL METODO LA CUAL
			INICIARA SESION Y MANDARA A LA PANTALLA RESPECTIVA
			DE CADA USUARIO.
		*/

		$emp->setCorreo_emp($_REQUEST['correo']); //SE MODIFICAN LOS VALORES 
		$emp->setContra_emp($_REQUEST['contra']); //DE LOS OBJETOS
		$tipousuario = $_REQUEST['tipousuario']; //PARA DAR LOS PERMISOS CORRESPONDIENTES

		$btnIniciar = $_REQUEST['btnIniciar'];
	

		iniciarSesion($emp->getCorreo_emp(),$emp->getContra_emp(),$tipousuario);
		

	}

	function iniciarSesion($correo,$contra,$tipo){
		$estado = false;

		$sql = "select e.correo_emp,e.contra_emp from EMPLEADOS e inner join 
					( TIPO_EMPLEADO t inner join DETALLE_TIPO_EMPLEADOS d on d.id_temp = t.id_temp ) 
				on d.id_emp = e.id_emp 
				where e.correo_emp like '$correo' 
					and e.contra_emp like '$contra' 
					and t.id_temp = $tipo";
		
		$res = $con->query($sql);
		$dato = mysqli_fetch_array($res);
		
		if($dato[0] != "" && $dato[1] != ""){
			$estado = true;
		}

		if($estado){
			session_start();
			$_SESSION['correo'] = $correo;
			$_SESSION['tipousuario'] = $tipousuario;
			if ($tipousuario == 1) {
				header("Location: ../vista/administrador/inicioAdministrador.php");
			}else if($tipousuario == 2){
				header("Location: ../vista/empleado/inicioEmpleado.php");
			}
		}else{
			?>
				<script>
					alert("Hay un error en su inciio de sesion verifique\n1. El correo se a correcto\n2. La contraseña sea correcta\n3. El tipo de usuario sea el correcto\nDe intentar todo lo demas y no tener solucion acuda con el administrador");
					window.location="../vista/frmInicioSesion.html";
				</script>
			<?php
		}

	}
?>