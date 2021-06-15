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
	<br/>
		<a class="text-light" href="CrearTitulo.php">
			<button type="button" class="btn btn-info">
				Crear Titulo
			</button>
		</a>
		<br/>
		<table class="table table-light">
			<thead>
				<tr>
				
					<th scope="col">Titulo<hr></th>
					<th scope="col">Tipo<hr></th>
					<th scope="col">Precio<hr></th>
					<th scope="col">Notas<hr></th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
					<?php
					
					$resultado = $bd->getTitulos();
					foreach ($resultado as $libros) {
						echo "<tr class='tableRows'>";
						echo '<td>'.$libros['titulo'].'</td> <td>'.$libros['tipo'].'</td><td>'.$libros['precio'].
						'$</td> <td>'.$libros['notas'].'</td>'."<td>
							<form action='EditarLibro.php' method='GET' style='display:block;'>
								<button type='submit' class='btn btn-info' value=".$libros['id']." name='btn_edit'>
									<i class='bi-pencil fs-4 text-light'>
									</i>
								</button>
							</form>
							<form action='Libros.php' method='POST' style='display:block;'>
								<button type='submit' class='btn btn-danger' value=".$libros['id']." name='btn_delete'>
									<i class='bi-trash fs-4 text-light'>
									</i>
								</button>
							</form>
						</td>";
                        echo '</tr>';
					}
					?>
				<?php 
						if($_SERVER["REQUEST_METHOD"]=='POST'){
							if(isset($_POST['btn_delete'])){
								$id = $_POST['btn_delete'];
								$bd->deleteTitulos($id);
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