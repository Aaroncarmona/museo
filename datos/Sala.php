<?php
	class Sala{
		private $id_sala;
		private $id_mus;
		private $nombre_sala;
		private $cuerpo_sala;

		public function iniciar($id_mus,$nombre_sala,$cuerpo_sala){
			$this->id_mus = $id_mus;
			$this->nombre_sala = $nombre_sala;
			$this->cuerpo_sala = $cuerpo_sala;
		}

		public function getId_sala(){
			return $this->id_sala;
		}

		public function getCuerpo_sala(){
			return $this->cuerpo_sala;
		}

		public function getId_mus(){
			return $this->id_mus;
		}

		public function getNombre_sala(){
			return $this->nombre_sala;
		}

		public function setId_sala($id_sala){
			$this->id_sala = $id_sala;
		}

		public function setId_mus($id_mus){
			$this->id_mus = $id_mus;
		}

		public function setNombre_sala($nombre_sala){
			$this->nombre_sala = $nombre_sala;
		}

		public function setCuerpoSala($cuerpo_sala){
			$this->cuerpo_sala = $cuerpo_sala;
		}
	}
?>