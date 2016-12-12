<?php
	require_once('subirFoto.php');
	$nombre = $_POST['Nombre'];
	$precio = $_POST['Precio'];
	$pais = $_POST['countries'];
	$entrega = $_POST['Entrega'];
	$especificaciones = $_POST['Especificaciones'];
	$descripcion = $_POST['Descripcion'];
	$categoria = $_POST['Categoria'];
	
	if(subir_fichero("img")){
		$directorio_destino = "imagenes";
		$img_file = $_FILES["img"]['name'];
		$ruta= $directorio_destino . '/' . $img_file;
	} else{
		$ruta='';
	}
	
		$productos = simplexml_load_file('productos.xml');
		$id=0;
		foreach($productos-> producto as $producto){
			$id+=1;
		}
		$producto = $productos->addChild('producto', $nombre);
		$producto->addChild('categoria', $categoria);
		$producto->addChild('precio', $precio);
		$producto->addChild('envio', $pais);
		$producto->addChild('entrega', $entrega);
		$producto->addChild('especificaciones', $especificaciones);
		$producto->addChild('descripcion', $descripcion);
		$producto->addChild('imagen', $ruta);
		$producto->addChild('id', $id);
		$productos->asXML('productos.xml');
		
		$categorias = simplexml_load_file('categorias.xml');
		$esta=false;
		foreach($categorias as $categoriaXML){
			if($categoria==$categoriaXML){
				$esta=true;
			}
		}
		if(!$esta){
			$categorias->addChild('categoria', $categoria);
			$categorias->asXML('categorias.xml');
		}
		
	
	header("Location: /SARpr/AddProducto.php?ref=anadir");
	
?>