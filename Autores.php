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

	// Creando mi primer objeto
	/* $objContabilidad = new Empleado();
	   
	   // otro objeto
	       $objMercadeo = new Empleado();
	   
	   $objContabilidad->setNombre("Jose");
	       $objMercadeo->setNombre("Teresa"); 
		   
		   //$objMercadeo->nombre = "No me importa";
		   
		  echo "Hola ". $objContabilidad->getNombre();
		   
		   echo "<br> su ayudante será ". $objMercadeo->getNombre();
	   */

	// Probando conexion
	$bd = new Crud();

	//$res = $bd->getConexion();
	//var_dump($res);

	// Mostrar todas las tiendas

	//  var_dump($resultado);

	// mostrando datos
	// $resultado = $bd->getAutores();
	// foreach ($resultado as $campo) {
	// 	//    printf('<br><a href="#">%s</a>  ---> %s', $campo["nombre_tienda"], $campo["ciudad"]);
	// 	//echo "<br>";
	// }
	?>
	<section>
	<div class="container" >
		<div class="container" style="margin: 50px;">
		<h1 >Autores disponibles <span class="badge badge-primary">New</span></h1>
		<table class="table table-light">
			<thead>
				<tr>
					<th scope="col">Nombre</th>
					<th scope="col">Apellido</th>
					<th scope="col">Telefono</th>
					<th scope="col">Ciudad</th>
					<th scope="col">Direccion</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$resultado = $bd->getAutores();
					// print_r(gettype($resultado));
					foreach ($resultado as $autor) {
						printf('<tr>');
						printf('<td>'.$autor['nombre'].'</td>'.'<td>'. $autor['apellido'].'</td>'.'<td>'.$autor['telefono'].'</td>'.'<td>'.$autor['ciudad'].'</td>'.'<td>'.$autor['direccion'].'</td>');
						printf('</tr>');
					}
					?>
				<!-- <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr> -->
			</tbody>
		</table>
		</div>
	</div>
	</section
	<?php require('Componentes/jsFiles.html')?>
</body>

</html>