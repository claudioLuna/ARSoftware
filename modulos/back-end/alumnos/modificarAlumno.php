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
	include_once($docRootSitio."modelo/DatosEscuela.php");
  	include_once($docRootSitio."modelo/Alumno.php");		
	include_once($docRootSitio."modelo/Marca.php");	
	include_once($docRootSitio."modelo/Curso.php");
	include_once($docRootSitio."modelo/Turno.php");
	
	$alu1 = new Alumno();			
	$mar1 = new Marca();	
	$cur1 = new Curso();
	$tur1 = new Turno();	
	$adm1 = new Administrador();
	$datoesc = new DatosEscuela();
	
	#Variable
	$usuario = $_SESSION["nombreUsuario"];
	
	$_alumno = $alu1->listarAlumno($_POST['Alumno']);
	$mar1->setNombreUsuario($usuario);
	$_marcas = $mar1->listarMarcas();
	$cur1->setNombreUsuario($usuario);
	$_cursos = $cur1->listarCursos();
	$_turnos = $tur1->listarTurnos();
	$datoesc->setNombreUsuario($usuario);
	$datoesc->setNombreEscuela($_alumno['escuela']);
	$_escuelas = $datoesc->listarEscuelas();
	$_nombre = $adm1->listarAdministradorins2($usuario);
	
	#nombre
	if($_POST['nombre']){
		$nombre = $_POST['nombre'];
	}
	else{		
		$nombre = $_alumno['nombre'];
	}	
	
	#apellido
	if($_POST['apellido']){
		$apellido = $_POST['apellido'];
	}
	else{		
		$apellido = $_alumno['apellido'];
	}	
	
	#cuil
	if($_POST['cuil']){
		$cuil = $_POST['cuil'];
	}
	else{		
		$cuil = $_alumno['cuil'];
	}
	
	#direccion
	if($_POST['direccion']){
		$direccion = $_POST['direccion'];
	}
	else{
		$direccion = $_alumno['direccion'];
	}

	#curso
	if($_POST['escuela']){
		$_escuela = $datoesc->listarEscuela($_POST['escuela']);
		}
	else{
		if($_alumno['nombreEscuela'] != ''){
			$_escuela = $datoesc->listarEscuela($_alumno['nombreEscuela']);
		}
		else{
			$_escuela['nombre'] = "Elija una Escuela para el alumnos";
		}
	}
	
	#curso
	if($_POST['curso']){
		$_curso = $cur1->listarCurso($_POST['curso']);
		}
	else{
		if($_alumno['curso']!=0){
			$_curso = $cur1->listarCurso($_alumno['curso']);
		}
		else{
			$_curso['nombre'] = "Elija un Curso para el alumnos";
		}
	}
	#turno
	if($_POST['turno']){
		$_turno = $tur1->listarTurno($_POST['turno']);
		}
	else{
		if($_alumno['turno']!=0){
			$_turno = $tur1->listarTurno($_alumno['turno']);
		}
		else{
			$_turno['nombre'] = "Elija un Turno para el alumnos";
		}
	}
	#nombrePadre
	if($_POST['nombrePadre']){
		$nombrePadre = $_POST['nombrePadre'];
	}
	else{		
		$nombrePadre = $_alumno['nombrePadre'];
	}
	#apellidoPadre
	if($_POST['apellidoPadre']){
		$apellidoPadre = $_POST['apellidoPadre'];
	}
	else{		
		$apellidoPadre = $_alumno['apellidoPadre'];
	}
	
	#cuilPadre
	if($_POST['cuilPadre']){
		$cuilPadre = $_POST['cuilPadre'];
	}
	else{		
		$cuilPadre = $_alumno['cuilPadre'];
	}
	
	#MarcaNetbook
	if($_POST['MarcaNetbook']){
		$_marca = $mar1->listarMarca($_POST['MarcaNetbook']);
		}
	else{
		if($_alumno['MarcaNetbook']!=0){
			$_marca = $mar1->listarMarca($_alumno['MarcaNetbook']);
		}
		else{
			$_marca['nombre'] = "Elija una Marca de Netbook para el alumnos";
		}
	}
	
	#numSerie
	if($_POST['numSerie']){
		$numSerie = $_POST['numSerie'];
	}
	else{		
		$numSerie = $_alumno['numSerie'];
	}
	#bandera
	if($_POST["bandera"]){				
	$mensaje = $alu1->validarAlumno($_POST);
		if(!$mensaje){						
			$update = $alu1->modificarAlumno();	
			header("location: listarAlumnos.php?update=$update");	
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
	<script src="<?php echo 	$httpHostSitio?>plantilla/js/bootstrap.min.js"></script>
    
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

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Modificar Alumno
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Alumno
                            </li>
                        </ol>
                    </div>
                </div>
									<p>
						<button type="button" class="btn btn-primary" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/alumnos/agregarAlumno.php')" > Agregar Alumnos</button>
	                    <button type="button" class="btn btn-success" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/alumnos/listarAlumnos.php')" >Listar Alumnos</button> 	                    
	                </p>
				<!--form-->
	<form enctype="multipart/form-data" method="post">	
		<!--Marca-->
		<input type="hidden" name="Marca" value="<?php echo $alu1->getId()?>" />
		<!--id-->
		<input type="hidden" name="id" value="<?php echo $alu1->getId()?>" />		
		
		<!--bandera-->
		<input type="hidden" name="bandera" value="1" />	
		
	<?php if($mensaje){?>
					<div class="alert alert-danger">
		<strong>Error </strong><?php echo $mensaje?>
	</div> 
		<?php }?>	
	//include_once($docRootSitio."utiles/ctrlAcceso.php");	
     //echo $httpHostSitio ;
		
		<!--alumno-->
		<div class="form-group">
        <label>Nombre:*</label><input class="form-control"  name="nombre" value="<?php echo $nombre?>">
        </div>
		<!--apellido-->
		<div class="form-group">
        <label>Apellido:*</label><input class="form-control"  name="apellido" value="<?php echo $apellido?>">
        </div>
		<!--cuil-->
		<div class="form-group">
        <label>Cuil:*</label><input class="form-control"  name="cuil" value="<?php echo $cuil?>">
        </div>
		<!--Direccion-->
		<div class="form-group">
        <label>Direccion:*</label><input class="form-control"  name="direccion" value="<?php echo $direccion?>">
        </div>
		<!--Escuela-->
		<label>Escuela: *</label> 
		<select class="form-control" name="escuela">
            <option selected value="<?php echo $_escuela['nombreEscuela']?>"><?php echo $_escuela['nombreEscuela']?></option>
			<?php for($i=1;$i<=count($_escuelas);$i++){?>
			<option value="<?php echo $_escuelas[$i]['nombreEscuela']?>"><?php echo $_escuelas[$i]['numeroEscuela'].' - '.$_escuelas[$i]['nombreEscuela']?></option>
		<?php }?>
		</select>
		<!--Curso-->
		<label>Curso: *</label> 
		<select class="form-control" name="curso">
            <option selected value="<?php echo $_curso['id']?>"><?php echo $_curso['nombre']?></option>
			<?php for($i=1;$i<=count($_cursos);$i++){?>
			<option value="<?php echo $_cursos[$i]['id']?>"><?php echo $_cursos[$i]['nombre']?></option>
		<?php }?>
		</select>
		<!--Turno-->
		<label>Turno: *</label> 
		<select class="form-control" name="turno">
            <option selected value="<?php echo $_turno['id']?>"><?php echo $_turno['nombre']?></option>
			<?php for($i=1;$i<=count($_turnos);$i++){?>
			<option value="<?php echo $_turnos[$i]['id']?>"><?php echo $_turnos[$i]['nombre']?></option>
		<?php }?>
		</select>
		<!--Nombre Padre-->
		<div class="form-group">
        <label>Nombre Padre:*</label><input class="form-control"  name="nombrePadre" value="<?php echo $nombrePadre?>">
        </div>
		<!--Apellido Padre-->
		<div class="form-group">
        <label>Apellido Padre:*</label><input class="form-control"  name="apellidoPadre" value="<?php echo $apellidoPadre?>">
        </div>
		<!--Cuil Padre-->
		<div class="form-group">
        <label>Cuil Padre:*</label><input class="form-control"  name="cuilPadre" value="<?php echo $cuilPadre?>">
        </div>
		<!--Marca Netbook-->
		<label>Marca Netbook: *</label>
		<select class="form-control" name="MarcaNetbook">
            <option selected value="<?php echo $_marca['id']?>"><?php echo $_marca['nombre']?></option>
			<?php for($i=1;$i<=count($_turnos);$i++){?>
			<option value="<?php echo $_marcas[$i]['id']?>"><?php echo $_marcas[$i]['nombre']?></option>
		<?php }?>
		</select>
		<!--Numero De Serie-->
		<div class="form-group">
        <label>Numero De Serie:*</label><input class="form-control"  name="numSerie" value="<?php echo $numSerie?>">
        </div>
		
		<!--submit-->
		<input type="submit"  class="btn btn-success" value="Modificar"> * Campos obligatorios
	
	</form>		
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