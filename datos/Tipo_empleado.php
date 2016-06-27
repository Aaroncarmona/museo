<?php 
	class Tipo_empleado{
		private $id_temp;
		private $tipo_emp;

		public function getId_temp(){
			return $this->id_temp;
		}

		public function setId_temp($id_temp){
			$this->id_temp = $id_temp;
		}

		public function getTipo_emp(){
			return $this->tipo_emp;
		}

		public function setTipo_emp($tipo_emp){
			$this->tipo_emp = $tipo_emp;
		}
	}
?>