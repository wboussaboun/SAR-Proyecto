<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8"/>
		<title><?php echo 'Mi Perfil';?></title>
		<link rel='stylesheet' type='text/css' href='estiloPrincipal.css' />
		<script type="text/javascript" src="busqueda.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
	</head>
	<body>
	<?php 
	require('Nozama.php');
	?>
	<center><table>
		<?php 
	if(!isset($_SESSION['nick'])){header("Location: /SARpr/Login.php");}
		$nick = $_SESSION['nick'];
		$usuarios = simplexml_load_file('usuarios.xml');
		$productos = simplexml_load_file('productos.xml');
		foreach($usuarios->usuario as $usuario){
			if ($nick==$usuario){
				$productos = $usuario->productos;
				foreach($productos->producto as $producto){
					echo '<tr>';
					echo '<td>Producto: '.$producto .'<br/>';
					echo 'Precio: '.$producto->precio.' €<br/>';
					echo 'Cantidad: '.$producto->cantidad.' unidades<br/>';
					echo '<a href="producto.php?producto='.urlencode($producto).'&amp;id='.urlencode($producto->id).'">'.$producto.'</a></td>';
					echo '</tr>';
				}
			}
		}	
		?>
	</table></center>
	</body>
</html>

