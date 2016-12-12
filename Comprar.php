<?php 
	session_start();
	$cantidad = $_POST['cant'];
	$id = $_POST['ide'];
	
	$productos = simplexml_load_file('productos.xml');
	$usuarios = simplexml_load_file('usuarios.xml');
	foreach($productos->producto as $producto){
		if ($producto->id== $id){
			foreach($usuarios->usuario as $usuario){
				if($usuario==$_SESSION['nick']){
					$losproductos=$usuario->productos;
					$nuevoproducto=$losproductos->addChild('producto',$producto);
					$nuevoproducto->addChild('id',$producto->id);
					$nuevoproducto->addChild('cantidad',$cantidad);
					$nuevoproducto->addChild('precio',$producto->precio);
				}
			}
		}
	}
	$usuarios->asXML('usuarios.xml');
	header("Location: /SARpr/Perfil.php");
?>