<?php
require("libreria/Crud.php");
?>
<html>

<head>
<?php require_once('Componentes/MetaInfo.html'); ?>
</head>

<body>
	<?php require_once('Componentes/Nav.html'); ?>
	<?php 
        $bd = new Crud();
	?>
	<section>
        <div class="container" >
            <div class="container" style="margin: 50px;">
            <h1 >Editar Titulo</h1>
            <?php 
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST)){
                        $id = $_POST['btn_edit'];
                        $titulo = $bd->getTitulosByID($id);
                        foreach($titulo as $row){
                            print_r("<form action='CrearTitulo.php' method='post'>
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
                                    <label for='exampleFormControlInput1' class='form-label'>Notas</label>
                                    <textarea type='text' name='notas' class='form-control mb-5' style='height: 800px;'
                                        placeholder='Insertar una reseña de la obra'>".$row['notas']."</textarea>
                                </div>
                                <button type='submit' class='btn btn-info'>Actualizar</button>
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