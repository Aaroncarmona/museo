<?php 
	class Conexion{
		private $host;
		private $usuario;
		private $contra;
		private $database;
		private $con;

		public function __construct(){
			$this->host = "localhost";
			$this->usuario = "root";
			$this->contra = "";
			$this->database = "museo";
		}
		
		public function conectar(){
			$this->con = mysqli_connect($this->host,$this->usuario,$this->contra,$this->database);
			if(!$this->con){
				?>
					<script>
						alert("Hay algun error en la base de datos");
					</script>
				<?php
			}
			return $this->con;
		}

		public function query($query){
			$res = mysqli_query($this->con,$query);
			if($res){
				return $res;
			}else{
				?>
					<script>
						alert("Problemas al ejecutar la instruccion");		
					</script>
				<?php
			}
		}

		public function getCon(){
			return $this->con;
		}

		public function setCon($con){
			$this->con = $con;
		}

		public function desconectar(){
			mysqli_close($this->con);
		}
	}
?>