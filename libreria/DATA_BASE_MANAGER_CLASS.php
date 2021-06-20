<?php
	//Leyendo Archivo de configuracion
	$jsonStream = file_get_contents(__DIR__.'/config.json');
	$config = json_decode($jsonStream);

	//Inicio de la clase
	class DATA_BASE_MANAGER {
		private $servidor ='';
		private $baseDatos = '';
		private $usuario = '';
		private $clave = '';
		private static $classCentinel;

		private function __construct(){
			$this->servidor=$GLOBALS['config']->Server;
			$this->baseDatos = $GLOBALS['config']->BD;
			$this->usuario = $GLOBALS['config']->User;
			$this->clave = $GLOBALS['config']->Clave;
		}
		public static function getInstance(){
			if(!isset(self::$classCentinel)){
				self::$classCentinel = new DATA_BASE_MANAGER();
			}
			return self::$classCentinel;
		}
		// Public Functions

		public function getConexion(){
			// // PDO
			try {
                $con = new PDO("mysql:host=$this->servidor;dbname=$this->baseDatos", $this->usuario, $this->clave);
			} catch(PDOException $e) {
				echo "Did not find database";
				echo __LINE__.$e->getMessage();
			}
			return $con;	
		}	

		public function generalSelect($table){	
			try {
				$conx = $this->getConexion();
				if(is_object($conx)){
					$sql = "SELECT * FROM $table";
					$data =  $conx->query($sql);
					
				}
				return $data->fetchAll();

			} catch (\Throwable $th) {
				return [];
			}
		}

		public function getIdFromTable($table,$id){

			$conx = $this->getConexion();
			if(is_object($conx)){
				$sql = "SELECT * FROM $table WHERE id=$id";
				// print_r($sql);
				$data =  $conx->query($sql);
				
			}
			return $data->fetchAll();
		}


		public function insertRegisterOnTable($table,$fields,$values){
			$conx = $this->getConexion();
			try {
				$fieldsForSql = implode(",",$fields);
				$valuesFields = $this->handleValueTypes($values);
				if(is_object($conx)){
					$sql = "INSERT INTO $table($fieldsForSql) VALUES ($valuesFields)";
					$conx->query($sql);
				}
				return true;
			} catch (\Throwable $th) {

				return false;

			}
		}


		public function deleteRegistro($table,$field,$fieldValue){
			$conx = $this->getConexion();
			try {

				if(is_object($conx)){
					$sql = "DELETE FROM $table WHERE $field=$fieldValue ";	
					$conx->query($sql);
				}
				return true;

			} catch (\Throwable $th) {

				return false;

			}
		}

		public function updateRegistro($table,$field,$fieldValue,$id){
			 $build = $this->handleRelationForUpdate($field,$fieldValue);
		
			$conx = $this->getConexion();
			if(is_object($conx)){
				$sql =  "UPDATE $table SET ".$build." WHERE id=$id";
				$conx->query($sql);
			}
		}

		public function getRegistrosFromColumnaEspecifica($table,$columns){
			$builds='';
			if(count($columns) > 1){
				$builds = implode(",",$columns);
			}else{
				$builds = implode("",$columns);
			}
			$conx = $this->getConexion();
			if(is_object($conx)){
				$sql = "SELECT $builds FROM $table";
				// print_r($sql);
				$data =  $conx->query($sql);
				
			}
			return $data->fetchAll();
		}

		// Privates Methods
		private function handleValueTypes($arr){
			$build='';
			foreach($arr as $element){

				if(is_numeric($element)){
					$build=$build.$element.","; 
				}else{
					$build=$build."'".$element."',"; 
				}
			}
			return rtrim($build,",");
		}

		private function handleRelationForUpdate($arr,$arr2){
			$size = count($arr);
			$build='';
			for ($i=0; $i < $size ; $i++) { 
				$build=$build.$arr[$i]." = ";
				if(is_numeric($arr2[$i])){
					$build=$build.$arr2[$i].',';
				}else{
					$build = $build."'".$arr2[$i]."',";
				}
			}
			return rtrim($build,",");
		}

	} // Fin de la clase 
?> 