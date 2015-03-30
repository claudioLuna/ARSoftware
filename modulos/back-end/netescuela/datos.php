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
header('Content-Type: text/html; charset=utf8_encode');

	include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/principal.php");
	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");	
	include_once($docRootSitio."modelo/Alumno.php");
	include_once($docRootSitio."modelo/Marca.php");	
	include_once($docRootSitio."modelo/Curso.php");
	include_once($docRootSitio."modelo/DatosEscuela.php");

	$usuario = $_SESSION["nombreUsuario"];	
	
	$alu1 = new Alumno();
	$cur1 = new Curso();
	$mar1 = new Marca();
	$datosesc = new DatosEscuela();
	$cur1->setNombreUsuario($usuario);
	$_cursos = $cur1->listarCursos();
	$mar1->setNombreUsuario($usuario);
	$_marcas = $mar1->listarMarcas();
	$_datos = $datosesc->listarDatosEscuela($_POST['datosEscuela']);
	
	?>
<form enctype="multipart/form-data" method="post" id="formAgregarTecnico" name="formAgregarTecnico">
	
	<input type="hidden" name="bandera" value="1">		
	
	<div>	
	
		<!--nombre director-->
		<div class="form-group">
        <label>Nombre Director:*</label><input class="form-control"  name="nombre" readonly="readonly();" value="<?php echo $_datos['nombreDirector']?>">
        </div>
		<!--apellido director-->
		<div class="form-group">
        <label>Nombre Director:*</label><input class="form-control"  name="apellido" readonly="readonly();" value="<?php echo $_datos['apellidoDirector']?>">
        </div>
		
		<!--cuil-->
		<div class="form-group">
        <label>Cuil Director:*</label><input class="form-control"  name="cuil" readonly="readonly();" value="<?php echo $_datos['cuilDirector']?>">
        </div>

		<!--Direccion-->
		<div class="form-group">
        <label>Direccion:*</label><input class="form-control"  name="direccion" readonly="readonly();" value="<?php echo $_datos['domicilioEscuela']?>">
        </div>
	
		<!--escuela-->
		<div class="form-group">
        <label>Escuela:*</label><input class="form-control"  name="escuela" readonly="readonly();" value="<?php echo $_datos['numeroEscuela']?>">
        </div>
		
		<!--nombrePadre-->
		<div class="form-group">
        <label>Cue:*</label><input class="form-control"  name="cueEscuela" readonly="readonly();" value="<?php echo $_datos['cueEscuela']?>">
        </div>
		
		<!--Marca Netbook-->
		<label>Curso: *</label> 
		<select class="form-control" name="curso">
            <option selected value="<?php echo $_curso['id']?>"><?php echo $_curso['nombre']?></option>
			<?php for($i=1;$i<=count($_cursos);$i++){?>
			<option value="<?php echo $_cursos[$i]['id']?>"><?php echo $_cursos[$i]['nombre']?></option>
		<?php }?>
		</select><br>
		
		<!--Marca Netbook-->
		<label>Marca De La Netbook: *</label> 
		<select class="form-control" name="MarcaNetbook">
            <option selected value="<?php echo $_marca['id']?>"><?php echo $_marca['nombre']?></option>
			<?php for($i=1;$i<=count($_marcas);$i++){?>
			<option value="<?php echo $_marcas[$i]['id']?>"><?php echo $_marcas[$i]['nombre']?></option>
		<?php }?>
		</select>
		
		<!--nombrePadre-->
		<div class="form-group">
        <label>Numero De Serie:*</label><input class="form-control"  name="numSerie" value="<?php echo $_POST['numSerie']?>">
        </div>

		<!--Numero De Serie Cargador-->
		<div class="form-group">
        <label>Numero De Serie Cargador:*</label><input class="form-control"  name="cargador" value="<?php echo $_POST['cargador']?>">
        </div>
		
		<!--Numero De Serie Cargador-->
		<div class="form-group">
        <label>Numero De Serie Bateria:*</label><input class="form-control"  name="bateria" value="<?php echo $_POST['bateria']?>">
        </div>
		
		<!--submit-->
		<input type="submit" value="Agregar" class="btn btn-success"> * Campos obligatorios
	
	</div>
	</form>		
