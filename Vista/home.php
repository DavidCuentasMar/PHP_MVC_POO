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
                <a class="navbar-brand" href="#">iTuReserva</a>
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
                    <img class="img-circle img-responsive img-center" src="http://placehold.it/100x100" alt="">
                    <p class="lead"><?php echo $_SESSION['usuario']['usuario'] ?></p>
                </div>          
            </center> 
                <div class="list-group">
                    <a href="#" class="list-group-item">Peticiones de Reservas</a>
                    <a href="#" class="list-group-item" onClick="ir()">Lugares</a>
                    <a href="AtencionCliente.php" class="list-group-item">Atención al Cliente</a>
                    <?php 
                        if ($_SESSION['usuario']['rango']=='admin') {
                            echo '<a href="" class="list-group-item" data-toggle="modal" data-target="#modallibros" id="abrir-modal-libros">Agregar</a>';
                        }                                               
                    ?>
                </div>
            </div>
            <div class="modal fade" id="modallibros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h2 class="modal-title">Datos del Sitio</h2>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success text-center" id="exito" style="display:none;">
                                    <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada</span>
                                </div>
                                <form class="form-horizontal" id="formLugar">
                                    <div class="form-group">
                                        <label for="isbn" class="control-label col-xs-5">Categoria: </label>
                                        <div class="control-label  col-xs-5">
                                        <select class="form-control" id="tipo" name="tipo">
                                          <option>Auditorio</option>
                                          <option>Salon</option>
                                          <option>Campo</option>
                                        </select>
                                        </div> 

                                      </div>                                                 
                                    <div class="form-group">
                                        <label for="titulo" class="control-label col-xs-5">Nombre:</label>
                                        <div class="col-xs-5">
                                            <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Ingrese nombre">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="autor" class="control-label col-xs-5">Descripcion:</label>
                                        <div class="col-xs-5">
                                            <input id="descripcion" name="descripcion"  type="text" class="form-control" placeholder="Ingrese descripcion">
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="imagen" class="control-label col-xs-5">imagen:</label>
                                        <div class="col-xs-5">
                                            <input id="imagen" name="imagen" type="file">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-5">
                                            <input name="boton" type="hidden" value="guardar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success" onclick="guardar();">Guardar</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <?php 
                        $xyz='ok';
                        require_once('../Controlador/LugarControlador.php');
                    ?>
                        

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

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
         function guardar(){
          var formData = new FormData($("#formLugar")[0]);
          $.ajax({
            url:'../Controlador/LugarControlador.php',
            type:'POST',
            data:formData,
            cache:false,
            processData:false,
            contentType:false,
          }).done(function(resp){
            alert(resp);
            /*if(resp==='exito'){
              $('#exito').show();
              lista_libros('',1);
              $("#formLibro")[0].reset();
            }
            else{
              alert(resp);
            }*/
            
          });
          
        }
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
		function ir(){
			location.href='vistalugares.php';
		}
    </script>

</body>
</html>
<?php } ?>