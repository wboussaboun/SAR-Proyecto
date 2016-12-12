<?php

	function subir_fichero($nombre_fichero)
	{
	$directorio_destino = "imagenes";
    $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
      
    if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
    {
        $img_file = $_FILES[$nombre_fichero]['name'];
        $img_type = $_FILES[$nombre_fichero]['type'];
        
        
        if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
	strpos($img_type, "jpg")) || strpos($img_type, "png")))
        {
           
            
            if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
            {
                return true;
            }
        }
    }
    
    return false;
	}
?>