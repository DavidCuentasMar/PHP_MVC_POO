<?php 
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('location: ../index.php');
  }else{


?>
<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iTuReserva</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



<style>
.jumbotron {
background: #358CCE;
color: #FFF;
border-radius: 0px;
}
.jumbotron-sm { padding-top: 24px;
padding-bottom: 24px; }
.jumbotron small {
color: #FFF;
}
.h1 small {
font-size: 24px;
}


</style>


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">iTuReserva</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <!-- /.navbar-collapse -->

          <form  class="navbar-form navbar-right" role="form">
            <div class="form-group"></div>
            <div class="form-group"></div>
            <button type="button" class="btn btn-danger" onclick='logout();'>Logout</button> 
          </form>

        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
  <div class="container">

        <div class="row">

            <div class="col-md-3">
            <center>
                <div>
                    <?php 
                        if ($_SESSION['usuario']['rango']=='admin') {
                            echo '<img class="img-circle img-responsive img-center" src="imgs/black-cat.png" alt="">';    
                        }else{
                            echo '<img class="img-circle img-responsive img-center" src="imgs/cat.png" alt="">'; 
                        }
                    ?>
                    <p class="lead"><?php echo $_SESSION['usuario']['usuario'] ?></p>
                </div>          
            </center> 
                <div class="list-group">
                    <a href="#" class="list-group-item">Peticiones de Reservas</a>
                    <a href="vistaLugares.php" class="list-group-item">Lugares</a>
                    <a href="#" class="list-group-item">Atención al Cliente</a>
                </div>
            </div>


       

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form name="fvalida">
                 <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Atencion al cliente <small>Sientete libre de preguntar</small></h1>
            </div>
      </div>
    </div>
</div>
            <div class="modal-body">
                      <div class="alert alert-success text-center" id="exito" style="display:none;">
                        <span class="glyphicon glyphicon-ok"> </span><span> mensaje enviado satsifactoriamente</span>
                      </div>    
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre" required />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email </label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu email" required /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Tema</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Escoje uno:</option>
                                <option value="service">Servicio al cliente</option>
                                <option value="suggestions">Sugerencias</option>
                                <option value="product">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Mensaje</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button onclick="valida_envia();" button type="submit"  class="btn btn-primary pull-right" id="btnContactUs">
                        
                            Enviar mensaje</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Thanks to StackOverflow <3</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/vendor/jquery-1.11.2.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/vendor/bootstrap.min.js"></script>
    <script>
   
	
	
        function logout()
        {
            $.ajax({
                url:'../Controlador/UsuarioControlador.php',
                type:'POST',
                data:"mensaje=mensaje&boton=logout"
            }).done(function(resp){
                //alert(resp);
                window.location.href = "../index.php";
            });
        }
		
		
		function valida_envia(){ 
   	//valido el nombre 
   	if (document.fvalida.name.value.length==0){ 
      	alert("Tiene que escribir su nombre") 
      	document.fvalida.nombre.focus() 
      	return 0; 
   	} 


   	//valido el contacto
   	if (document.fvalida.subject.selectedIndex==0){ 
      	alert("Debe seleccionar un motivo de su contacto.") 
      	document.fvalida.interes.focus() 
      	return 0; 
   	} 
	
		//valido el correo
   	if (document.fvalida.email.value.length==0){ 
      	alert("Tiene que escribir su correo") 
      	document.fvalida.nombre.focus() 
      	return 0; 
   	} 
	
	
		//valido el mensaje
   	if (document.fvalida.message.value.length==0){ 
      	alert("Tiene que escribir un mensaje ") 
      	document.fvalida.nombre.focus() 
      	return 0; 
   	} 
	

   	//el formulario se envia 
   	enviar();
}
		
		
		
        function enviar(){
			
			var nombre=$('#name').val();
            var email=$('#email').val();
			var tema=$('#subject').val();
			var mensaje=$('#message').val();
			
                $.ajax({
                    url:'../Controlador/AtencionControlador.php',
					type:'POST'
				
				// mani no se como ;v 
				//data:'$name='+nombre+'&email='+email+'subject='+tema+'&message='+mensaje+'&boton=enviar'
				
				
                }).done(function(respuesta){
					   if (respuesta=='exito') {
						   alert('Correo enviado satisfactoriamente');                   
                    }
                    else{	
				alert('No se ha podido enviar el correo, intentelo mas tarde');
						
                    }                    
                });                                    
        } 
		
		
    </script>





</body>
</html>
<?php } ?>