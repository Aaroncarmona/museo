<?php 
	class Delegacion{
		private $id_del;
		private $delegacion;

		public function iniciar($id_del, $delegacion){
			$this->id_del = $id_del;
			$this->delegacion = $delegacion;
		}

		public function getId_del(){
			return $this->id_del;
		}

		public function getDelegacion(){
			return $this->delegacion;
		}

		public function setId_del($id_del){
			$this->id_del = $id_del;
		}

		public function setDelegacion($delegacion){
			$this->delegacion = $delegacion;
		}


	}
?>