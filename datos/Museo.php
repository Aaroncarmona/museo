<?php 
	class Museo{
		private $id_mus;
		private $id_del;
		private $imagen_mus;
		private $nombre_mus;
		private $desc_mus;
		private $dir_mus;
		private $precio_mus;

		public function iniciar($id_del,$imagen_mus,$nombre_mus,$desc_mus,$dir_mus,$precio_mus){
			$this->id_del = $id_del;
			$this->imagen_mus = $imagen_mus;
			$this->nombre_mus = $nombre_mus;
			$this->desc_mus = $desc_mus;
			$this->dir_mus = $dir_mus;
			$this->precio_mus = $precio_mus;
		}

		public function getId_mus(){
			return $this->id_mus;
		}

		public function getId_del(){
			return $this->id_del;
		}

		public function getImagen_mus(){
			return $this->imagen_mus;
		}

		public function getNombre_mus(){
			return $this->nombre_mus;
		}

		public function getDesc_mus(){
			return $this->desc_mus;
		}

		public function getDir_mus(){
			return $this->dir_mus;
		}

		public function getPrecio_mus(){
			return $this->precio_mus;
		}

		public function setId_mus($id_mus){
			$this->id_mus = $id_mus;
		}

		public function setId_del($id_del){
			$this->id_del = $id_del;
		}

		public function setImagen_mus($imagen_mus){
			$this->imagen_mus = $imagen_mus;
		}

		public function setNombre_mus($nombre_mus){
			$this->nombre_mus = $nombre_mus;
		}

		public function setDesc_mus($desc_mus){
			$this->desc_mus = $desc_mus;
		}

		public function setDir_mus($dir_mus){
			$this->dir_mus = $dir_mus;
		}

		public function setPrecio_mus($precio_mus){
			$this->precio_mus = $precio_mus;
		}
}
?>
