<?php
 
 class Empleado {
	private $nombre;
    private $apellido;
    private $edad;
	public $sueldo;

    public function getNombre() {
	   return $this->nombre;	
	}	

	public function getApellido() {
	   return $this->apellido;	
	}	
	/* */
	public function setNombre($dato) {
	   $this->nombre = $dato;	
	}	
	 
	 
 } // Fin de la clase
?> 