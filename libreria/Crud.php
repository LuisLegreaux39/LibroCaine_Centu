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

	
		//Operaciones Autores	
		public function getAuthorByID($idAutor){

			$conx = $this->getConexion();
			
			if(is_object($conx)){

				$sql = "SELECT nombre,apellido,ciudad,telefono,direccion FROM autores WHERE id=$idAutor";

				$data = $conx->query($sql);

			}
			return $data;
		}
		public function getAutores() {
			$conx = $this->getConexion();
			if (is_object($conx) ) {

				$sql = "SELECT * FROM autores";	

				$data = $conx->query($sql);	

			}
			return $data;
		}
		public function insertAutor($id,$apellido,$nombre,$telefono,$direccion,$ciudad){
			$conx = $this->getConexion();
			if ( is_object($conx) ) {
			// $sql = "INSERT INTO autores VALUES ('$id','$apellido','$nombre','$telefono','$direccion','$ciudad','*','*',023)";
			$sql = "INSERT INTO autores(id_autor,apellido,nombre,telefono,direccion,ciudad,estado,pais,cod_postal) 
				VALUES ('$id','$apellido','$nombre','$telefono','$direccion','$ciudad','*','*',023)";
			$data = $conx->query($sql);		   
			}
		}

		public function deleteAutor($id){

			$conx = $this->getConexion();
			if ( is_object($conx) ) {

				$sql = "DELETE FROM autores WHERE id=$id";	

				$data = $conx->query($sql);	 

			}
		}
		public function updateAuthor($id,$nombre,$apellido,$telefono,$direccion,$ciudad){
			$conx = $this->getConexion();
			if(is_object($conx)){
				$sql = "UPDATE autores SET autores.nombre='$nombre',autores.apellido='$apellido', 
				autores.telefono='$telefono',autores.ciudad='$ciudad', 
				autores.direccion ='$direccion' WHERE id=$id";
				// print_r($sql);
				$data = $conx->query($sql);
			}
			return $data;
		}

		//******************************* */ 
		//Operaciones Titulos
		public function getTitulosByID($idTitulo){

			$conx = $this->getConexion();
			
			if(is_object($conx)){

				$sql ="SELECT titulo,tipo,id_titulo,precio,notas FROM titulos WHERE id=$idTitulo";
				// print_r($sql);
				$data = $conx->query($sql);

			}
			return $data;
		}
		public function getTitulos() {
			$conx = $this->getConexion();
			if ( is_object($conx) ) {
				$sql = "SELECT * FROM titulos";	
				$data = $conx->query($sql);		   
			}
				
			return $data;
		}
		public function insertTitulo($id,$titulo,$tipo,$precio,$notas){
			$conx = $this->getConexion();
			if ( is_object($conx) ) {
				$sql = "INSERT INTO titulos(id_titulo,titulo,tipo,precio,notas)
					VALUES ('$id','$titulo','$tipo','$precio','$notas')";	
				// print_r($sql);
				$data = $conx->query($sql);		   
			}
		}

		public function updateTitulo($id,$titulo,$tipo,$precio,$notas){
			$conx = $this->getConexion();
			if(is_object($conx)){
				$sql =  "UPDATE titulos as T SET T.titulo = '$titulo',T.tipo='$tipo',T.precio =$precio,T.notas='$notas' WHERE id=$id";
				// print_r($sql);
				$conx->query($sql);
			}
		}
		public function deleteTitulos($id){

			
			$conx = $this->getConexion();

			$sql = "DELETE FROM titulos WHERE id=$id";

			$data = $conx->query($sql);	

		}
		//******************************* */ 
		
	} // Fin de la clase
?> 