<?php 
	class Conexion{
		/*
			HOST : UBICACION DEL SERVIDOR
			USUARIO : NOMBRE DEL USUARIO EN MYSQL
			CONTRA : CONTRASEÑA DEL USUARIO EN MYSQL
			DATABASE : BASE DE DATOS A UTULIZAR
			CON : BASE DE DATOS
		*/
		private $host;
		private $usuario;
		private $contra;
		private $database;
		private $con;

		/*
			AL MOMENTO DE INSTANCIAR UN OBJETO, SE ASIGNARA
			EL HOST, USUARIO, CONTRASEÑA Y LA BASE DE DATOS A UTILIZAR.
		*/
		public function __construct(){
			$this->host = "localhost";
			$this->usuario = "root";
			$this->contra = "";
			$this->database = "museo";
		}
		
		/*
			CONECTAR()
			NOS PERMITIRA TENER ACCESO A LA BASE DE DATOS,
			TODOS LOS ELEMENTOS YA ESTAN CARGADOS DESDE EL CONSTRUCTOR
		*/
		public function conectar(){
			$this->con = mysqli_connect($this->host,$this->usuario,$this->contra,$this->database);
			if(!$this->con){
				$this->jsAlert("NO SE REALIZO LA CONEXION A LA BASE DE DATOS, SI EL PROBLEMA PERSITE CONSULTE CON EL ADMINISTRADOR");
			}
			return $this->con;
		}

		/*
			QUERY($QUERY)
			NOS PERMITE EJECUTAR UN COMANDO EN LA BASE DE DATOS,
			YA TIENE CARGADA LA CONEXION COMO PARAMETRO SOLO SE NECESITA
			EL CODIGO SQL.

			-> QUERY : NECESITA UN STRIG CON LA CONSULTA
			<- QUERY : REGRESA TRUE O MANDA UNA ALERTA DE ERROR DE EJECUCION
		*/
		public function query($query){
			$res = mysqli_query($this->con,$query);
			if($res){
				return $res;
			}else{
				?>
					<script>
						alert("Problemas al ejecutar la instruccion");		
					</script>
				<?php
			}
		}

		/*
			GET Y SET
			SE OBTIENE LA CONEXION
			SE MODIFICA
		*/
		public function getCon(){
			return $this->con;
		}

		public function setCon($con){
			$this->con = $con;
		}
		/*
			SE CIERRA LA CONEXION DE LA BASE DE DATOS
		*/
		public function desconectar(){
			mysqli_close($this->con);
		}

		/*
			PERMITE MANDAR MENSAJES DE JS
			->MSG : REQUIERE CUALQUIER TIPO DE NUMERO O CADENA
		*/
		public static function jsAlert($msg){
			echo "
				<script>
					alert('$msg');
				</script>

			";
		}
		/*
			PERMITE MOSTRAR UN MENSAJE Y SELECCIONAR
			->MSG : MENSAJE A MOSTRAR
			<-STATUS : REGRESA EL VALOR QUE SE SELECCIONO
		*/
		public static function jsConfirm($msg,$true,$false){
			
			echo '
				<script>
					var msg = confirm("'.$msg.'");
					if ( msg ){
						alert("'.$true.'");
					}else{
						alert("'.$false.'");
					}
				</script>

			';
			/*$estado = false;
			$script =
				'
					var con = confirm("'.$msg .'");
					if ( con == true ){
						document.write(true);
					}else{
						document.write(false);
					}
				';

			$estado = "
					<script>
					".$script."
					</script>
			";
			return $estado;*/
		}
		/*
			TAN SOLO ES UNA PRUEBA PARA VER SI PODEMOS HACER LAS CONSULTAS MAS RAPIDO
			Y SIN EQUIVOCARNOS
			IMITA A UN SELECT FROM
			>SELECT : CAMPOS DE LA CONSULTA A MOSTRAR
			->FROM : DE DONDE VIENEN LOS CAMPOS
			<-RETURN : REGRESA UN STRING CON LA CONSULTA
		*/
		public function selectFr($select,$from){
			return "SELECT {$select} FROM {$from}";
		}

		/*
			SE PUEDEN INGRESAR CLAPSULAS SEPARADAS POR COMAS
			->SELECT : CAMPOS DE LA CONSULTA A MOSTRAR
			->FROM : DE DONDE VIENEN LOS CAMPOS
			->WHERE : RECIVE UN STRING LA CUAL BUSCARA DONDE ESTA LA ,
						Y LA REMPLAZARA POR UN AND
			<-RETURN : REGRESA UN STRING CON LA CONSULTA CONSTRUIDA

		*/
		public function selectFrWh($select,$from,$where){

			
			while($posicion = strpos($where, ",")){
				$anterior = substr($where, 0 , $posicion);
				$despues = substr($where , $posicion+1 );
				$where = $anterior . " and " . $despues ;
			}

			return "SELECT {$select} FROM {$from} WHERE {$where}";
		}
/*
		public function selectFrInner($select,$from,$on){
			$ar = array();
			$ar[] = ( "on " . substr($on, 0 , strpos($on, ",")) );
			while($posicion = strpos($on, ",")){
				$anterior = substr($on, 0 , $posicion);
				$despues = substr($on , $posicion+1 );
				$ar[] = (" on " . $despues);
				$on = $anterior . $despues;
				
			}

			$posOn = 0;
			while($posicion = strpos($from, ",")){
				$anterior = substr($from, 0 , $posicion);
				$despues = substr($from , $posicion+1 );
				$from = $anterior . " inner join ( " . $despues . " " . $ar[$posOn]. ")";
				$posOn++;
			}
			
			return "SELECT {$select} FROM {$from}";
		}
*/
		/*
			CONSULTA DE UN INNER JOIN CON LA CLAPSULA WHERE
			->SELECT : SON LOS CAMPOS A MOSTRAR
			->FROM : DE DONDE VIENEN LOS CAMPOS
			->ON : HACER QUE LAS PRIMARIAS Y FORANEAS
					SEAN VALIDAS PARA EVIATAR EL PRODUCTO CARTESIANO
			->WHERE : DONDE VAN LAS VALIDACIONES
			<-RETURN : REGRESA UNA CADENA CON LA CONSULTA
		*/
		public function selectFrInnerWh($select,$from,$on,$where){

			while($posicion = strpos($where, ",")){
				$anterior = substr($where, 0 , $posicion);
				$despues = substr($where , $posicion+1 );
				$where = $anterior . " and " . $despues ;
			}
			return "SELECT {$select} FROM {$from} ON {$on} WHERE {$where}";
		}
	}

?>