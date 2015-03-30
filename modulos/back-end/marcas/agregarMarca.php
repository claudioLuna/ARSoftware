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

     <title>ARSoftware</title>
<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");	
	include_once($docRootSitio."modelo/Administrador.php");	
	include_once($docRootSitio."modelo/Marca.php");	
	$adm1 = new Administrador();
    $mar1 = new Marca();
    
	$usuario = $_SESSION["nombreUsuario"];
    
    $_nombre = $adm1->listarAdministradorins2($usuario);
	
 	if($_POST["bandera"])	
			{	
			$mar1->setNombreUsuario($usuario);
			$mensajeValidar = $mar1->listarMarcasCreadas($_POST['nombre']);
				if(!$mensajeValidar)
					{
						$mensaje = $mar1->validarMarca($_POST);
									if(!$mensaje)
									{						
										$mar1->agregarMarca();		
										header("location: listarMarcas.php?insert=1"); 	
										exit();		
									}		
					}	
				else	
					{
					$mensajerReal="Ya Existe La Marca:";
					}
		}
	//include_once($docRootSitio."utiles/ctrlAcceso.php");	
     //echo $httpHostSitio ;
?> 
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $httpHostSitio?>plantilla/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                   </button>
	               <div onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/administradores/principalAdministradorAR.php')"; style="height: 52px; width:225px;  max-width: 100%; background: #FFFFFF; background-image: url(<?php echo $httpHostSitio?>plantilla/imagenes/logotipoe.png);"></div>
	            </div>
          
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php include_once($docRootSitio."utiles/menuAdministradorAR.php");?>    
            </div>
            
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

         </div>
		 
		       <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Agregar Marca Netbooks
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Agregar Marca Netbooks
                            </li>
                        </ol>
                    </div>
                </div> 
            <!-- /.container-fluid ------------------------------------------------------------------------------------------------------>

	    <p>
     
	                     <button type="button" class="btn btn-primary" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/netescuela/listarNetbooks.php')" > Remanente Netbook</button>	
					<button type="button" class="btn btn-success" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/prestamo/listarPrestamos.php')" > Prestamos Netbook</button>	
					<button type="button" class="btn btn-warning" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/marcas/listarMarcas.php')" > Marcas</button>	 
				 <button type="button" class="btn btn-danger" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/marcas/agregarMarca.php')" > Agregar Marca</button>
					 <hr>
	                    
	                </p>
         <!--form-->
	<form enctype="multipart/form-data" method="post" id="formAgregarMarca" name="formAgregarMarca">
	
		<!--bandera-->
		<input type="hidden" name="bandera" value="1">		
		
		<?php if($mensaje){?>
				<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>		
		<?php if($mensajerReal){?>
		<div class="alert alert-danger">
			<strong>Error </strong><?php echo $mensajerReal.' '.$_POST['nombre']?>
		</div>
		<?php }?>
		<!--nombre-->
		<label>Nombre: *</label> <input class="form-control" name="nombre" value="<?php echo $_POST['nombre']?>" /> <br />

		<!--submit-->
		<input type="submit" value="Agregar" class="btn btn-success"> * Campos obligatorios
		</form>		
         
        </div><!-- Fin container-fluid ------------------------------------------------------------------------------------------------------>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
