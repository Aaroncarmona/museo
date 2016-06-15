<?php 
	include('Conexion.php');
	class Museo
	{
		private $imagen;
		private $nombre;
		private $desc;
		private $del;
		private $dir;
		private $precio;

		public function __construct(){

		}

		public function listar(){
			$con = new Conexion();
			$con->conectar();
			$sql = 'select m.nombre_mus,m.desc_mus,d.delegacion,m.id_mus from MUSEOS m inner join DELEGACIONES d on d.id_del = m.id_del';
			$list = $con->query($sql);
			return $list;
		}

		public function agregar($imagen,$nombre,$desc,$del,$dir,$precio){
			$this->imagen = $imagen;
			$this->nombre = $nombre;
			$this->desc = $desc;
			$this->del = $del;
			$this->dir = $dir;
			$this->precio = $precio;

			$con = new Conexion();
			$con->conectar();

			$sql = "insert into MUSEOS(imagen_mus,nombre_mus,desc_mus,id_del,dir_mus,precio_mus) values('$this->imagen','$this->nombre','$this->desc','$this->del','$this->dir',$this->precio);";
		
			$val = $con->query($sql);
			if($val){
				?> <script>alert("Se agrego conectamente");</script> <?php
				return $val;
			}else{
				?><script>alert("Ya existe ese registro");</script><?php
			}
		}

		public function listarDelegaciones(){
			$con = new Conexion();
			$con->conectar();
			$sql = "select id_del,delegacion from DELEGACIONES";
			$list = $con->query($sql);
			return $list;
		}

		public function eliminar($id){
			$con = new Conexion();
			$con->conectar();
			$sql = "delete from MUSEOS where id_mus = $id";
			$estado = $con->query($sql);
			if($estado){
				return $estado;
			}else{
				?><script>alert("No se pudo eliminar");</script><?php
			}
		}

		public function getMuseo($id){
			$con = new Conexion();
			$con->conectar();
			$sql = 'select m.imagen_mus,m.nombre_mus,d.id_del,d.delegacion,m.dir_mus,m.precio_mus,m.desc_mus from MUSEOS m inner join DELEGACIONES d on d.id_del = m.id_del where m.id_mus = ' . $id ;

			$list = $con->query($sql);
			
			return $list;
		}

		public function actualizar($id,$imagen,$nombre,$desc,$del,$dir,$precio){
			$con = new Conexion();
			$con->conectar();
			$msg = "SET ";
			$msg .= ($imagen !== "" ) ? "imagen_mus = '$imagen'," : "" ;
			$msg .= ($nombre !== "" ) ? "nombre_mus = '$nombre'," : "" ;
			$msg .= ($desc !== "" ) ? "desc_mus = '$desc'," : "" ;
			$msg .= ($del !== "" ) ? "id_del = $del," : "" ;
			$msg .= ($dir !== "" ) ? "dir_mus = $dir, " : "" ;
			$msg .= ($precio !== "" ) ? "precio_mus = $precio," : "" ;

			$msg = substr($msg, 0 , strlen($msg)-1);

			$sql = "UPDATE MUSEOS " . $msg . " WHERE id_mus = $id";
			
			$estado = $con->query($sql);

			if ($estado) {
				return $estado;
			}
		}
	}

?>