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
    
    $adm1 = new Administrador();
    $usuario = $_SESSION["nombreUsuario"];
    $_nombre = $adm1->listarAdministradorins2($usuario);
   
	if($_POST["bandera"]){	

	include_once($docRootSitio."modelo/Tecnico.php");	
	include_once($docRootSitio."modelo/Alumno.php");	
	
	$tec1 = new Tecnico();	
	$alu1 = new Alumno();
		if($_POST['estado']==1 OR $_POST['estado']==2)
		{
		$estado="S Tecnico";
		}
		else
		{
		$estado="Ok";	
		}
			$alu1->actualizarEstadoNetbook($_POST['serie'],$estado);
		
			$tec1->setNombreAlumno($_POST['nombre']);
			$tec1->setNumeroSerie($_POST['serie']);
			$tec1->setMarca($_POST['MarcaNetbook']);
			$tec1->setProblema($_POST['problema']);
			$tec1->setIdReclamo($_POST['reclamo']);	
			$tec1->setFecha(date("Y-m-d"));
			$tec1->setEstado($_POST['estado']);	
			$tec1->setNombreUsuario($usuario);
		
	$mensaje = $tec1->validarTecnico($_POST);
		
		if(!$mensaje){			
			$tec1->setNombreAlumno($_POST['nombre']);
			$tec1->setNumeroSerie($_POST['serie']);
			$tec1->setMarca($_POST['MarcaNetbook']);
			$tec1->setProblema($_POST['problema']);
			$tec1->setIdReclamo($_POST['reclamo']);	
			$tec1->setFecha(date("Y-m-d"));
			$tec1->setEstado($_POST['estado']);	
			$tec1->setNombreUsuario($usuario);
			
			$tec1->agregarTecnico();		
			header("location: listarTecnicos.php?insert=1"); 	
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
	
		<script src="<?php echo $httpHostSitio?>js/nuevoAjax.js" type="text/javascript"></script>	
<script src="<?php echo $httpHostSitio?>js/tecnico.js" type="text/javascript"></script>	

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
	                <a class="navbar-brand" href="<?php echo $httpHostSitio?>modulos/back-end/administradores/principalAdministradorAR.php">Administradores de Redes</a>
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
             <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php include_once($docRootSitio."utiles/menuAdministradorAR.php");?>    
            </div>
            
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

         </div>
            <!-- /.container-fluid ------------------------------------------------------------------------------------------------------>
     <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Cargar Netbook Servicio Tecnico
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Cargar Netbook Servicio Tecnico
                            </li>
                        </ol>
                    </div>
                </div> 
		<p>
                 <button type="button" class="btn btn-primary" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/tecnico/agregarTecnico.php')" > Cargar Netbook Servicio Tecnico</button>
                 <button type="button" class="btn btn-success" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/tecnico/listarTecnicos.php')" >Listar Netbooks Servicio Tecnico</button> 	                    
        </p>				
	   <!-- /.row -->
		<form enctype="multipart/form-data" method="post" id="formAgregarTecnico" name="formAgregarTecnico">

		<?php if($mensaje){?>
			<div class="alert alert-danger">
				<strong>Error </strong><?php echo $mensaje?>
			</div>
		<?php }?>		
		
		<!--Numero De Serie-->
		<div id="algo"><label>Numero De Serie: *</label> <input type="text" class="form-control" name="numSerie" value="<?php echo $_POST['']?>" /></div><br>
		<input type="hidden" style="height:20px;width:195px;" name="dire" value="<?php echo $httpHostSitio?>" />
		
							<div id="palabra">	<p>
						<button type="button" class="btn btn-success" onclick="agregar('<?php echo $_POST['numSerie']?>'),oculta();" >Agregar</button>
	                </p></div>
		<div id="datos"></div>

	</form>	<br>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
         
         
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