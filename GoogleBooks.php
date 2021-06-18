<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once('Componentes/MetaInfo.html'); ?>
</head>

<body>
	<?php require_once('Componentes/Nav.html'); ?>
	<!-- 
		Manejo de la api de GoogleBooks
		ApiKey = AIzaSyBzUtZmv_Ujs0ZpEgCfLVwKM2ogkHBlr4g

		https://www.googleapis.com/books/v1/volumes?q=flowers&key=key
		s
	 -->

	<div class="jumbotron">
		<div class="container text-center">
			<h1 >Libros para descargar 
				<span class="badge badge-primary">New</span>
			</h1>
			<h4 >Powered By Google Books Api</h4>
			<hr/>
			<br/>
			<div class="container">
				<div class="row">
					<?php 
						$jsonStream = file_get_contents(__DIR__.'/libreria/GoogleBooks.json');
						$data = json_decode($jsonStream);
						
						foreach($data->items as $row){
							echo "<div class='col-md-4'>";
							echo "<div class='card' style='width: 18rem;'>";
							echo "<img src='".$row->volumeInfo->imageLinks->smallThumbnail."'  class='card-img-top ' alt='Not Pic available'>";
							echo 	"<div class='card-body'>";
							echo	"	<h5 class='card-title'>".$row->volumeInfo->title."</h5>";
							if(isset($row->volumeInfo->subtitle)){
								echo	"	<p class='card-text'>".$row->volumeInfo->subtitle."</p>";
							}
							if(isset($row->accessInfo)){
								if(isset($row->accessInfo->epub->downloadLink)){
									echo	"<a href='".$row->accessInfo->epub->downloadLink."' class='btn btn-primary'>Epub</a>";
								}
								if(isset($row->accessInfo->pdf->downloadLink)){
									echo	"<a href='".$row->accessInfo->pdf->downloadLink."' target='".$row->accessInfo->pdf->downloadLink."' class='btn btn-primary'>PDF</a>";
								}
							}
							echo	"</div>";
							echo	"</div>";
							echo "<br/>";
	  						echo" </div>";
						}
					?>
				</div>
			</div>

		</div>
	</div>
	
	<?php require('Componentes/jsFiles.html') ?>
</body>

</html>