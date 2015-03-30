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
<?php
header('Content-Type: text/html; charset=ISO-8859-1');

	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/principal.php");	
	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");	
	include_once($docRootSitio."modelo/Netbook.php");
	include_once($docRootSitio."modelo/Marca.php");	
	include_once($docRootSitio."modelo/Alumno.php");
	include_once($docRootSitio."modelo/Prestamo.php");
	include_once($docRootSitio."modelo/Curso.php");
	include_once($docRootSitio."modelo/Tecnico.php");
			
	$net1 = new Netbook();
	$mar1 = new Marca();
	$alu1 = new Alumno();
	$pre1 = new Prestamo();
	$cur1 = new Curso();
	$tec1 = new Tecnico();
	
	$usuario = $_SESSION["nombreUsuario"];
	
	$_cursos = $cur1->listarCursos();
	$_netbook = $alu1->listarNetbookPrestamo($_POST['numSerie'],$usuario);
	$mar1->setNombreUsuario($usuario);
	$_marca = $mar1->listarMarca($_netbook['MarcaNetbook']);
	$_alumnosinnetbooks = $alu1->listarAlumnosSinNetbook();
	
	#Estado
	if($_POST['Alumno']){
		$_alumnosinnetbook = $alu1->listarAlumnos($_POST['alumno']);
	}
	else{
		$_alumnosinnetbook['nombre'] = "Elija Alumno";
	}
	if($_netbook['estadoNetbook'] == "S Tecnico")
			{
				$_tecnico = $tec1->listarTecnicoEstado($_POST['numSerie'],$usuario);
				$mensaje = "Netbook  en servicio tecnico con el siguiente  numero de solicitud: ";
				?>
				<div class="alert alert-danger">
				<strong>Error </strong><?php echo $mensaje.''.$_tecnico['idreclamo']?>
				</div>
				<?php
			}
	elseif($_netbook['estado']==0 AND $_netbook['estado']!=null)
			{
				$_prestamo = $pre1->listarAlumnosPrestamos($_POST['numSerie']); 
				$_alumno = $alu1->listarAlumno($_prestamo['nombre']);
				$mensaje = "Netbook prestada a: ";
				?>
				<div class="alert alert-danger">
				<strong>Error </strong><?php echo $mensaje.''.$_alumno['nombre']?>
				</div>
				<?php
			}
		elseif($_netbook['estado']==1)
			{
				?>	
				<form enctype="multipart/form-data" method="post" id="formAgregarNetbook" name="formAgregarNetbook">
				<input type="hidden" name="bandera" value="1">		
				<?php $fechaHasta= date("Y-m-d", strtotime("+5 day")) ;?> 
				<div>	
					<label>Numero De Serie Netbook: *</label> <input class="form-control" readonly="readonly();" name="numSerie" value="<?php echo $_netbook['numSerie']?>" /><br>
					<label>Marca: *</label> <input class="form-control" readonly="readonly();" name="marca" value="<?php echo $_marca['nombre']?>" /><br>
					<label>Curso: *</label> <input class="form-control" readonly="readonly();" name="curso" value="<?php echo $_netbook['curso']?>" /><br>
					<label>Fecha Prestamo: *</label> <input class="form-control"  readonly="readonly();" name="fechaDesde" value="<?php echo date("Y-m-d")?>" /><br>
					<label>Fecha Devolucion: *</label> <input class="form-control" name="fechaHasta" value="<?php echo $fechaHasta?>" /><br>
					<label>Alumno: *</label> 
						<select name="alumno" class="form-control" >
						<option selected value="<?php echo $_alumnosinnetbook['id']?>"><?php echo $_alumnosinnetbook['nombre']?></option>
						<?php for($i=1;$i<=count($_alumnosinnetbooks);$i++){?>
						<option value="<?php echo $_alumnosinnetbooks[$i]['id']?>"><?php echo $_alumnosinnetbooks[$i]['nombre'].' '.$_alumnosinnetbooks[$i]['apellido']?></option>
						<?php }?>
						</select> <br />
					<!--submit-->
					<input type="submit" value="Agregar" class="btn btn-success"> * Campos obligatorios
		
				</div>
				</form>	
				<?php
			}	
		else
			{
				$mensaje = "Esa netbook no esta cargada en el sistema";
				?>
				<div class="alert alert-danger">
				<strong>Error </strong><?php echo $mensaje?>
				</div>
			
				<?php
			}
			?>