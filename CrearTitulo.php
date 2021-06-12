<?php
require("libreria/Empleado.php");
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
                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $telefono = $_POST['telefono'];
                        $ciudad = $_POST['ciudad'];
                        $direccion = $_POST['direccion'];
                        // print_r($nombre);
                        // print_r($apellido);
                        // print_r($telefono);
                        // print_r($ciudad);
                        // print_r($direccion);


                    }
                }
            ?>
        </div>
    </section>
	<?php require('Componentes/jsFiles.html')?>
</body>

</html>