<?php

	class CtrlSala{

		public function registrarSala($sala){
			$con = new Conexion();
			$con->conectar();

			$sql = "INSERT INTO SALAS(id_mus,nombre_sala,cuerpo_sala) VALUES(".
					$sala->getId_mus().
				",'".$sala->getNombre_sala().
				"','".$sala->getCuerpo_sala().
				"')";

			$val = $con->query($sql);
			if($val){
				/*?> <script>alert("Se agrego conectamente");</script> <?php*/
				return $val;
			}else{
				?><script>alert("Ya existe ese registro");</script><?php
			}

		}

		public function eliminarSala($sala){
			$con = new Conexion();
			$sql = "delete from SALAS where id_mus = ".$sala->getId_mus()." and id_sala = ".$sala->getId_sala().";";
			echo $sql;
			$con->conectar();

			$con->query($sql);
		}

		public function actualizarSala($sala){
			$con = new Conexion();
			$con->conectar();
			$sql = "";
			$sql .= ($sala->getNombre_sala() != "" ) ? "nombre_sala = '" . $sala->getNombre_sala() . "'," : "" ;
			$sql .= ($sala->getCuerpo_sala() != "" ) ? "cuerpo_sala = '" . $sala->getCuerpo_sala() . "'," : "" ;

			$sql = substr($sql , 0 , strlen($sql)-1);

			$sql = "UPDATE SALAS SET " . $sql . " WHERE id_mus = " . $sala->getId_mus() . " and id_sala = " . $sala->getId_sala();

			$con->query($sql);
		}

		public function listarSala($id){
			
			$con = new Conexion();
			$sala = null;

			$i = 0;
			
			$con->conectar();
			/*$sql = "SELECT  m.nombre_mus, s.nombre_sala , d.cuerpo FROM MUSEOS m INNER JOIN (SALAS s inner join DETALLE_MUS_SAL d ON d.id_sala = s.id_sala ) ON d.id_mus = m.id_mus WHERE m.id_mus =". $_REQUEST['id']. ";";*/
			
			$sql = "select id_sala,id_mus,nombre_sala,cuerpo_sala from SALAS where id_mus = " . $id .";";
			
			$lista = $con->query($sql);

			
			
			while($dato = mysqli_fetch_array($lista)){
				$sala[$i]= new Sala();
				$sala[$i]->iniciar($dato[1],$dato[2],$dato[3]);
				$sala[$i]->setId_sala($dato[0]);
				$i++;
			}
			return $sala;
		}

		public function listarSalaId($id,$id_sal){
			include("../../datos/Conexion.php");
			include("../../datos/Sala.php");
			
			$con = new Conexion();

			$i = 0;
			
			$con->conectar();
			/*$sql = "SELECT  m.nombre_mus, s.nombre_sala , d.cuerpo FROM MUSEOS m INNER JOIN (SALAS s inner join DETALLE_MUS_SAL d ON d.id_sala = s.id_sala ) ON d.id_mus = m.id_mus WHERE m.id_mus =". $_REQUEST['id']. ";";*/
			
			$sql = "select id_sala,id_mus,nombre_sala,cuerpo_sala from SALAS where id_mus = " . $id ." and id_sala = ".$id_sal.";";
			
			$dato = $con->query($sql);
			$dato = mysqli_fetch_array($dato);
			$sala = new Sala();
			
			$sala->iniciar($dato[1],$dato[2],$dato[3]);
			$sala->setId_sala($dato[0]);
			
			return $sala;
		}
	}
?>


<?php
if(isset($_REQUEST['btnReg'])){
	include("../datos/Sala.php");
	include("../datos/Conexion.php");

	$control = new CtrlSala();
	$sala = new Sala();
	
	$sala->iniciar(
		$_REQUEST['id'],
		$_REQUEST['nombreSal'],
		$_REQUEST['cuerpoSal']	
	);

	$status = $control->registrarSala($sala); //REGISTRAR

	if($status){
		?><script> window.location="../vista/administrador/gestionarSalas.php?id=<?php echo $sala->getId_mus(); ?>"; </script><?php
	}else{
		?><script> window.location="../vista/administrador/gestionarSalas.php?accion=a"; </script><?php
	}
}else if(isset($_REQUEST['bajaSala'])){
	include("../datos/Conexion.php");
	include("../datos/Sala.php");

	$control = new CtrlSala();
	$sala = new Sala();
	$sala->setId_sala($_REQUEST['idSal']);
	$sala->setId_mus($_REQUEST['id']);
	
	$control->eliminarSala($sala);

	?><script> window.location="../vista/administrador/gestionarSalas.php?id=<?php echo $sala->getId_mus(); ?>"; </script><?php
}else if(isset($_REQUEST['bajaSalaCan'])){
	include("../datos/Sala.php");
	$sala = new Sala();
	$sala->setId_sala($_REQUEST['idsal']);
	$sala->setId_mus($_REQUEST['id']);
	?><script> window.location="../vista/administrador/gestionarSalas.php?id=<?php echo $sala->getId_mus(); ?>"; </script><?php
}else if(isset($_REQUEST['modSala'])){
	include("../datos/Sala.php");
	include("../datos/Conexion.php");

	$control = new CtrlSala();
	$sala = new Sala();
	$sala->iniciar($_REQUEST['id'],$_REQUEST['nombreSal'],$_REQUEST['cuerpoSal']);
	$sala->setId_sala($_REQUEST['idsal']);
	$control->actualizarSala($sala);
	?><script> window.location="../vista/administrador/gestionarSalas.php?id=<?php echo $sala->getId_mus(); ?>"; </script><?php
}
?>