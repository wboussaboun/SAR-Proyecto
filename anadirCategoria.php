<?php
	$nombre = $_POST['Nombre'];
		$categorias = simplexml_load_file('categorias.xml');
		$categorias->addChild('categoria', $nombre);		
		$categorias->asXML('categorias.xml');
	
	header("Location: /SARpr/anadirCategoria.html");
?>