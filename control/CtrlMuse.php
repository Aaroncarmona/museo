<?php 

	class CtrlMuse{

		public function registrarMuseo($imagen,$nombre,$desc,$del,$dir,$precio){

			$con = new Conexion();
			$con->conectar();

			$sql = "insert into MUSEOS(imagen_mus,nombre_mus,desc_mus,id_del,dir_mus,precio_mus) values('$imagen','$nombre','$desc','$del','$dir',$precio);";
		
			$val = $con->query($sql);

			if($val){
				return $val;
			}else{
				?><script>alert("Ya existe ese registro");</script><?php
			}
		}

		public function listarMuseo(){
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
			$con = new Conexion();
			$con->conectar();
			$sql = 'select m.id_mus, m.imagen_mus, m.nombre_mus, d.delegacion, m.precio_mus, m.desc_mus,m.id_del,m.dir_mus from MUSEOS m inner join DELEGACIONES d on d.id_del = m.id_del where m.id_mus = ' . $id;
			$list = $con->query($sql);

			$dato = mysqli_fetch_array($list);
			
			$datos = array($dato[0],$dato[1],$dato[2],$dato[3],$dato[4],$dato[5],$dato[6],$dato[7]);
			
			return $datos;
		}

		public function listarMuseoNombre($nombre){
			$con = new Conexion();
			$i = 0;
			$con->conectar();
			$datos = array();

			$sql = "select m.id_mus, m.imagen_mus, m.nombre_mus, d.delegacion, m.precio_mus, m.desc_mus,m.id_del,m.dir_mus from MUSEOS m inner join DELEGACIONES d on d.id_del = m.id_del where m.nombre_mus like '%" . $nombre . "%'";

			$list = $con->query($sql);

			while($dato = mysqli_fetch_array($list)){
				$datos[$i] = array($dato[0],$dato[1],$dato[2],$dato[3],$dato[4],$dato[5]);
				$i++;
			}

			if($datos){
				return $datos;
			}
		}

		public function listarMuseoDelegacion($delegacion){
			$con = new Conexion();
			$i = 0;
			$con->conectar();
			$datos = array();

			$sql = "select m.id_mus, m.imagen_mus, m.nombre_mus, d.delegacion, m.precio_mus, m.desc_mus,m.id_del,m.dir_mus from MUSEOS m inner join DELEGACIONES d on d.id_del = m.id_del where d.id_del =" . $delegacion;

			$list = $con->query($sql);

			while($dato = mysqli_fetch_array($list)){
				$datos[$i] = array($dato[0],$dato[1],$dato[2],$dato[3],$dato[4],$dato[5]);
				$i++;
			}

			if($datos){
				return $datos;
			}
		}

		
		public function listarDelegaciones(){
			$con = new Conexion();
			$con->conectar();
			$sql = "select id_del,delegacion from DELEGACIONES";
			$list = $con->query($sql);
			return $list;
		}

		public function eliminarMuseo($id){
			$con = new Conexion();
			
			$sqlSala = "delete from SALAS where id_mus = " . $id;
			$sqlMuseo = "delete from MUSEOS where id_mus = " . $id;

			$con->conectar();
			
			$estadoSala = $con->query($sqlSala);
			$estadoMuseo = $con->query($sqlMuseo);

			if($estadoSala && $estadoMuseo){

			}else{
				?><script>alert("Error al momento de eliminar, favor de intentarlo de nuevo");</script><?php
			}
		}

		public function actualizarMuseo($id,$imagen,$nombre,$desc,$del,$dir,$precio){
			$con = new Conexion();
			$con->conectar();

			$msg = "SET ";
			$msg .= ($imagen !== "" ) ? "imagen_mus = '$imagen'," : "" ;
			$msg .= ($nombre !== "" ) ? "nombre_mus = '$nombre'," : "" ;
			$msg .= ($desc !== "" ) ? "desc_mus = '$desc'," : "" ;
			$msg .= ($del !== "" ) ? "id_del = $del," : "" ;
			$msg .= ($dir !== "" ) ? "dir_mus = '$dir'," : "" ;
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


<?php
	if (isset($_REQUEST['regMuseo'])) {
		include("../datos/Conexion.php");
		include("../datos/Museo.php");
		include("../datos/Sala.php");
		include("../datos/Delegacion.php");

		$museo = new Museo();
		$delegacion = new Delegacion();

		$controlMuseo = new CtrlMuse();
		
		$delegacion->setId_del($_REQUEST['delegaciones']);

		$museo->iniciar(
			$delegacion->getId_del(),
			$_REQUEST['img'],
			$_REQUEST['nombre'],
			$_REQUEST['desc'],
			$_REQUEST['dir'],
			$_REQUEST['precio']
		);

		
		$controlMuseo->registrarMuseo($museo->getImagen_mus(),$museo->getNombre_mus(),$museo->getDesc_mus(),$museo->getId_del(),$museo->getDir_mus(),$museo->getPrecio_mus());

		?><script>
			window.location="../vista/administrador/gestionarMuseos.php";
		</script><?php

	}else if(isset($_REQUEST['bajaMuseo'])){
		include("../datos/Conexion.php");
		include("../datos/Museo.php");

		$ctrMuseo = new CtrlMuse();
		$museo = new Museo();

		$museo->setId_mus($_REQUEST['id']);
		
		$ctrMuseo->eliminarMuseo($museo->getId_mus());

		?><script> window.location="../vista/administrador/gestionarMuseos.php?>"; </script><?php
	}else if(isset($_REQUEST['bajaMuseoCan'])){
		?><script> window.location="../vista/administrador/gestionarMuseos.php?>"; </script><?php
	}else if(isset($_REQUEST['modMuseo'])){
		include("../datos/Museo.php");
		include("../datos/Conexion.php");

		$ctrlMuseo = new CtrlMuse();

		$museo = new Museo();
		$museo->iniciar(
			$_REQUEST['delegaciones'],
			$_REQUEST['img'],
			$_REQUEST['nombre'],
			$_REQUEST['desc'],
			$_REQUEST['dir'],
			$_REQUEST['precio']
			);

		$museo->setId_mus($_REQUEST['id']);

		$estado = $ctrlMuseo->actualizarMuseo(
			$museo->getId_mus(),
			$museo->getImagen_mus(),
			$museo->getNombre_mus(),
			$museo->getDesc_mus(),
			$museo->getId_del(),
			$museo->getDir_mus(),
			$museo->getPrecio_mus());

		if ($estado) {
			?><script> window.location="../vista/administrador/gestionarMuseos.php"; </script><?php	
		}else{
			?><script> 
			alert("UNO O ALGUNOS CAMPOS ESTAN INCORRECTOS, LLEVA DE FORMA CORRECTA EL FORMULARIO");
			window.location="../vista/administrador/gestionarMuseos.php?accion=m&id=<?php echo $museo->getId_mus() ; ?>"; </script><?php
		}
	}
?>