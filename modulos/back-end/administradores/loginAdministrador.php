<!DOCTYPE html>
<html lang="en">
  <head>
<?php //////////////////////////////////////////////////////
///Copyright 2015  Luna Claudio,Rebolloso Leandro.///
////////////////////////////////////////////////////
//
//This file is part of ARSoftware.
//ARSoftware is free software; you can redistribute it and/or
//modify it under the terms of the GNU General Public License
//as published by the Free Software Foundation; either version 2
//of the License, or (at your option) any later version.
//
//ARSoftware is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License
//along with this program; if not, write to the Free Software
//Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

?>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	
    <title>Signin Template for Bootstrap</title>
<?php	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/principal.php");?>

    <link href="<?php echo $httpHostSitio?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Custom styles for this template -->
    <link href="<?php echo $httpHostSitio?>bootstrap/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
    <script src="<?php echo $httpHostSitio?>bootstrap/js/ie-emulation-modes-warning.js"></script>
    
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php 

	#checkeamos cookie
	
	if(isset($_COOKIE['nombreUsuario']) && isset($_COOKIE['token'])) {	
		
		$_SESSION['nombreUsuario']=$_COOKIE['nombreUsuario'];
		$_SESSION['token']=$_COOKIE['token'];	
	
		header("location: " . $httpHostSitio . "modulos/back-end/administradores/principalAdministradorAr.php");			
		exit();
	}
	else{		
		if(isset($_SESSION['nombreUsuario']) && isset($_SESSION['token'])) {		
			header("location: " . $httpHostSitio . "modulos/back-end/administradores/principalAdministradorAr.php");			
			exit();
		}
	}
	
	if($_POST["bandera"]){
			include("ctrlLoginAdministrador.php");
	}
?>
	</head>

  <body>

    <div class="container">
<form enctype="multipart/form-data" method="post">
<input type="hidden" name="bandera" value="1">	
	
	 <h2 class="form-signin-heading">Por Favor ingresar</h2>
	
        <input type="text" class="form-control" name="nombreUsuario" placeholder="nombre" value="" required autofocus>
        <input type="password" class="form-control" name="clave" placeholder="Password" value="" required>
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">Conectarse</button>

      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo $httpHostSitio?>bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
