<?php 
	include('Conexion.php');
	class Sala
	{
		private $nombre_sala;
		private $desc_sala;
		private $id_mus;
	

		public function __construct(){

		}

		public function listar(){
			$con = new Conexion();
			$con->conectar();
			$sql = 'select s.nombre_sala,s.desc_sala,
            m.nombre_mus,s.id_sala from SALAS s 
            inner join MUSEOS m on m.id_mus = s.id_mus'; 
            
			$list = $con->query($sql);
			return $list;
		}

		public function agregar($id_mus,$nombre_sala,$desc_sala){
			$this->id_mus = $id_mus;
            $this->nombre_sala = $nombre_sala;
			$this->desc_sala = $desc_sala;
			
			$con = new Conexion();
			$con->conectar();

			$sql = "insert into SALAS(id_mus,nombre_sala,desc_sala) values('$this->id_mus','$this->nombre_sala','$this->desc_sala');";
		
			$val = $con->query($sql);
			if($val){
				?> <script>alert("Se agrego correctamente");</script> <?php
				return $val;
			}else{
				?><script>alert("Ya existe ese registro");</script><?php
			}
		}

		public function listarMuseos(){
			$con = new Conexion();
			$con->conectar();
			$sql = "select id_mus, nombre_mus from MUSEOS";
			$list = $con->query($sql);
			return $list;
		}

		public function eliminar($id){
			$con = new Conexion();
			$con->conectar();
			$sql = "delete from SALAS where id_sala = $id";
			$estado = $con->query($sql);
			if($estado){
				return $estado;
			}else{
				?><script>alert("No se pudo eliminar");</script><?php
			}
		}

		public function getSala($id){
			$con = new Conexion();
			$con->conectar();
			$sql = 'select s.nombre_sala,s.desc_sala,m.id_mus,m.nombre_mus
from SALAS s inner join MUSEOS m on m.id_mus = s.id_mus
where s.id_sala = ' . $id;
			$list = $con->query($sql);
			
			return $list;
		}

		public function actualizar($id,$id_mus,$nombre_sala,$desc_sala){
			$con = new Conexion();
			$con->conectar();
			$msg = "SET ";
			$msg .= ($nombre_sala !== "" ) ? "nombre_sala = '$nombre_sala'," : "" ;
			$msg .= ($desc_sala !== "" ) ? "desc_sala = '$desc_sala'," : "" ;
			
			
			$msg = substr($msg, 0 , strlen($msg)-1);

			$sql = "UPDATE SALAS " . $msg . " WHERE id_sala = $id";
			
			$estado = $con->query($sql);

			if ($estado) {
				return $estado;
			}
		}
	}

?>