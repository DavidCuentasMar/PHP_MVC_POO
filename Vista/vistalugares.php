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
                    <a href="Reservas.php" class="list-group-item">Peticiones de Reservas</a>
                    <a href="#" class="list-group-item" onClick="ir()">Lugares</a>
                    <a href="AtencionCliente.php" class="list-group-item">Atención al Cliente</a>

                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="thumbnail">
                            <img src="imgs/AuditorioCabecera01.jpg" alt="">
                            <div class="caption">        
                                <h4><a href="auditorios.php">Auditorios</a>
                                </h4>
                                <p>See more snippets like this online store item at </p>
                            </div>
                            <div class="ratings">
                             
                            </div>
                        </div>
                    </div>
               
                
                    <div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="thumbnail" >
                            <img src="imgs/salon1.jpg" alt="">
                            <div class="caption">
                                <h4><a href="salones.php">Salones</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                <div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="thumbnail">
                            <img src="imgs/El_Campo_header.jpg" alt="">
                            <div class="caption">
                                <h4><a href="campos.php">Campos</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-lg-3 col-md-3">
                    </div>
                    
                    <div class="col-sm-3 col-lg-3 col-md-3">
                    </div>
                </div>
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
    </script>

</body>
</html>
<?php } ?>