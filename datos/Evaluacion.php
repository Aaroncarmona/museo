<?php 
	class Evaluacion{
		private $id_ev;
		private $id_tvis;
		private $id_est;
		private $id_mus;
		private $puntaje_ev;
		private $opinion_ev;
		private $sexo;

		public function iniciar($id_ev,$id_tvis,$id_est,$id_mus,$puntaje_ev,$opinion_ev,$sexo){
			$this->id_ev = $id_ev;
			$this->id_tvis = $id_tvis;
			$this->id_est = $id_est;
			$this->id_mus = $id_mus;
			$this->puntaje_ev = $puntaje_ev;
			$this->opinion_ev = $opinion_ev;
			$this->sexo = $sexo;
		}

		public function getId_ev(){
			return $this->id_ev;
		}

		public function getId_tvis(){
			return $this->id_tvis;
		}

		public function getId_est(){
			return $this->id_est;
		}

		public function getId_mus(){
			return $this->id_mus;
		}

		public function getPuntaje_ev(){
			return $this->puntaje_ev;
		}

		public function getOpinion_ev(){
			return $this->opinion_ev;
		}

		public function getSexo(){
			return $this->sexo;
		}

		public function setId_ev($id_ev){
			$this->id_ev=$id_ev;
		}

		public function setId_tvis($id_tvis){
			$this->id_tvis=$id_tvis;
		}

		public function setId_est($id_est){
			$this->id_est=$id_est;
		}

		public function setId_mus($id_mus){
			$this->id_mus=$id_mus;
		}

		public function setPuntaje_ev($puntaje_ev){
			$this->puntaje_ev=$puntaje_ev;
		}

		public function setOpinion_ev($opinion_ev){
			$this->opinion_ev=$opinion_ev;
		}

		public function setSexo($sexo){
			$this->sexo=$sexo;
		}
	}
?>