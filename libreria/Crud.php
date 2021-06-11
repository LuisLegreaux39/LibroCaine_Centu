<?php
 
 class Crud {
	private $servidor = "localhost";
	private $baseDatos = "lib";
	private $usuario = "root";
	private $clave = "";

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