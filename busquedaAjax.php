<?php
	$busqueda = $_GET['producto'];

	$productos = simplexml_load_file('productos.xml');
	$i=0;
	foreach($productos->producto as $producto){
		$productoup=strtoupper($producto);
		$busquedaup=strtoupper($busqueda);
		if (strpos($productoup, $busquedaup) !== false && $i<3){
			echo '<li><a href="producto.php?producto='.urlencode($producto).'&amp;id='.urlencode($producto->id).'">'.$producto.'</a></li>';
			$i++;
		}
	}


?>