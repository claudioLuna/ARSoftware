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
	include_once($docRootSitio."modelo/Alumno.php");
	include_once($docRootSitio."modelo/Marca.php");	
	include_once($docRootSitio."modelo/Curso.php");
	include_once($docRootSitio."modelo/EstadosTecnico.php");
	include_once($docRootSitio."modelo/Tecnico.php");

	$usuario = $_SESSION["nombreUsuario"];	
	
	$alu1 = new Alumno();
	$cur1 = new Curso();
	$mar1 = new Marca();
	$est1 = new Estado();
	$tec1 = new Tecnico();
	
	$_alumno = $alu1->listarAlumno2($_POST['numSerie'],$usuario);
	$mar1->setNombreUsuario($usuario);
	$_marca = $mar1->listarMarca($_alumno['MarcaNetbook']);
	$_curso = $cur1->listarCurso($_alumno['curso']);
	$_tecnico = $tec1->listarTecnicoEstado($_POST['numSerie'],$usuario);
	$_estados = $est1->listarEstados();
	
	#Estado
	if($_POST['Estado']){
		$_estado = $est1->listarEstados($_POST['Estado']);
	}
	else{
		$_estado['nombre'] = "Elija un Estado";
	}
if($_POST['numSerie']=='')
{
echo "es asi";
exit();
}	
else
{

	if($_tecnico['estado']==1 OR $_tecnico['estado']==2)
	{
	$mensaje = "Netbook ya cargada en servicio tecnico con el siguiente  numero de solicitud: ";
	?>
	<div class="alert alert-danger">
			<strong>Error </strong><?php echo $mensaje.''.$_tecnico['idreclamo']?>
	<?php
	}
elseif($_alumno['nombre']=='')
{
$mensaje = "Esa netbook no esta cargada en el sistema";
	?>
	<div class="alert alert-danger">
			<strong>Error </strong>Esa netbook no esta cargada en el sistema.
    </div>
		
	<?php
}

else
{
?>	
<form enctype="multipart/form-data" method="post" id="formAgregarTecnico" name="formAgregarTecnico">
	
	<input type="hidden" name="bandera" value="1">		
	
	<div>	
	
		<!--alumno-->
		<div class="form-group">
        <label>Numero De Serie Netbook:*</label><input class="form-control" readonly="readonly();" name="serie" value="<?php echo $_alumno['numSerie']?>">
        </div>
		<!--alumno-->
		<div class="form-group">
        <label>Numero:*</label><input class="form-control" readonly="readonly();" readonly="readonly();" name="nombre" value="<?php echo $_alumno['nombre']?>">
        </div>
		<!--Curso-->
		<div class="form-group">
        <label>Curso:*</label><input class="form-control" readonly="readonly();" readonly="readonly();" name="curso" value="<?php echo $_curso['nombre']?>">
        </div>
		<!--Cuil-->
		<div class="form-group">
        <label>Cuil:*</label><input class="form-control" readonly="readonly();" readonly="readonly();" name="cuil" value="<?php echo $_alumno['cuil']?>">
        </div>
		<!--Marca Netbook-->
		<div class="form-group">
        <label>Marca Netbook:*</label><input class="form-control" readonly="readonly();" readonly="readonly();" name="MarcaNetbook" value="<?php echo $_marca['nombre']?>">
        </div>
		<!--Id Reclamo-->
		<div class="form-group">
        <label>Id Reclamo:*</label><input class="form-control" name="reclamo" value="">
        </div>
		<!--Problema Expresado Por El Alumno-->
		<div class="form-group">
        <label>Problema Expresado Por El Alumno:*</label><input class="form-control" name="problema" value="">
        </div>
		<!--Estado-->
		<label>Estado: *</label> 
		<select class="form-control" name="estado">
            <option selected value="<?php echo $_estado['id']?>"><?php echo $_estado['nombre']?></option>
			<?php for($i=1;$i<=count($_estados);$i++){?>
			<option value="<?php echo $_estados[$i]['id']?>"><?php echo $_estados[$i]['nombre']?></option>
		<?php }?>
		</select>
		<br>
		<!--submit-->
		<input type="submit" name="botoncargar" value="Cargar" class="btn btn-success"> * Campos obligatorios
	</div>
	</form>		
<?php }}?>