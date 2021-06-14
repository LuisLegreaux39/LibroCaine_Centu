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
	<section>
	<div class="container" >
		
		<div class="container" style="margin: 50px;">
		<h1 >Autores disponibles <span class="badge badge-primary">New</span></h1>
		<br/>
		<a class="text-light" href="CrearAuthor.php">
			<button type="button" class="btn btn-info">
				Crear Author
			</button>
		</a>
		<br/>
		<table class="table table-light" >
			<thead>
				<tr>
					<th scope="col">Nombre<hr></th>
					<th scope="col">Apellido<hr></th>
					<th scope="col">Telefono<hr></th>
					<th scope="col">Ciudad<hr></th>
					<th scope="col">Direccion<hr></th>
					<th scope="col"></th>
				</tr>
			</thead>
				<tbody>
					<?php
					$resultado = $bd->getAutores();
					// print_r(gettype($resultado));
					foreach ($resultado as $autor) {
						printf("<tr class='tableRows'>");
						printf('<td>'.$autor['nombre'].'</td>'.'<td>'. $autor['apellido'].'</td>'.'<td>'.$autor['telefono'].'</td>'
						.'<td>'.$autor['ciudad'].'</td>'.'<td>'.$autor['direccion'].'</td>'.
						"<td>
						<form action='EditarAutor.php' method='GET'>
							<button type='submit' class='btn btn-info' value=".$autor['id']." name='btn_edit'>
								<i class='bi-pencil fs-4 text-light'>
								</i>
							</button>
						</form>
							<form action='Autores.php' method='POST'>
								<button type='submit' class='btn btn-danger' value=".$autor['id']." name='btn_delete'>
									<i class='bi-trash fs-4 text-light'>
									</i>
								</button>
							</form>
						</td>");
						printf('</tr>');
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
	</section>
	<?php require('Componentes/jsFiles.html')?>
</body>

</html>