<?php 
	class CtrlMuse{

		public function listarMuseo(){
			include("datos/Museo.php");
			$con = new Conexion();
			$i = 0;
			$con->conectar();
			$sql = 'select m.id_mus, m.imagen_mus, m.nombre_mus, d.delegacion, m.precio_mus, m.desc_mus from MUSEOS m inner join DELEGACIONES d on d.id_del = m.id_del';
			$list = $con->query($sql);

			while($dato = mysqli_fetch_array($list)){
				$datos[$i] = array($dato[0],$dato[1],$dato[2],$dato[3],$dato[4],$dato[5]);
				$i++;
			}
			return $datos;
		}

		public function listarMuseoId($id){
			include("../datos/Museo.php");
			$con = new Conexion();
			$con->conectar();
			$sql = 'select m.id_mus, m.imagen_mus, m.nombre_mus, d.delegacion, m.precio_mus, m.desc_mus from MUSEOS m inner join DELEGACIONES d on d.id_del = m.id_del where m.id_mus = ' . $id;
			$list = $con->query($sql);

			$dato = mysqli_fetch_array($list);
			
			$datos = array($dato[0],$dato[1],$dato[2],$dato[3],$dato[4],$dato[5]);
			
			return $datos;
		}

	}
?>