<?php

	class CtrlEmpleado{

		/*SE REGISTRA Y EN CASO QUE SI SE REGRESA UNA VALIDACION*/
		public function registrar($emp){
			$con = new Conexion();
			
			$con->conectar();
			$sql = "insert into EMPLEADOS(nombre_emp,apellido_pat,apellido_mat,telefono_emp,correo_emp,contra_emp) 
				values('". $emp->getNombre_emp() .
				"','" . $emp->getApellido_pat() . 
				"','" . $emp->getApellido_mat() .
				"','" . $emp->getTelefono_emp() .
				"','" . $emp->getCorreo_emp().
				"','" . $emp->getContra_emp()."');";
			$val = $con->query($sql);

			if($val){
				?> <script>alert("Se agrego conectamente");</script> <?php
				return $val;
			}else{
				?><script>alert("Ya existe ese registro");</script><?php
			}
			
		}


		public function actualizar($emp){
			$con = new Conexion();
			$con->conectar();
			$msg = "SET ";
			$msg .= ($emp->getNombre_emp() !== "" ) ? "nombre_emp = '". $emp->getNombre_emp() . "'," : "" ;
			$msg .= ($emp->getApellido_pat() !== "" ) ? "apellido_pat = '". $emp->getApellido_pat() . "'," : "" ;
			$msg .= ($emp->getApellido_mat() !== "" ) ? "apellido_mat = '" . $emp->getApellido_mat() . "'," : "" ;
			$msg .= ($emp->getTelefono_emp() !== "" ) ? "telefono_emp = '". $emp->getTelefono_emp() ."'," : "" ;
			$msg .= ($emp->getCorreo_emp() !== "" ) ? "correo_emp = '". $emp->getCorreo_emp() ."', " : "" ;
			$msg .= ($emp->getContra_emp() !== "" ) ? "contra_emp = '". $emp->getContra_emp() ."'," : "" ;

			$msg = substr($msg, 0 , strlen($msg)-1);

			$sql = "UPDATE EMPLEADOS " . $msg . " WHERE id_emp = " . $_REQUEST['id'] . ";";
			
			$estado = $con->query($sql);

			if ($estado) {
				?><script>
					alert("Se ha modificado el campo seleccionado");
					window.location="../vista/administrador/gestionarEmpleados.php";
				</script><?php
			}
		}

		public function eliminar($id){
			$con = new Conexion();
			$sql = "delete from EMPLEADOS where id_emp = " . $id . ";";
			
			$con->conectar();
			$con->query($sql);
		}

		public function listar(){
			include("../../datos/Conexion.php");
			include("../../datos/Empleado.php");
			$con = new Conexion();
			
			$i = 0;
			$con->conectar();
			$sql = 'select nombre_emp, apellido_pat, apellido_mat, telefono_emp, correo_emp,contra_emp,id_emp from EMPLEADOS;';
			
			$lista = $con->query($sql);

			while($dato = mysqli_fetch_array($lista)){
				$emp[$i]= new Empleado();
				$emp[$i]->iniciar($dato[0],$dato[1],$dato[2],$dato[3],$dato[4],$dato[5]);
				$emp[$i]->setId_emp($dato[6]);
				$i++;
			}
			return $emp;
		}

		public function listarId($id){
			include("../../datos/Conexion.php");
			include("../../datos/Empleado.php");
			$con = new Conexion();
			
			$i = 0;
			$con->conectar();
			$sql = 'select nombre_emp, apellido_pat, apellido_mat, telefono_emp, correo_emp,contra_emp,id_emp from EMPLEADOS where id_emp = '. $id .';';
			
			$lista = $con->query($sql);

			$dato = mysqli_fetch_array($lista);

			$emp = new Empleado();

			$emp->iniciar($dato[0],$dato[1],$dato[2],$dato[3],$dato[4],$dato[5]);
		
			return $emp;
		}
	}
?>


<?php 
	if(isset($_REQUEST['regEmpleado'])){
		include("../datos/Empleado.php");
		include("../datos/Conexion.php");
		$control = new CtrlEmpleado(); /*SE CREA AL CONTROL*/
		$emp = new Empleado();
		$emp->iniciar( //			SE CREA UNA INSTANCIA DEL
			$_REQUEST['nombreEmp'],// EMPLEADO LA CUAL NOS PERMITIRA
			$_REQUEST['ape_pat'],//         INVOCAR SU METODO
			$_REQUEST['ape_mat'],
			$_REQUEST['telefono'],
			$_REQUEST['correo'],
			$_REQUEST['contrasena']
		);
		$status = $control->registrar($emp); //REGISTRAR

		if($status){
			?><script> window.location="../vista/administrador/gestionarEmpleados.php"; </script><?php
		}else{
			?><script> window.location="CtrlEmpleado.php?accion=a"; </script><?php
		}
	}else if(isset($_REQUEST['bajaEmpleado'])){
		include("../datos/Conexion.php");
		include("../datos/Empleado.php");
		$control = new CtrlEmpleado();
		$emp = new Empleado();
		$emp->setId_emp($_REQUEST['id']);
		$control->eliminar($emp->getId_emp());
		?>
			<script>
				window.location="../vista/administrador/gestionarEmpleados.php";
			</script><?php
	}else if(isset($_REQUEST['bajaEmpleadoCan'])){
		?>
			<script>
				window.location="../vista/administrador/gestionarEmpleados.php";
			</script><?php

	}else if(isset($_REQUEST['modEmpleado'])){
		include("../datos/Conexion.php");
		include("../datos/Empleado.php");
		$control = new CtrlEmpleado();
		$emp = new Empleado();
		$emp->iniciar(
			$_REQUEST['nombreEmp'],// EMPLEADO LA CUAL NOS PERMITIRA
			$_REQUEST['ape_pat'],//         INVOCAR SU METODO
			$_REQUEST['ape_mat'],
			$_REQUEST['telefono'],
			$_REQUEST['correo'],
			$_REQUEST['contrasena']
		);

		$control->actualizar($emp);
	}
?>