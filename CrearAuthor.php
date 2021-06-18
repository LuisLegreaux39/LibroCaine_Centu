
<html>

<head>
    <?php require_once('Componentes/MetaInfo.html'); ?>
</head>

<body>
	<?php require_once('Componentes/Nav.html'); ?>
	<section>
        <div class="container" >
            <div class="container" style="margin: 50px;">
            <h1 >Registrar Autor</h1>
            <?php require_once('Componentes/RegistrarAuthor.html');?>
            <?php 
                require("Modelos/autor_model.php");
                $autor = new AUTOR_MODEL();
                
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST)){
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
                        $autor->insertAutor(
                            $values
                        );
                        print_r("<div class='alert alert-success' role='alert'>
                                    Registro Guardado
                                </div>");
                    }
                }
            ?>
        </div>
    </section>
	<?php require('Componentes/jsFiles.html')?>
</body>

</html>