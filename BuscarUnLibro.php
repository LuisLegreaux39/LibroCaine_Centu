<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once('Componentes/MetaInfo.html'); ?>
</head>

<body>
	<?php require_once('Componentes/Nav.html'); ?>
	<div class="container">
		<br/>
		<div class="jumbotron">
			<h1 >Buscando:
			<?php 
				if($_SERVER["REQUEST_METHOD"] == "POST"){
					$titulo = $_POST['titulo'];
					if(isset($titulo)){
						echo "<span class='badge badge-primary'>".$titulo."</span>";
						}
					}
				?>
		</h1>
		<br/>
		<h5 >Powered By <a href="https://api.itbook.store/" target="https://api.itbook.store/">Api Books Store</a></h5>
		</div>
		<div class="container">
			<div class="row justify-content-center" >
				
						<?php 
						
						function getBookOnApiBookStore($titulo){
							// https://www.programmableweb.com/news/10-most-popular-apis-books/brief/2020/01/26
							// https://www.programmableweb.com/api/it-bookstore-rest-api-v10
							// https://api.itbook.store/
							$END_POINT = "https://api.itbook.store/1.0/search/$titulo";
							// print_r($END_POINT);
							$result = file_get_contents($END_POINT);
							return $result;
						}	
				
						if($_SERVER["REQUEST_METHOD"] == "POST"){
							$titulo = $_POST['titulo'];
							if(isset($titulo)){
								$bookStore =json_decode(getBookOnApiBookStore($titulo));

								if(sizeof($bookStore->books) > 0){
									foreach($bookStore->books as $row){
										echo "<div class='card mb-6' style='width:900px; margin:5px;'>";
										echo "<div class='row g-0' >";
										echo "<div class='col-md-4' >";
										echo "<img src='$row->image' alt='Not available'>";
										echo  "</div>";
										echo  "<div class='col-md-8'>";
										echo  "<div class='card-body'>";
										echo  "<h3 class='card-title'>$row->title</h3>";
										echo  "<p class='card-text'>$row->subtitle</p>";
										echo  "<p class='card-text'><h4 class='text-muted'>$row->price</h4></p>";
										echo  "<p class='card-text'><h5 class='text-muted'>Interesado?</h5></p>";
										echo  "<p class='card-text'><a class='btn btn-info' href='$row->url' target='$row->url'>Comprar</a></p>";

										echo "</div>";
										echo  "</div>";
										echo  "</div>";
										echo "</div>";		
									}
								}else {
									echo "<h1 class='display-6'>No hay resultados para $titulo</h1>";
								}

							}
						}
					?>

				</div>
			</div>
				
			
		</div>
	</div>


	<?php require('Componentes/jsFiles.html') ?>
</body>

</html>