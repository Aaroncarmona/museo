<?php 

	/*SE MANDAN A LLAMAR LAS CUATRO CLASES A UTILIZAR*/

	include("../datos/Conexion.php");//CLASE DE CONEXION
	include("../datos/Empleado.php"); //CLASE DE EMPLEADO
	/*include("../datos/Detalle_tipo_empleados.php"); 
														DETALLE DE TIPO
														EMPLEADO QUE TEINE
														RELACION CON
														EMPLEADO Y TIPO_EMPLEADO
													*/
		$emp = new Empleado();//INSTANCIA DE EMPLEADO
		
		$emp->setCorreo_emp($_REQUEST['correo']); //SE MODIFICAN LOS VALORES 
		$emp->setContra_emp($_REQUEST['contra']); //DE LOS OBJETOS
		$tipousuario = $_REQUEST['tipousuario']; //PARA DAR LOS PERMISOS CORRESPONDIENTES

		$btnIniciar = $_REQUEST['btnIniciar'];

	if (isset($btnIniciar)) {
		/*
			SI EL BOTON DEL FORMULARIO QUE INVOCA AL CONTROL
			ES CLICKEADO, SE EJECTUA EL METODO LA CUAL
			INICIARA SESION Y MANDARA A LA PANTALLA RESPECTIVA
			DE CADA USUARIO.
		*/

	

		iniciarSesion($emp->getCorreo_emp(),$emp->getContra_emp(),$tipousuario);//SE MANDA A LLAMAR EL INICIO DE SESION
		

	}//TERMINO DEL BOTON DE INICIAR SESION

	/*
		NOS PERMITE INICIAR SESION
		CASOS EN LOS QUE ES VALIDO EL ACCESO
			-CUANDO EL CORREO Y CONTRASEÑA SON CORRECTAS
		CASOS EN LOS QUE NO ES VALIDO EL ACCESO
			-CUANDO EL CORREO NO EXISTE
			-CUANDO EL CORREO EXISTE PERO LA CONTRASEÑA ESTA MAL
			-CUANDO EL EMPLEADO NO TENGA LOS PERMISOS NECESARIOS
				PARA INICIAR SESION
		IN
			CORREO : CORREO DEL EMPLEADO
			CONTRA : CONTRASEÑA DEL EMPLEADO
			TIPO : TIPO DE EMPLEADO 
	*/

	function iniciarSesion($correo,$contra,$tipo){
		$con = new Conexion();//INSTANCIA DE CONEXION
		$con->conectar();//SE CONECTA A LA BASE DE DATOS

		//ESTADO EN EL QUE ESTA EL INICIO DE SESION
		$estado = false;
		
		/*
			CONSULTA SI SE QUIERE VER LO QUE SACA POR CUESTIONES DE
			MANTENIMIENTO SOLO AGREGAR echo $sql;
		*/
		$sql = "select e.correo_emp,e.contra_emp from EMPLEADOS e inner join 
					( TIPO_EMPLEADO t inner join DETALLE_TIPO_EMPLEADOS d on d.id_temp = t.id_temp ) 
				on d.id_emp = e.id_emp 
				where e.correo_emp like '{$correo}' 
					and e.contra_emp like '{$contra}' 
					and t.id_temp = $tipo";

		//SE CARGA EL QUERY Y SE PASA COMO PARAMETRO LA CONSULTA
		$res = $con->query($sql);

		//SE CREA UN ARREGLO VIRTUAL
		$dato = mysqli_fetch_array($res);
		
		/*
			SI EXISTEN LOS REGISTROS SE PASA EL ESTADO A TRUE DE LO CONTRARIO
			SE DEJA IGUAL.
		*/

		if($dato[0] != "" && $dato[1] != ""){
			$estado = true;
		}

		/*
			EN DADO CASO QUE SI EXISTIERA EL REGISTRO
			SE INICIARA UNA SESION QUE GUARDARA

			CORREO : ES EL CORREO DEL EMPLEADO Y NO DEJARA
					PARAR A OTRA PAGINA SI NO SE A INICIADO LA SESION
			TIPOUSUARIO : DIFERENCIAR QUE TIPO DE USUARIO ENTRA
		*/
		if($estado){
			session_start();
			$_SESSION['correo'] = $correo;
			$_SESSION['tipousuario'] = $tipo;
			
			/*
				FALTA CORREGIR ESTA PARTE YA QUE NO TIENE QUE ESTAR ASI LA VALIDACION
				DEL USUARIO, SE TIENEN QUE GESTIONAR LOS DIFERENTES INICIOS DE SESION DIFENTE
			*/
			if ($tipo == 1) {
				header("Location: ../vista/administrador/inicioAdministrador.php");
			}else if($tipo == 2){
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

	/*function jsAlert($msg){
		echo "
			<script>
				alert('$msg');
			</script>

		";
	}*/


?>