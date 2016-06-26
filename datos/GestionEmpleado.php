<?php 
	include('Conexion.php');
	class GestionEmpleado
	{
		private $nombre;
		private $apePat;
		private $apeMat;
		private $telefono;
		private $correo;
		private $contrasena;

		public function __construct(){

		}

		public function listar(){
			$con = new Conexion();
			$con->conectar();
			$sql = 'select nombre_emp, apellido_pat, apellido_mat, telefono_emp, correo_emp,id_emp from EMPLEADOS;';
			$list = $con->query($sql);
			return $list;
		}

		public function agregar($nombre,$apePat,$apeMat,$telefono,$correo,$contrasena){
			$this->nombre = $nombre;
			$this->apePat = $apePat;
			$this->apeMat = $apeMat;
			$this->telefono = $telefono;
			$this->correo = $correo;
			$this->contrasena=$contrasena;

			$con = new Conexion();
			$con->conectar();

			$sql = "insert into EMPLEADOS(nombre_emp,apellido_pat,apellido_mat,telefono_emp,correo_emp,contra_emp) values('$this->nombre','$this->apePat','$this->apeMat','$this->telefono','$this->correo','$this->contrasena');";
		
			$val = $con->query($sql);
			if($val){
				?> <script>alert("Se agrego conectamente");</script> <?php
				return $val;
			}else{
				?><script>alert("Ya existe ese registro");</script><?php
			}
		}

		public function eliminar($id){
			$con = new Conexion();
			$con->conectar();
			$sql = "delete from EMPLEADOS where id_emp = $id";
			$estado = $con->query($sql);
			if($estado){
				return $estado;
			}else{
				?><script>alert("No se pudo eliminar");</script><?php
			}
		}

		public function getEmpleado($id){
			$con = new Conexion();
			$con->conectar();
			$sql = 'select id_emp, nombre_emp, apellido_pat, apellido_mat, telefono_emp, correo_emp, contra_emp from EMPLEADOS where id_emp = ' . $id ;
			$list = $con->query($sql);
			
			return $list;
		}

		public function actualizar($id,$nombre,$apePat,$apeMat,$telefono,$correo,$contrasena){
			$con = new Conexion();
			$con->conectar();
			$msg = "SET ";
			$msg .= ($nombre !== "" ) ? "nombre_emp = '$nombre'," : "" ;
			$msg .= ($apePat !== "" ) ? "apellido_pat = '$apePat'," : "" ;
			$msg .= ($apeMat !== "" ) ? "apellido_mat = '$apeMat'," : "" ;
			$msg .= ($telefono !== "" ) ? "telefono_emp = '$telefono'," : "" ;
			$msg .= ($correo !== "" ) ? "correo_emp = '$correo', " : "" ;
			$msg .= ($contrasena !== "" ) ? "contra_emp = '$contrasena'," : "" ;

			$msg = substr($msg, 0 , strlen($msg)-1);

			$sql = "UPDATE EMPLEADOS " . $msg . " WHERE id_emp = $id";
			
			$estado = $con->query($sql);

			if ($estado) {
				return $estado;
			}
		}
	}

?>