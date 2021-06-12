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
            <h1 >Registrar Titulo</h1>
            <?php require_once('Componentes/RegistrarTitulo.html');?>
            <?php 
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST)){
                        $titulo = $_POST['titulo'];
                        $id = $_POST['id'];
                        $tipo = $_POST['tipo'];
                        $precio = $_POST['precio'];
                        $notas = $_POST['notas'];
                        $bd->insertTitulo(
                            $id,
                            $titulo,
                            $tipo,
                            $precio,
                            $notas
                        );
                        // print_r($titulo);
                        // print_r($id);
                        // print_r($tipo);
                        // print_r($precio);
                        // print_r($notas);
                    }
                }
            ?>
        </div>
    </section>
	<?php require('Componentes/jsFiles.html')?>
</body>

</html>