<?php 
	class Empleado{
		private $nombre_emp;
		private $apellido_pat;
		private $apellido_mat;
		private $telefono_emp;
		private $correo_emp;
		private $contra_emp;

		public function __construct(){

		}

		public function getNombre_emp(){
			return $this->nombre_emp;
		}

		public function setNombre_emp($nombre_emp){
			$this->nombre_emp = $nombre_emp;
		}

		public function getApellido_pat(){
			return $this->apellido_pat;
		}

		public function setApellido_pat($apellido_pat){
			$this->apellido_pat = $apellido_pat;
		}

		public function getApellido_mat(){
			return $this->apellido_mat;
		}

		public function setApellido_mat($apellido_mat){
			$this->apellido_mat;
		}

		public function getTelefono_emp(){
			return $this->telefono_emp;
		}

		public function setTelefono_emp($telefono_emp){
			$this->telefono_emp = $telefono_emp;
		}

		public function getCorreo_emp(){
			return $this->correo_emp;
		}

		public function setCorreo_emp($correo_emp){
			$this->correo_emp = $correo_emp;
		}

		public function getContra_emp(){
			return $this->contra_emp;
		}

		public function setContra_emp($contra_emp){
			$this->contra_emp;
		}

		/*FUNCIONALIDAD A LA BASE DE DATOS*/
		public function iniciarSesion($correo,$contra,$tipo){
			
			$sql = "select e.correo_emp,e.contra_emp from EMPLEADOS e inner join 
						( TIPO_EMPLEADO t inner join DETALLE_TIPO_EMPLEADOS d on d.id_temp = t.id_temp ) 
					on d.id_emp = e.id_emp 
					where e.correo_emp like '$correo' 
						and e.contra_emp like '$contra' 
						and t.id_temp = $tipo";
			
			include("Conexion.php");
			$con = new Conexion();
			$con->conectar();
			$res = $con->query($sql);
			$dato = mysqli_fetch_array($res);
			
			if($dato[0] != "" && $dato[1] != ""){
				return true;
			}else{
				return false;
			}
		}

		public function registrar($nombre_emp,$apellido_pat,$apellido_mat,$telefono_emp,$correo_emp,$contra_emp){
			$this->nombre_emp = $nombre_emp;
			$this->apellido_pat = $apellido_pat;
			$this->telefono_emp = $telefono_emp;
			$this->correo_emp = $correo_emp;
			$this->contra_emp = $contra_emp;
		}
	}
?>