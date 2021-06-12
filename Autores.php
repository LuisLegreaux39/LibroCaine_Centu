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
		<h1 >Autores disponibles <span class="badge badge-primary">New</span></h1>
		<a class="text-light" href="CrearAuthor.php">
			<button type="button" class="btn btn-info">
				Crear Author
			</button>
			</a>
		<table class="table table-light">
			<thead>
				<tr>
					<th scope="col">Nombre</th>
					<th scope="col">Apellido</th>
					<th scope="col">Telefono</th>
					<th scope="col">Ciudad</th>
					<th scope="col">Direccion</th>
					<th scope="col">Accion</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$resultado = $bd->getAutores();
					// print_r(gettype($resultado));
					foreach ($resultado as $autor) {
						printf('<tr>');
						printf('<td>'.$autor['nombre'].'</td>'.'<td>'. $autor['apellido'].'</td>'.'<td>'.$autor['telefono'].'</td>'
						.'<td>'.$autor['ciudad'].'</td>'.'<td>'.$autor['direccion'].'</td>');
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
				</section>
	<?php require('Componentes/jsFiles.html')?>
</body>

</html>