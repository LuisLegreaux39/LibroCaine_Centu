<html>
    <head>
        <?php require_once('Componentes/MetaInfo.html'); ?>
    </head>
<body>
	<?php require_once('Componentes/Nav.html'); ?>
	<section>
        <div class="container" >
            <div class="container" style="margin: 50px;">
            <h1 >Registrar Titulo</h1>
            <?php require_once('Componentes/RegistrarTitulo.html');?>
            <?php 
                    require("Modelos/titulos_model.php");
                    $libro = new TITULO_MODEL();
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST)){
                        $titulo = $_POST['titulo'];
                        $id = $_POST['id'];
                        $tipo = $_POST['tipo'];
                        $precio = $_POST['precio'];
                        $notas = $_POST['notas'];
                        $values = [
                            $id,
                            $titulo,
                            $tipo,
                            $precio,
                            $notas
                        ];
                        $libro->insertarTitulo($values);
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