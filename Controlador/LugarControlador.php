<?php 
	require_once("../Modelo/Lugar.php");
	if (isset($_POST['boton'])) {
		$boton= $_POST['boton'];
		if ($boton==='guardar') {
			$LugarObjt = new Lugar();
			$tipo=$_POST['tipo'];
			$nombre=$_POST['nombre'];
			$descripcion=$_POST['descripcion'];
			$nombre_imagen = $_FILES["imagen"]["name"];
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
			unset($LugarObjt);
		}
	}else{
		if (isset($xyz)) {
			if ($xyz=='ok') {
					$LugarObjt = new Lugar();
					$LugarObjt -> showPlaces();
			}
			if ($xyz=='auditorios') {
				$LugarObjt = new Lugar();
				$LugarObjt -> llenar("auditorio");
			}
			if ($xyz=='salones') {
				$LugarObjt = new Lugar();
				$LugarObjt -> llenar("Salon");
			}
			if ($xyz=='campos') {
				$LugarObjt = new Lugar();
				$LugarObjt -> llenar("Campo");
			}
			if ($xyz=='reservas') {
				$LugarObjt = new Lugar();
				$LugarObjt -> showReservas();
			}			
		}else{		
			$op = $_GET['op'];	
			$id = $_GET['id'];
			if ($op=='0') {
				$LugarObjt = new Lugar();
				$LugarObjt -> eliminarReserva($id);
				unset($LugarObjt);	
				header('location: ../Vista/Reservas.php');
			}else{
				$LugarObjt = new Lugar();
				$LugarObjt -> reservarPlace($id);
				unset($LugarObjt);	
				
			}	
				
			
		}
		

	}



?>