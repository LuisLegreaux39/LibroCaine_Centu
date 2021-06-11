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
	<div class="container">
	<div class="container" style="margin: 50px;">
	<h1 >Libros disponibles <span class="badge badge-primary">New</span></h1>
		<table class="table table-light">
			<thead>
				<tr>
					<th scope="col">Titulo</th>
					<th scope="col">Tipo</th>
					<th scope="col">Precio</th>
					<th scope="col">Notas</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$resultado = $bd->getTitulos();
					foreach ($resultado as $libros) {
						echo '<tr>';
						echo '<td>'.$libros['titulo'].'</td> <td>'.$libros['tipo'].'</td><td>'.$libros['precio'].'$</td> <td>'.$libros['notas'].'</td>';
                        echo '</tr>';
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
	<?php require('Componentes/jsFiles.html')?>
</body>

</html>