<?php 
	require_once("../Modelo/Lugar.php");
	$boton= $_POST['boton'];
	if ($boton==='guardar') {
		$LugarObjt = new Lugar();
		$tipo=$_POST['tipo'];
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];

		$nombre_imagen = uniqid()."-".$_FILES["imagen"]["name"];
		$ruta = "../Vista/imgs/".$nombre_imagen;
		if ($_FILES['imagen']['type'] ==="image/jpg" || $_FILES['imagen']['type']==="image/jpeg") {
			if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta))				{
				if($LugarObjt->guardar($tipo,$nombre,$descripcion,$nombre_imagen)){
					echo 'exito'."-".$_FILES["imagen"]["type"];
				}else{
					echo "No se Guardo los datos";
				}
			}else{
					echo "No se pudo subir el archivo";
				}
		}else{
			echo "La extension del archivo no es permitido";
		}
			
		
		
	}

?>