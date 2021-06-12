<?php
	//Leyendo Archivo de configuracion
	$jsonStream = file_get_contents(__DIR__.'/config.json');
	$config = json_decode($jsonStream);

	//Inicio de la clase
	class Crud {

		private $servidor ='';
		private $baseDatos = '';
		private $usuario = '';
		private $clave = '';

		function __construct(){
			$this->servidor=$GLOBALS['config']->Server;
			$this->baseDatos = $GLOBALS['config']->BD;
			$this->usuario = $GLOBALS['config']->User;
			$this->clave = $GLOBALS['config']->Clave;
		}

		private function getConexion(){
			// // PDO
			try {
			$con = new PDO("mysql:host=$this->servidor;dbname=$this->baseDatos", $this->usuario, $this->clave);
			} catch(PDOException $e) {
				echo "Did not find database";
				echo __LINE__.$e->getMessage();
			}
			
		return $con;	
		}	

	

		public function getTiendas() {
			$conx = $this->getConexion();
			if ( is_object($conx) ) {
			$sql = "SELECT * FROM tiendas";	
			$data = $conx->query($sql);		   
			}
				
			return $data;
		}

		public function getAutores() {
			$conx = $this->getConexion();
			if ( is_object($conx) ) {
			$sql = "SELECT * FROM autores";	
			$data = $conx->query($sql);		   
			}
				
			return $data;
		}
		public function insertAutor($id,$apellido,$nombre,$telefono,$direccion,$ciudad){
			$conx = $this->getConexion();
			if ( is_object($conx) ) {
			$sql = "INSERT INTO autores VALUES ('$id','$apellido','$nombre','$telefono','$direccion','$ciudad','*','*',023)";	
			print_r($sql);
			$data = $conx->query($sql);		   
			}
		}


		public function getTitulos() {
			$conx = $this->getConexion();
			if ( is_object($conx) ) {
			$sql = "SELECT * FROM titulos";	
			$data = $conx->query($sql);		   
			}
				
			return $data;
		}
		public function getBiografias() {
			$conx = $this->getConexion();
			if ( is_object($conx) ) {
			$sql = "SELECT * from biografias join autores where biografias.id_autor = autores.id_autor";	
			$data = $conx->query($sql);		   
			}
				
			return $data;
		}
		
		
	} // Fin de la clase
?> 