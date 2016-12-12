<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8"/>
	<link rel='stylesheet' type='text/css' href='estiloPrincipal.css' />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="busqueda.js"></script>
	<?php echo '<title>'.$_POST['producto'].'</title>' ?>
</head>


<body>

	
	<?php
	require("Nozama.php");
	$busqueda = $_POST['producto'];

	$productos = simplexml_load_file('productos.xml');
	$hit=false;
	foreach($productos->producto as $producto){
		if (strpos($producto, $busqueda) !== false){
			$hit=true;
			
			echo '<table><tr>';
			echo '<td><img src="'.$producto->imagen.'" width="300" height="300"/><br/><br/></td>';
			echo '<td>Producto: '.$producto .'<br/>';
			echo 'Categoria: '.$producto->categoria.'<br/>';
			echo 'Precio: '.$producto->precio.' €<br/>';
			$date = date('Y-m-d');
			
			echo 'Envio desde: '.$producto->envio.' <br/>';
			echo 'Fecha de entrega: '.date('Y-m-d', strtotime($date. '+ '. $producto->entrega .' days')).'<br/>';
			echo 'Especificaciones: '.$producto->especificaciones .'<br/>';
			echo 'Descripcion: '.$producto->descripcion.' <br/>';
			
			echo '<a href="producto.php?producto='.urlencode($producto).'&amp;id='.urlencode($producto->id).'">Ver Mas</a></td>';
			echo '</tr></table>';
			
		}
	}
if(!$hit){echo '<p>No se han encontrado resultados</p>';}
else{echo '<p>No hay más resultados</p>';}

?>

</body>

</html>