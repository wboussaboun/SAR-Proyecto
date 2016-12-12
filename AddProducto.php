<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8"/>
	<link rel='stylesheet' type='text/css' href='estiloPrincipal.css' />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="busqueda.js"></script>
	<title>Vender producto</title>
	
	</head>

	<body>
	<?php 
		require("Nozama.php");
	?>
	<center>
	<form method="post" action='anadirProducto.php' enctype="multipart/form-data">
	<table>
	
	<tr>
	<td>Nombre:</td>
	<td><input type="text" name='Nombre' id='Nombre' required value=""/></td>
	</tr>
	<tr>
	<td>Categoria:</td>
	<td><input type="text" name='Categoria' id='Categoria' required value=""/></td>
	</tr>
	<tr>
	<td>Precio:</td>
	<td><input type="text" name='Precio' id='Precio' required value=""/></td>
	</tr>
	<tr>
	<td>Envio:</td>
	<td><?php require("countries.html") ?></td>
	</tr>
	<tr>
	<td>Dia de entrega:</td>
	<td><input type="text" name='Entrega' id='Entrega' required value=""/></td>
	</tr>
	<tr>
	<td>Especificaciones:</td>
	<td><input type="text" name='Especificaciones' id='Especificaciones' required value=""/></td>
	</tr>
	<tr>
	<td>Descripcion:</td>
	<td><textarea rows="4" cols="40" id="Descripcion" required name="Descripcion"></textarea></td>
	</tr>
	<tr>
	<td>Foto del producto:</td>
	<td>
	<input type="file" name='img' id='img' onChange="document.getElementById('imagen').src=window.URL.createObjectURL(this.files[0])"/></td>
	</tr>
	
	<tr>
	<td><input type="submit" name='Añadir' id='Añadir' value="Añadir"/></td>
	</tr>
	</table>
	</form>
	<?php 
		if(isset($_GET["ref"])){
			echo 'Se ha añadido el producto correctamente.';
		}
	?>
	
	</center>
	</body>
	



</html>

