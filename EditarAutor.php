<html>
    <head>
        <?php require_once('Componentes/MetaInfo.html'); ?>
    </head>
<body>
	<?php require_once('Componentes/Nav.html'); ?>
	<section>
        <div class="container" >
            <div class="container" style="margin: 50px;">
            <h1 >Editar autor</h1>
            <?php 
                require("Modelos/autor_model.php");
                $autor = new AUTOR_MODEL();
                
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_POST)){
                        $id = $_POST['btn_Actualizar'];
                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $telefono = $_POST['telefono'];
                        $ciudad = $_POST['ciudad'];
                        $direccion = $_POST['direccion'];
                        $values = [
                            $nombre,
                            $apellido,
                            $telefono,
                            $direccion,
                            $ciudad
                        ];
                        // print_r($values);
                        $autor->updateAutor($id,$values);
                        // $bd->updateAuthor(
                        //     $id,
                        //     $nombre,
                        //     $apellido,
                        //     $telefono,
                        //     $direccion,
                        //     $ciudad
                        // );
                        print_r("
                            <div class='alert alert-success' role='alert'>
                               Registro editado
                            </div>");
                    }
                }
            
                if($_SERVER["REQUEST_METHOD"] == "GET"){
                    if(isset($_GET)){
                        $id = $_GET['btn_edit'];
                        $autores = $autor->getAutorById($id);
                        foreach($autores as $row){
                            print_r("
                                <form action='EditarAutor.php' method='POST'>
                                    <div class='mb-3'>
                                        <label for='exampleFormControlInput1' class='form-label'>Nombre</label>
                                        <input type='text' value='".$row['nombre']."'  name='nombre' class='form-control' placeholder='Insertar Nombre de autor'>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='exampleFormControlInput1' class='form-label'>Apellido</label>
                                        <input type='text' value='".$row['apellido']."' name='apellido' class='form-control' placeholder='Insertar Apellido de autor'>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='exampleFormControlInput1' class='form-label'>Telefono</label>
                                        <input type='text' value='".$row['telefono']."' name='telefono' class='form-control' placeholder='Insertar telefono de autor'>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='exampleFormControlInput1' class='form-label'>Ciudad</label>
                                        <input type='text' value='".$row['ciudad']."' name='ciudad' class='form-control' placeholder='Insertar Apellido de autor'>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='exampleFormControlInput1' class='form-label'>Dirección</label>
                                        <input type='text' value='".$row['direccion']."' name='direccion' class='form-control' placeholder='Insertar dirección de autor'>
                                    </div>
                                    <button type='submit' name='btn_Actualizar' value='".$id."' class='btn btn-info'>Actualizar</button>
                            </form>
                            ");
                        }
                    }
                }
            ?>  
        </div>
    </section>
	<?php require('Componentes/jsFiles.html')?>
</body>

</html>