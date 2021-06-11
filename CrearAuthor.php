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
            <h1 >Registrar Author</h1>
            
        </div>
    </section>
	<?php require('Componentes/jsFiles.html')?>
</body>

</html>