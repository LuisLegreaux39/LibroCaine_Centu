<?php 
    require_once(__DIR__.'/../libreria/DATA_BASE_MANAGER_CLASS.php');
    class AUTOR_MODEL{
        // Atributos De la clase
        private $id_autor = "";
        private $apellido = "";
        private $nombre = "";
        private $telefono = "";
        private $direccion = "";
        private $ciudad = "";
        private $estado ="";
        private $pais = "";
        private $cod_postal = "";
        // Objetos 
        private $keyTable = 'autores';
        private $keyTableColumns = ['nombre','apellido','telefono','direccion','ciudad'];
        
        function __construct(){
           try {
            $this->DB = DATA_BASE_MANAGER::getInstance();
           } catch (\Throwable $th) {
               echo "Error initiating the AUTOR CLASS".$th;
           }
        }

        public function getAllAutores(){
            return $this->DB->generalSelect($this->keyTable);
        }
        public function getAutor($id){
            return $this->DB->getIdFromTable($this->keyTable,$id);
        }
        public function insertAutor($values){
            return $this->DB->insertRegisterOnTable(
                $this->keyTable,
                $this->keyTableColumns,
                $values);
        } 
        public function getAutorById($id){
            return $this->DB->getIdFromTable($this->keyTable,$id);
        }
        public function deleteAutorById($id){
            return $this->DB->deleteRegistro($this->keyTable,"id",$id);
        }
        public function updateAutor($id,$values){
            return $this->DB->updateRegistro(
                $this->keyTable,
                $this->keyTableColumns,
                $values,
                $id);
        }
        public function getAllAutoresNamesAndId(){
            $columns = ["nombre","id"];
            return $this->DB->getRegistrosFromColumnaEspecifica(
                $this->keyTable,
                $columns
            );
        }
    // Fin de la clase

    }
?>