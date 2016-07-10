<?php 
	class Detalle_tipo_empleados{
		private $id_emp;
		private $id_temp;
		private $fecha;	

        public function getId_emp(){
            return $this->$id_emp;
        }

        public function getId_temp(){
            return $this->$id_temp;
        }

        public function setId_emp($id_emp){
            $this->id_emp = $id_emp;
        }

        public function setId_temp($id_temp){
            $this->id_temp = $id_temp;
        }
    }
?>