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
	<div class="container">
	<div class="container" style="margin: 50px;">
	<h1 >Libros disponibles <span class="badge badge-primary">New</span></h1>
	<a class="text-light" href="CrearTitulo.php">
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
						echo '<td>'.$libros['titulo'].'</td> <td>'.$libros['tipo'].'</td><td>'.$libros['precio'].
						'$</td> <td>'.$libros['notas'].'</td>'."<td>'<form action='Autores.php' method='POST'>
							<button type='submit' class='btn btn-warning' value=".$libros['id']."  name='btn_delete'>Delete</button>
						</form></td>";
                        echo '</tr>';
					}
					?>
				<?php 
						if($_SERVER["REQUEST_METHOD"]=='POST'){
							if(isset($_POST['btn_delete'])){
								$id = $_POST['btn_delete'];
								$bd->deleteAutor($id);
								echo "<meta http-equiv='refresh' content='0'>";
							}
						}
					?>
			</tbody>
		</table>
	</div>
	</div>
	<?php require('Componentes/jsFiles.html')?>
</body>

</html>