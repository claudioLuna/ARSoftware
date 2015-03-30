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
	
    include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");	
    include_once($docRootSitio."modelo/Alumno.php");
    include_once($docRootSitio."modelo/Marca.php");
    include_once($docRootSitio."modelo/Curso.php");
    include_once($docRootSitio."modelo/Turno.php");
    include_once($docRootSitio."modelo/Tecnico.php");
    include_once($docRootSitio."modelo/Prestamo.php");
	include_once($docRootSitio."modelo/Administrador.php");
	include_once($docRootSitio."modelo/DatosEscuela.php");
	include_once($docRootSitio."modelo/Consulta.php");
	
	
	#nuevo objeto
	$alu1 = new Alumno();				
	$cur1 = new Curso();
	$mar1 = new Marca();
	$adm1 = new Administrador();
	$tur1 = new Turno();
	$datoesc = new DatosEscuela();
	$consulta = new Consulta();
	
	$usuario = $_SESSION["nombreUsuario"];
	
	$alu1->setNombreUsuario($usuario);
	
	
	

	if($_POST['bandera'] && $_POST['busqueda']!=""){
		$_GET = null;
		$_consultas = $consulta->listarEstadoNetbookCurso($offset,$limit,$campoOrder,$order,$_POST['busqueda'],$_POST['campoBusqueda']);
	}
	
		
	
	#getCantRegistros
	$cantRegistros = $alu1->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit);

	#Listar Nombre Usuario
	$_nombre = $adm1->listarAdministradorins2($usuario);
	
	#campoBusqueda
	if($_POST['campoBusqueda']){
		$campoBusqueda['nombre'] = $_POST['campoBusqueda'];
		$campoBusqueda['descripcion'] = ucfirst($_POST['campoBusqueda']);
	}
	else{
		$campoBusqueda['nombre'] = "Serie";
		$campoBusqueda['descripcion'] = "Serie";
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    	<script src="<?php echo $httpHostSitio?>jquery/jquery-1.11.1.js"></script>	
	<script src="<?php echo 	$httpHostSitio?>plantilla/js/bootstrap.min.js"></script>

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
            <!--Menu-->
	
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
                           <!--Menu----------->
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php include_once($docRootSitio."utiles/menuAdministradorAR.php");?>    
            </div>
            
            
            <!--Fin Menu----------------->
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

         </div>
            <!-- /.container-fluid ------------------------------------------------------------------------------------------------------>
     <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Consultas
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Estado Netbook por Curso
                            </li>
                        </ol>
                    
                         <p>
	
	                  
	                    <button type="button" class="btn btn-primary" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/consultas/principalConsultaNet.php')" >Netbook Serie</button>
	                    <button type="button" class="btn btn-success" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/consultas/principalConsultaCurso.php')" >Netbook Curso</button> 	                    
	                    <button type="button" class="btn btn-warning" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/consultas/principalConsultaTotal.php')" >Netbook Total </button>
	                    
	
	                    
	                </p>        		
		<form method="post" style="margin:0px;padding:0px;width:550px;height:40px;">				
		<input type="hidden" name="bandera" value="1" />
		
		<div class="form-group">
       <input class="form-control"  name="busqueda" value="<?php echo $_POST['busqueda']?>">
        </div>
							
					
		<select name="campoBusqueda" style="margin:0px;padding:0px;width:100px;height:34px;float:left;">
						
			<option value="numSerie" >Serie</option>
			
		</select>
		 
		<input type="submit" value="Buscar" class="btn btn-danger"  />
		</form>
	
                    
                    
                    
                    
                    </div>
                                       
                </div> 
       
		<p>
                 
         </p>				
	   <!-- /.row -->
	   

	
<?php 
	
if(count($_consultas)){?>	
	
		                        <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
												<th>Apellido</th>
                                                <th>Cuil</th>
                                                <th>Curso</th>
												<th>Escuela</th>
												<th>Numero De Serie</th>
												<th>Estado Netbook</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
        		
		<?php for($i=1;$i<=count($_consultas);$i++){		
		
		$_curso = $cur1->listarCurso($_consultas[$i]['curso']);	
		$_marca = $mar1->listarMarca($_consultas[$i]['MarcaNetbook']);
		$_turno = $tur1->listarTurno($_consultas[$i]['turno']);
		$_datos = $datoesc->listarNumeroEscuela($_consultas[$i]['escuela']);	
		
			if($_consultas[$i]['estadoNetbook'] == "Ok")
			{
			$color= "green";
			}
			else
			{
			$color= "red";
			}

		?>			
											<tr>
                                                <td><?php echo $_consultas[$i]['nombre'];?></td>
												<td><?php echo $_consultas[$i]['apellido'];?></td>
                                                <td><?php echo $_consultas[$i]['cuil'];?></td>
                                                <td><?php echo $_curso['nombre'];?></td>
												<td><?php echo $_datos['numeroEscuela'].' - '.$_datos['nombreEscuela']?></td>
												<td><?php echo $_consultas[$i]['numSerie'];?></td>
												<th <?php echo $classTh?> style="color:<?php echo $color?>;"><?php echo $_consultas[$i]['estadoNetbook'];?></th>
											
			</tr>
		<?php }}

		
			else{?>
			<div class="alert alert-info">
                    <center><strong>Aviso! </strong> No existen resultados.</center>
    </div>
	<?php }?>
                                      
                                </div>
								  </tbody>
                                    </table>
                                            
         
         
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
