<?php 
	$correo = $_REQUEST['correo'];
	$contra = $_REQUEST['contra'];
	$tipousuario = $_REQUEST['tipousuario'];
	$btnIniciar = $_REQUEST['btnIniciar'];

	if (isset($btnIniciar)) {
		include("../datos/Empleado.php");
		$usuario = new Empleado();

		$status = $usuario->iniciarSesion($correo,$contra,$tipousuario);

		if($status){
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

	}else{
		
	}
?>