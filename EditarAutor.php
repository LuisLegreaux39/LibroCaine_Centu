<?php
require("libreria/Crud.php");
?>
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
                $bd = new Crud();
            
                if($_SERVER["REQUEST_METHOD"] == "GET"){
                    if(isset($_GET)){
                        $id = $_GET['btn_edit'];
                        $autor = $bd->getAuthorByID($id);
                        foreach($autor as $row){
                            print_r("
                                <form action='EditarAutor.php' method='post'>
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
                                <button type='submit' class='btn btn-info'>Actualizar</button>
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