<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once('Componentes/MetaInfo.html'); ?>
</head>

<body>
	<?php require_once('Componentes/Nav.html'); ?>
    <?php 
		
		function getBookOnOpenLibra($titulo){
			$palabras = explode(" ",$titulo);
			$size = sizeof($palabras);
			$END_POINT = "https://www.etnassoft.com/api/v1/get/?book_title=$titulo";
			if($size > 1) {
				$title = urldecode($titulo);
				$END_POINT = "https://www.etnassoft.com/api/v1/get/?book_title=\"$title\"";
				print_r($END_POINT );
			}
			$result = file_get_contents($END_POINT);
			return $result;
		}	

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$titulo = $_POST['titulo'];
			if(isset($titulo)){
				print_r(
					getBookOnOpenLibra(
						$titulo
						)
				);
			}
		}

	?>

	<?php require('Componentes/jsFiles.html') ?>
</body>

</html>