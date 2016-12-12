
	<center>

	<form method="post" action='busqueda.php' enctype="multipart/form-data">
		<a href='Inicio.php' class="inicio">Inicio</a>
		<a href='AddProducto.php' class="inicio">¡Vende tu producto!</a>
		Buscar producto:
		<input type="text" name='producto' id='producto' autocomplete="off" onkeyup="buscarAjax()" placeholder="Search..." required value="" />
		<input type="submit" name='bBuscar' id='bBuscar' class="enviar" value="Buscar"/>
	<?php 
	session_start();
	if (isset($_SESSION['nick'])){
		echo '<a href="Perfil.php" align="right" class="inicio">Perfil</a>';
		echo '<a href="Logout.php" align="right" class="inicio">Cerrar sesion</a>';
	}else{
		echo '<a href="Registro.php" align="right" class="inicio">Registrate</a>';
		echo '<a href="Login.php" align="right" class="inicio">Inicio de sesion</a>';
	}
	?>

		<ul id="results" ></ul>
	</form>

	</center>
	<center>
	
<?php

	$categorias = simplexml_load_file('categorias.xml');
	if ($categorias->count() != 0){
		foreach($categorias->categoria as $categoria)
		{	
			echo '<a href="/SARpr/categoria.php?categoria='.urlencode($categoria).'" class="cat">'.$categoria.'</a>';
		}
	}
	

?>

	</center>
	<hr/>
