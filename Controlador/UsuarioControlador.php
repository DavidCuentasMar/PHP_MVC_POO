<?php 
	require_once("../Modelo/Usuario.php");
	$boton=$_POST['boton'];
	switch ($boton) {
		case 'login':
			$user = new Usuario();
			$array=$user->identificar($_POST['user'],$_POST['pass']);
			if($array==0){
				echo '0';				
			}else{
				// array ( [id] => 1 [usuario] => admin [password] => 123 [email] => admin@admin.com [rango] => admin )
				session_start();			
				$_SESSION['usuario']=$array;
				echo $array['rango'];
			}
			unset($user);	
			break;
		case 'logout':
			$user = new Usuario();
			$user->logout();
			unset($user);
			break;

		case 'registrar':					
					$username = $_POST['username'];
					$password = $_POST['password'];
					$user = new usuario();
					if($user->registrar($username,$password)){                        
						echo "exito";
					}
					else{
						echo "No se registro";
					}
				break;

		default:
			# code...
			break;
	}


?>