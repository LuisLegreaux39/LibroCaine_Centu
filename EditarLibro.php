<html>

    <head>
         <?php require_once('Componentes/MetaInfo.html'); ?>
    </head>

<body>
	<?php require_once('Componentes/Nav.html'); ?>
	<section>
        <div class="container" >
            <div class="container" style="margin: 50px;">
            <h1 >Editar Titulo</h1>
            <?php 
                require("Modelos/titulos_model.php");
                $libro = new TITULO_MODEL();
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST)){
                        $id = $_POST['btn_edit'];
                        $titulo = $_POST['titulo'];
                        $tipo = $_POST['tipo'];
                        $precio = $_POST['precio'];
                        $notas = $_POST['notas'];
                        $autor = $_POST['autor'];
                        $values = [
                            $id,
                            $titulo,
                            $tipo,
                            $precio,
                            $notas,
                            $autor
                        ];
                        $libro->updateTitulo(
                            $id,
                            $values 
                        );
                        print_r("
                        <div class='alert alert-success' role='alert'>
                           Registro editado
                        </div>");
                    }
                }                
                if($_SERVER["REQUEST_METHOD"] == "GET"){
                    if(isset($_GET)){
                        $id = $_GET['btn_edit'];
                        $titulo = $libro->getTituloById($id);
                        foreach($titulo as $row){
                            print_r("<form action='EditarLibro.php' method='post'>
                                <div class='mb-3'>
                                    <label for='exampleFormControlInput1' class='form-label'>Titulo</label>
                                    <input type='text' value='".$row['titulo']."' name='titulo' class='form-control' placeholder='Insertar Nombre de la obra'>
                                </div>
                                <div class='mb-3'>
                                    <label for='exampleFormControlInput1' class='form-label'>ID titulo</label>
                                    <input type='text'  value='".$row['id_titulo']."' name='id' class='form-control' placeholder='Insertar el ID de la obra'>
                                </div>
                                <div class='mb-3'>
                                    <label for='exampleFormControlInput1' class='form-label'>Tipo</label>
                                    <input type='text' value='".$row['tipo']."' name='tipo' class='form-control' placeholder='Insertar el ID de la obra'>
                                </div>
                                <div class='mb-3'>
                                    <label class='form-label'>Precio</label>
                                    <input type='number' value='".$row['precio']."' name='precio' min='0' class='form-control' placeholder='Insertar Nombre de autor'>
                                </div>
                                <div class='mb-3'>
                                <label class='form-label'>Autor</label>
                                <input type='text' value='".$row['autor']."' name='autor' min='0' class='form-control' placeholder='Insertar Nombre de autor'>
                            </div>
                                <div class='mb-3'>
                                    <label for='exampleFormControlInput1' class='form-label'>Notas</label>
                                    <textarea type='text' name='notas' class='form-control mb-5' style='height: 800px;'
                                        placeholder='Insertar una reseña de la obra'>".$row['notas']."</textarea>
                                </div>
                                <button type='submit' name='btn_edit' value='$id' class='btn btn-info'>Actualizar</button>
                            </form>");
                        }
                    }
                }
            ?>
        </div>
    </section>
	<?php require('Componentes/jsFiles.html')?>
</body>

</html>