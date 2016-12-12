<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8"/>
<link rel='stylesheet' type='text/css' href='estiloPrincipal.css' />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="busqueda.js"></script>
<title>Login</title>
</head>

<body>
	<?php 
		require("Nozama.php");
	?>
	<center>
	
	<form method="post" enctype="multipart/form-data">

	<table border="0">
	<tr>
		<td>Introduce el usuario: </td>
		<td><input type='text' name='usuario' id='usuario' required value=''/><td>
	</tr>
	<tr>
		<td>Introduce la contraseña</td>
		<td><input type='password' name='contrasena' id='contrasena' required value=''/></td>
	</tr>
	<tr><td></td>
		<td align="right"><input type="submit" name='login' id='login' value="Iniciar Sesion"/></td>
	</tr>
	</table>
	</form>
	<?php if(isset($_GET["incorrecto"])){echo 'Datos incorrectos!';}?>
	</center>
</body>
</html>



<?php
	
	if(isset($_POST['usuario']) && isset($_POST['contrasena'])){
	
	$nick = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	
	$usuarios = simplexml_load_file('usuarios.xml');
	$correcto=false;
	foreach($usuarios->usuario as $usuario){
		if($usuario == $nick && $usuario->contrasena == $contrasena){
			$correcto=true;
			session_start();
			$_SESSION['nick']=$nick;
		}
	}
	if($correcto){
		header("Location: /SARpr/perfil.php");
	}
	else{
		header("Location: /SARpr/Login.php?incorrecto=true");
	}
	}

?>