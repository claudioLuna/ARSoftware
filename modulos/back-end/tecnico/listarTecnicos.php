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
	#Paginación	
	$limit=25;		
	if(is_numeric($_GET['pagina']) && $_GET['pagina']>=1){				
		$offset = ($_GET['pagina']-1) * $limit;		
	}
	else{
		$offset=0;
	}
	
	#Orden por defecto
	if(!isset($_GET['campoOrder']) && !isset($_GET['order']) ){
		$order = "DESC";
	}
	else{
		$campoOrder = $_GET['campoOrder'];
		$order = $_GET['order'];
	}
	
	#incluyo clases
	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");
    include_once($docRootSitio."modelo/Administrador.php");	
	include_once($docRootSitio."modelo/Tecnico.php");			
	include_once($docRootSitio."modelo/EstadosTecnico.php");
	
	$adm1 = new Administrador();
	$usuario = $_SESSION["nombreUsuario"];
	$_nombre = $adm1->listarAdministradorins2($usuario);
	
	
	#nuevo objeto
	$tec1 = new Tecnico();
	$est1 = new Estado();	

	$_tecnicos = $tec1->listarTecnicos($offset,$limit,$campoOrder,$order,$usuario);	
	
	#getCantRegistros
	$cantRegistros = $tec1->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit);
		
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
                            <a href="<?php echo $httpHostSitio?>utiles/ctrlLogout.php"><i class="fa fa-fw fa-power-off"></i> Salir</a>
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
                            Servicio Tecnico
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Servicio Tecnico
                            </li>
                        </ol>
                    </div>
                </div> 
					
	   <!-- /.row -->
		<?php if($_GET['insert']==1){?>
				<div class="alert alert-success">
                <strong>El Servicio Tecnico Se Cargo Exitosamente.</strong>
                </div>
		<?php }?>
		
		<?php if($_GET['update']==1){?>
			<div class="alert alert-success">
                <strong>El Servicio Tecnico Se Modificó Exitosamente.</strong>
                </div>
		<?php }?>
	
	<p>
                 <button type="button" class="btn btn-primary" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/tecnico/agregarTecnico.php')" > Cargar Netbook Servicio Tecnico</button>
        </p>
	<?php
	if(!isset($_GET['order']) || $_GET['order']=="DESC"){
			$order = "ASC";
		}
		else{
			$order = "DESC";
		}		

	if(count($_tecnicos)){?>	
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th><center>Nombre</center></th>
                                <th><center>Curso</center></th>
								<th><center>Numero De Serie</center></th>
								<th><center>Marca</center></th>
								<th><center>Problema</center></th>
                                <th><center>Fecha</center></th>
								<th><center>Estado</center></th>
								<th><center>Estado Anses</center></th>
                                <th><center>Acciones</center></th>
                            </tr>
                        </thead>
                                            <tr>
             <a href="reportesTecnicos.php" target=_blank><img src="<?php echo $httpHostSitio?>imagenes/pdf.png"></a>
                               
            </tr>
                          		
<?php for($i=1;$i<=count($_tecnicos);$i++){			
						$_estado = $est1->listarEstado($_tecnicos[$i]['estado']);
			if($i%2==0){
					$class="class='alt'";
					$classTh="class='specalt'";
				}
				else{
					$class="";
					$classTh="class='spec'";
				}
		?>		

		<tr>			
			<td><center><?php echo $_tecnicos[$i]['nombreAlumno']?></center></td>
			<td><center><?php echo $_tecnicos[$i]['curso']?></center></td>
			<td><center><?php echo $_tecnicos[$i]['numeroSerie']?></center></td>
			<td><center><?php echo $_tecnicos[$i]['marca']?></center></td>
			<td><center><?php echo $_tecnicos[$i]['problema']?></center></td>
			<td><center><?php echo $_tecnicos[$i]['fecha']?></center></td>
			<td><center><?php echo  $_estado['nombre']?></td></center>
			<td><center><?php echo $_tecnicos[$i]['idreclamo']?></center></td>
			<td><center>
			<form method="post" action="modificarTecnico.php">
				<input type="hidden" name="Tecnico" value="<?php echo $_tecnicos[$i]['id']?>">
				<input type="submit" class="btn btn-primary" value="Editar">


			</form>
			<form method="post" action="eliminarTecnico.php">
				<input type="hidden" name="Tecnico" value="<?php echo $_tecnicos[$i]['id']?>">
				<input type="submit" value="Eliminar" class="btn btn-success"
				onclick="return confirm('Est seguro que desea eliminar el registro de servicio tecnico con numero de solicitud <?php echo $_tecnicos[$i]['idreclamo']?>?');">
			</form>

			</center></td>
		</tr>
	<?php }}
	else{?>

			<div class="alert alert-info">
                    <center><strong>Aviso! </strong> No existen maquinas cargadas en servicio tecnico.</center>
    </div>
	
	<?php }?>
                                        
                                                                 </div>
	</tbody>
		</table>                                           
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
