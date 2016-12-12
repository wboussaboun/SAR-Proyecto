<?php
	$nomProd = $_GET['producto'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8"/>
		<title><?php echo $nomProd;?></title>
		<link rel='stylesheet' type='text/css' href='estiloPrincipal.css' />
		<script type="text/javascript" src="busqueda.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
	</head>
	<body>
	
<?php
	require("Nozama.php");
	echo '<form method="post" action="comprar.php" enctype="multipart/form-data">';
	$busqueda=$_GET['id'];
	$productos = simplexml_load_file('productos.xml');
	foreach($productos->producto as $producto){
		if ($busqueda==$producto->id){
			echo '<center>';
			echo '<table><tr>';
			echo '<td><img src="'.$producto->imagen.'" width="300" height="300"><br/><br/></td>';
			echo '<td>Producto: '.$producto .'<br/>';
			echo 'Categoria: '.$producto->categoria.'<br/>';
			echo 'Envio desde: '.$producto->envio.' <br/>';
			echo 'Fecha de entrega: '.$producto->entrega .'<br/>';
			echo 'Especificaciones: '.$producto->especificaciones .'<br/>';
			echo 'Precio: '.$producto->precio.'€<br/>';
			echo '<input type="text" id="precio" hidden="true" value="'.$producto->precio.'"/>';
			echo '<input type="text" name="ide" hidden="true" value="'.$producto->id.'"/>';
			echo 'Descripcion: '.$producto->descripcion.' <br></td>';
			echo '<td>Cantidad: <input type="text" name="cant" id="cant" class="cant" value="1" min="1" required/><br/>';
			echo '<p id="prec">Precio total: </p>';
			if(isset($_SESSION['nick'])){
				echo ' <button type="submit" >Realizar compra</button>';
			}else{
				echo ' Para comprar este producto hay que iniciar sesion: <a href="Login.php">Inicio de sesion</a>';
			}
			echo '</td></tr></table>';
			echo '</center>';
		}
	}	
?>
		</form>
			<script type="text/javascript">
				jQuery('.cant').keyup(function () { 
				this.value = this.value.replace(/[^0-9\.]/g,'');
				});
				$( "#cant" )
				.keyup(function() {
				var cantidad = $( this ).val();
				var precio = $("#precio").val();
				var resultado = cantidad*precio;
				$( "#prec" ).text( "Precio total: "+resultado );
				})
				.keyup();
			</script>
	</body>
</html>