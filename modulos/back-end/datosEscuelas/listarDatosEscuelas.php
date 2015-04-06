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

	#Paginacion	
	$limit=25;		
	if(is_numeric($_GET['pagina']) && $_GET['pagina']>=1){				
		$offset = ($_GET['pagina']-1) * $limit;		
	}
	else{
		$offset=0;
	}
	
	#Orden por defecto
	if(!isset($_GET['campoOrder']) && !isset($_GET['order']) ){
		$campoOrder = "nombreEscuela";
		$order = "DESC";
	}
	else{
		$campoOrder = $_GET['campoOrder'];
		$order = $_GET['order'];
	}
	
	#incluyo clases
	include_once($docRootSitio."modelo/DatosEscuela.php");		
	include_once($docRootSitio."modelo/Fecha.php");	
	include_once($docRootSitio."modelo/Rol.php");
	include_once($docRootSitio."modelo/Administrador.php");	
		
	#nuevo objeto
	$datoesc = new DatosEscuela();			
	$fe1 = new Fecha();	
	$rol1 = new Rol();
	$adm1 = new Administrador();
	
	$usuario = $_SESSION["nombreUsuario"];	
	
	$datoesc->setNombreUsuario($usuario);
	
	$_datos = $datoesc->listarDatosEscuelas();	
	$_nombre = $adm1->listarAdministradorins2($usuario);
	
	#getCantMenu
	$cantRegistros = $datoesc->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit); 	
			
?>

<div id="container" >
	<div id="main" >				
	
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
                          <!--Menu----------->
            
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
                            Datos Escuelas
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Datos Escuela
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
	
		<?php if($_GET['insert']==1){?>
			<div class="alert alert-success">
                <strong>Los datos se agregaron exitosamente.</strong>
            </div>
		<?php }?>
		
		<?php if($_GET['update']==1){?>
			<div class="alert alert-success">
                <strong>Los datos se modificaron de la Base de Datos.</strong>
            </div>
		<?php }?>
			
		<?php if($_GET['delete']==1){?>
			<div class="alert alert-success">
                <strong>La escuela se Elimino exitosamente.</strong>
            </div>
		<?php }?>
		
	<?php
	if($_datos!='')
	{
		
	}
	else
	{
		?>
           <p>
	<button type="button" class="btn btn-primary" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/datosEscuelas/agregarDatosEscuelas.php')" >  Agregar Datos</button>
         
</p>
    <?php
	}    
	?>
		<?php for($i=1;$i<=count($_datos);$i++){	
								
			?>   
			<center> 
			
          <table class="table table-bordered table-hover table-striped">
          
                                        <thead>
                                            <tr>
                                               <td><center><b>Nombre Director</b></center></td>
                                               <td><center><b>Apellido Director</b></center></td>
											   <td><center><b>Nombre Escuela</b></center></td>
                                               <td><center><b>Direccion</b></center></td>
											   <td><center><b>Ciudad</b></center></td>
											   <td><center><b>Provincia</b></center></td>
                                               <td><center><b>Accion</b></center></td>

                                            </tr>
                                        </thead>
                                        <tbody>
                                    

                                            <tr>
                                                <td><center><?php echo $_datos[$i]['nombreDirector']?></center></td>
												<td><center><?php echo $_datos[$i]['apellidoDirector']?></center></td>
                                                <td><center><?php echo $_datos[$i]['numeroEscuela'].' - '.$_datos[$i]['nombreEscuela']?></center></td>
                                                <td><center><?php echo $_datos[$i]['domicilioEscuela']?></center></td>
												<td><center><?php echo $_datos[$i]['ciudad']?></center></td>
                                                <td><center><?php echo $_datos[$i]['provincia']?></center></td>
					<td><center>     
						<form method="post" action="modificarDatosEscuela.php">
							<input type="hidden" name="DatosEscuela" value="<?php echo $_datos[$i]['id']?>">
							<input type="submit" class="btn btn-primary" value="Editar">
						</form>
						<form method="post" action="verMasDatosEscuela.php">
							<input type="hidden" name="DatosEscuela" value="<?php echo $_datos[$i]['id']?>">
							<input type="submit" class="btn btn-success" value="Ver Mas">
						</form>
						<form method="post" action="eliminarDatosEscuela.php">
						<input type="hidden" name="DatosEscuela" value="<?php echo $_datos[$i]['id']?>">
						<input type="submit" value="Eliminar" class="btn btn-warning"
						onclick="return confirm('Est seguro que desea eliminar la escuela <?php echo $_datos[$i]['cueEscuela']?>?');">
					</form>
					</center>
					</td>
				</tr>
           <?php }?>
		<?php if($_datos==0){?>
			<div class="alert alert-info">
                    <center><strong>Aviso! </strong> No existen datos cargados.</center>
		</div>
	<?php }?>
                                    </table>
									</center>
    
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
