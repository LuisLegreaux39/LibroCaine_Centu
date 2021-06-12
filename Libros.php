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
	<div class="container">
	<div class="container" style="margin: 50px;">
	<h1 >Libros disponibles <span class="badge badge-primary">New</span></h1>
	<a class="text-light" href="CrearAuthor.php">
			<button type="button" class="btn btn-info">
				Crear Titulo
			</button>
			</a>
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