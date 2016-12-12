<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8"/>
	<link rel='stylesheet' type='text/css' href='estiloPrincipal.css' />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="busqueda.js"></script>
	<title>Registro</title>
	</head>

	<body>
	<?php 
		require("Nozama.php");
	?>
	<center>
	<form method="post" name='registro' enctype="multipart/form-data">
	El nombre de usuario debe tener minimo 2 caracteres y la contraseañ 6.
	<table border="0">
	<tr>
		<td>Usuario: </td>
		<td><input type="text" name='usuario' required pattern=".{2,}" value=""></td>
	</tr>
	<tr>
		<td>Contraseña: </td>
		<td><input type="password" name='password' required pattern=".{6,}" value="" >
	</tr>
	<tr><td></td>
		<td align="right"><input type="submit" value="Registrar"></td>
		</tr>
	</table>
	</form>
	<?php if(isset($_GET["repetido"])){echo 'El nombre de usuario ya ha sido escogido!';}?>
	<?php if(isset($_GET["incorrecto"])){echo 'Los datos son incorrectos!';}?>
	</center>
	</body>



</html>


<?php
	
	if(isset($_POST['usuario']) && isset($_POST['password'])){
	
	$nick = $_POST['usuario'];
	$contrasena = $_POST['password'];
	//verificacion en servidor, en caso de no tener javascript o intentar saltarse la validacion en el cliente
	if(strlen($nick)<2 || strlen($contrasena)<6){
		header("Location: /SARpr/Registro.php?incorrecto=true");
	}
	
	$usuarios = simplexml_load_file('usuarios.xml');
	$existe=false;
	foreach($usuarios->usuario as $usuario){
		if($usuario->nick == $nick ){
			$existe=true;
		}
	}
	if($existe){
		header("Location: /SARpr/Registro.php?repetido=true");
	}
	else{
		$nuevoUsuario = $usuarios->addChild('usuario',$nick);
		$nuevoUsuario->addChild('contrasena',$contrasena);
		$nuevoUsuario->addChild('productos', '');
		$usuarios->asXML('usuarios.xml');
		header("Location: /SARpr/Inicio.php");
	}
	}

?>