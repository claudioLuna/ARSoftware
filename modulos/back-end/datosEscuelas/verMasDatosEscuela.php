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
    include_once($docRootSitio."modelo/Alumno.php");
    include_once($docRootSitio."modelo/Marca.php");
    include_once($docRootSitio."modelo/Curso.php");
    include_once($docRootSitio."modelo/Turno.php");
    include_once($docRootSitio."modelo/Tecnico.php");
    include_once($docRootSitio."modelo/Prestamo.php");
	include_once($docRootSitio."modelo/Administrador.php");
    include_once($docRootSitio."modelo/DatosEscuela.php");
    
    $datosesc = new DatosEscuela();
    $adm1 = new Administrador();
	
	$usuario = $_SESSION["nombreUsuario"];
    $_datos = $datosesc->listarDatosEscuela($_POST['DatosEscuela']);
    $_nombre = $adm1->listarAdministradorins2($usuario);
	
    #nombre
    if($_POST['nombreDirector']){
    $nombreDirector = $_POST['nombreDirector'];
    }
    else{
    $nombreDirector = $_datos['nombreDirector'];
	}
    
	#apellido
    if($_POST['apellidoDirector']){
    $apellidoDirector = $_POST['apellidoDirector'];
    }
    else{
    $apellidoDirector = $_datos['apellidoDirector'];
	}
	
	#dni Director
    
    if($_POST['dniDirector']){
		$dniDirector = $_POST['dniDirector'];
	}
	else{
    	$dniDirector = $_datos['dniDirector'];
	}
    
	#cuil Director
    if($_POST['cuilDirector']){
		$cuilDirector = $_POST['cuilDirector'];
	}
	else{
		$cuilDirector= $_datos['cuilDirector'];
	}
	#numero Escuela
    if($_POST['numeroEscuela']){
		$numeroEscuela = $_POST['numeroEscuela'];
	}
	else{
		$numeroEscuela= $_datos['numeroEscuela'];
	}
	#nombre Escuela
    if($_POST['nombreEscuela']){
    $nombreEscuela = $_POST['nombreEscuela'];
    }
    else{
		$nombreEscuela= $_datos['nombreEscuela'];
    }
    
    #cue Escuela
	if($_POST['cueEscuela']){
    $cueEscuela = $_POST['cueEscuela'];
    }
    else{
    $cueEscuela= $_datos['cueEscuela'];
    }
    
    #seccion Escuela
	if($_POST['seccionEscuela']){
    $seccionEscuela = $_POST['seccionEscuela'];
    }
    else{
    $seccionEscuela= $_datos['seccionEscuela'];
    }
    
    #Domicilio Escuela
    if($_POST['domicilioEscuela']){
    $domicilioEscuela = $_POST['domicilioEscuela'];
    }
    else{
    $domicilioEscuela= $_datos['domicilioEscuela'];
    }
    
    #ciudad
    	if($_POST['ciudad']){
		$ciudad = $_POST['ciudad'];
    }
    else{
    $ciudad= $_datos['ciudad'];
    }
    
	#provincia
    if($_POST['provincia']){
		$provincia = $_POST['provincia'];
    }
    else{
    $provincia= $_datos['provincia'];
    }
	
    #bandera
    		if($_POST["bandera"]){
    
    		$mensaje = $datosesc->validarDatosEscuela($_POST);
    
    		if(!$mensaje){
    		$update = $datosesc->modificarDatosEscuela();
    		header("location: listarDatosEscuelas.php?update=$update");
    		exit();
    		}
    		}
    
    		?>
            <!-- Bootstrap Core CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $httpHostSitio?>plantilla/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="<?php echo $httpHostSitio?>jquery/jquery-1.11.1.js"></script>	
	<script src="<?php echo $httpHostSitio?>plantilla/js/bootstrap.min.js"></script>

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
          		   <ul class="nav navbar-right top-nav">
						  
          	<li class="dropdown">
                    <a href="principalAdministrador.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_nombre['nombre'].' '.$_nombre['apellido']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/escuelas/utiles/ctrlLogout.php"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
			 </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <      <!--Menu----------->
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php include_once($docRootSitio."utiles/menuAdministradorAR.php");?>    
                            </div>
            <!--Fin Menu----------------->
            <!-- /.navbar-collapse -->
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

         </div>
            <!-- /.container-fluid ------------------------------------------------------------------------------------------------------>

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Modificar Datos Escuela
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Datos Escuela
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
         	<!--form-->
			<p>
<button type="button" class="btn btn-primary" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/datosEscuelas/listarDatosEscuelas.php')" >  Listar Datos Escuelas</button>        
	</p>
	<form enctype="multipart/form-data" method="post">	
		<!--Marca-->
		<input type="hidden" name="Marca" value="<?php echo $datosesc->getId()?>" />
		<!--id-->
		<input type="hidden" name="id" value="<?php echo $datosesc->getId()?>" />		
		
		<!--bandera-->
		<input type="hidden" name="bandera" value="1" />	
			
		<fieldset>

		<?php if($mensaje){?>
		<div class="alert alert-danger">
                    <strong><?php echo $mensaje?>
                </div>
 
		<?php }?>		
		
		<!--codigo-->
		
		<div class="form-group">
        <label>Nombre Director:*</label><input class="form-control" readonly="readonly();"  name="nombreDirector" value="<?php echo $nombreDirector?>">
        </div>
		<div class="form-group">
        <label>Apellido Director:*</label><input class="form-control" readonly="readonly();"  name="apellidoDirector" value="<?php echo $apellidoDirector?>">
        </div>
		<div class="form-group">
        <label>Dni Director: *</label><input class="form-control"  readonly="readonly();" name="dniDirector" value="<?php echo $dniDirector?>">
        </div>
		<div class="form-group">
        <label>Cuil Director: *</label><input class="form-control" readonly="readonly();" name="cuilDirector" value="<?php echo $cuilDirector?>">
        </div>
        <div class="form-group">
        <label>Numero Escuela: *</label><input class="form-control" readonly="readonly();" name="numeroEscuela" value="<?php echo $numeroEscuela?>">
        </div>
		 <div class="form-group">
        <label>Nombre Escuela: *</label><input class="form-control" readonly="readonly();" name="nombreEscuela" value="<?php echo $nombreEscuela?>">
        </div>
	 <div class="form-group">
        <label>CUE Escuela: *</label><input class="form-control" readonly="readonly();" name="cueEscuela" value="<?php echo $cueEscuela?>">
        </div>
		
	<div class="form-group">
        <label>Seccion Escuela: *</label><input class="form-control" readonly="readonly();" name="seccionEscuela" value="<?php echo $seccionEscuela?>">
        </div>
		<div class="form-group">
        <label>Domicilio Escuela: *</label><input class="form-control" readonly="readonly();" name="domicilioEscuela" value="<?php echo $domicilioEscuela?>">
        </div>
		
		<div class="form-group">
        <label>Ciudad: *</label><input class="form-control" readonly="readonly();" name="ciudad" value="<?php echo $ciudad?>">
        </div>
		
		<div class="form-group">
        <label>Provincia: *</label><input class="form-control" readonly="readonly();" name="provincia" value="<?php echo $provincia?>">
        </div>
	
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
