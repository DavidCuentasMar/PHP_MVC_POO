<?php 
  session_start();
  if (isset($_SESSION['usuario'])) {
    header('location: Vista/home.php');
  }else{
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>TURESERVAPUNTOCOM</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
          body{
            overflow: hidden;
          }
        </style>
        <link rel="stylesheet" href="Vista/css/bootstrap.min.css">
        <link rel="stylesheet" href="Vista/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="Vista/css/main.css">

        <script src="Vista/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">TU RESERVA PUNTO COM</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <form class="navbar-form navbar-right" role="form">
                <div class="form-group">
                  <input type="text"  id="user" name="user" class="form-control" placeholder="Usuario" required >
                </div>
                <div class="form-group">
                  <input type="password"  id="pass" name="pass" class="form-control" placeholder="Password" required  >
                </div>
                <button type="button" class="btn btn-primary" onclick='login(1);'>Login</button>   
              </form>
            </div><!--/.navbar-collapse -->
          </div>
        </nav>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">      
          <div class="container">
            <h1>Bienvenido!</h1>
            <p>Llegaste al lugar que estabas necesitando para reservar lo que necesitabas en la comodidad de tu casa y en menos tiempo! </p>        
            <a type="button" class="toggle-visibility btn btn-primary" data-target="#post-detailsxxx" >Registrar</a>        
            <div id="post-detailsxxx" style="display:none;">

                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header" >
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <h2 class="modal-title">Datos de Usuario</h2>
                    </div>
                    <div class="modal-body">
                      <div class="alert alert-success text-center" id="exito" style="display:none;">
                        <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada</span>
                      </div>
                      <div class="alert alert-danger alert-dismissable text-center" id="fail" style="display:none;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span class="glyphicon glyphicon-remove"> </span><span> Ingrese otro username</span>
                      </div>
                      <form class="form-horizontal" form name="fvalida" id="formCliente">
                        <div class="form-group">
                          <label for="nombres" class="control-label col-xs-5">Username:</label>
                          <div class="col-xs-5">
                            <input id="username" name="username" type="text" class="form-control">
                          </div>
                        </div>                        
                        <div class="form-group">
                          <label for="pass" class="control-label col-xs-5">Contraseña:</label>
                          <div class="col-xs-5">
                              <input id="passr" name="pass" type="password" class="form-control" >
                          </div>                    
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">  
                      <button type="button" class="toggle-visibility btn btn-danger" data-target="#post-detailsxxx">Cerrar</button>
                      <button onclick="valida_envia();" type="button" class="btn btn-success">Guardar</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->

            </div>
          </div>
        </div>
        

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Auditorios</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Salones</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Campos</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2015</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="Vista/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="Vista/js/vendor/bootstrap.min.js"></script>

        <script src="Vista/js/main.js"></script>
        <script>
          $(document).ready(function(){
            /* Button which shows and hides div with a id of "post-details" */
            $( ".toggle-visibility" ).click(function() {              
              var target_selector = $(this).attr('data-target');
              var $target = $( target_selector );              
              if ($target.is(':hidden')){
                $target.show( "slow" );
              }else{
                $target.hide( "slow" );
              }          
              console.log($target.is(':visible'));              
            });
            /* button which creates a new paragraph <p>New row added</p> */
            $( ".btn-add-new-line" ).click(function() {
              var target_selector = $(this).attr('data-target');
              var $target = $( target_selector );
              if ($target.is(':visible')) {
                var newRow = "New row added";
                $target.append("<p>" + newRow + "</p>");
                console.log("row added");
                var i = $target.text().length;
                console.log("There is " + i + " characters in div");
                var p = $target.html().length;
                console.log("String length of #post-details is: " + p + " ");
              }
            });
          });


	function valida_envia(){ 
   	//valido el nombre 
   	if (document.fvalida.username.value.length==0){ 
      	alert("Tiene que escribir un username") 
      	document.fvalida.nombre.focus() 
      	return 0; 
   	} 

		//valido la pass
   	if (document.fvalida.pass.value.length==0){ 
      	alert("Tiene que escribir una contraseña") 
      	document.fvalida.nombre.focus() 
      	return 0; 
   	} 
	

   	//el formulario se envia 
   	registrar();
}





          function login(op){
            if (op==1){
              var user = $('#user').val();
              var pass = $('#pass').val();
            }else{
              var user=$('#username').val();
              var pass=$('#passr').val();
            }
            $.ajax({
                url:'Controlador/UsuarioControlador.php',
                type:'POST',
                data:'user='+user+'&pass='+pass+"&boton=login"
            }).done(function(resp){
                if(resp=='0'){
                    location.href='Vista/loginConfirm.php';
                }else{
                    if (resp=='admin') {
                        location.href='Vista/home.php';
                    }else{
                        location.href='Vista/home.php';
                    }                                    
                }
            });
          }       




        function registrar(){
            var username=$('#username').val();
            var password=$('#passr').val();
                $.ajax({
                    url:'Controlador/UsuarioControlador.php',
                    type:'POST',
                    data:'username='+username+'&password='+password+'&boton=registrar'
					
                }).done(function(respuesta){
					   if (respuesta=='exito') {
                        $('#exito').show();
                        setTimeout(myFunction, 1900);                        
                    }
                    else{	
                        $('#fail').show();
						
                    }                    
                });                                    
        } 
        function myFunction() {
          login(0);
        }      
    </script>
    </body>
</html>
<?php 
}
?>