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
			$sql = 'select m.nombre_mus,m.imagen_mus,m.desc_mus,d.delegacion,m.id_mus from MUSEOS m inner join DELEGACIONES d on d.id_del = m.id_del';
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
			$msg .= ($desc !== "" ) ? "desc_mus = '". $this->revisar($desc) . "'," : "" ;
			$msg .= ($del !== "" ) ? "id_del = $del," : "" ;
			$msg .= ($dir !== "" ) ? "dir_mus = $dir," : "" ;
			$msg .= ($precio !== "" ) ? "precio_mus = $precio," : "" ;

			$msg = substr($msg, 0 , strlen($msg)-1);

			$sql = "UPDATE MUSEOS " . $msg . " WHERE id_mus = $id";

			$estado = $con->query($sql);

			if ($estado) {
				return $estado;
			}
		}

		/*	REVISAR INSERTA LOS VIDEOS QUE SE ENCUENTREN EN HTML {}
			ESTE METODO ES RECURSIVO Y TERMINA SU CICLO CUANDO NO ENCUENTRE {

		*/
		public function revisar($texto){
			
			if(strstr($texto,'{') && strstr($texto,'}')){ 
				$pos1 = strpos($texto,"{");
				$pos2 = strpos($texto,"}");

				$video = substr($texto,$pos1);
				$video = substr($video, 1 , strpos($video,"}") -1 );
				
				$cadena = substr($texto,0,$pos1) . '<video class="vidMuseo" ><source src="'.$video.'" type="video/mp4"></video>' .substr($texto,$pos2+1);
				
				return $this->revisar($cadena);

			}else{

				return $texto;

			}

		}
	}

?>

<?php
/* 
include('Conexion.php');
class Museo{
	private $id_mus;
	private $id_del;
	private $imagen_mus;
	private $nombre_mus;
	private $desc_mus;
	private $dir_mus;
	private $precio_mus;

	public function iniciar($id_del,$imagen_mus,$nombre_mus,$desc_mus,$dir_mus,$precio_mus){
		$this->id_del;
		$this->imagen_mus;
		$this->nombre_mus;
		$this->desc_mus;
		$this->dir_mus;
		$this->precio_mus;
	}

	public function getImagen(){

	}

*/
?>