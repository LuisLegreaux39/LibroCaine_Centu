<?php 
    require_once(__DIR__.'/../libreria/DATA_BASE_MANAGER_CLASS.php');
    class TITULO_MODEL{
        // Atributos De la clase
        private $id_titulo = '';
        private $titulo = '';
        private $tipo = '';
        private $id_pub = '';
        private $precio = '';
        private $avance = '';
        private $total_ventas = '';
        private $notas = '';
        private $fechas_pub = '';
        private $contrato = '';
        // Objetos 
        private $keyTable = 'titulos';
        private $keyTableColumns=['id_titulo','titulo','tipo','precio','notas','autor'];
        function __construct(){
            try {
             $this->DB =  DATA_BASE_MANAGER::getInstance();
            } catch (\Throwable $th) {
                echo "Error initiating the AUTOR CLASS".$th;
            }
        }
        public function getAllTitulos(){
            return $this->DB->generalSelect($this->keyTable);
            
        }
        public function getTitulo($id){
            return $this->DB->getIdFromTable($this->keyTable,$id);
        }
        public function insertarTitulo($values){
            return $this->DB->insertRegisterOnTable(
                $this->keyTable,
                $this->keyTableColumns,
                $values
            );
        } 
        public function getTituloById($id){
            return $this->DB->getIdFromTable($this->keyTable,$id);
        }
        public function deleteTituloById($id){
            return $this->DB->deleteRegistro($this->keyTable,"id",$id);
        }
        public function updateTitulo($id,$values){
            return $this->DB->updateRegistro(
                $this->keyTable,
                $this->keyTableColumns,
                $values,
                $id
            );
        }
    }
// Fin de la clase

?>