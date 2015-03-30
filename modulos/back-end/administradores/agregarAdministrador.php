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
	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");
	if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta p&aacute;gina.<h2>";
		exit();	
	}
	
	include_once($docRootSitio."modelo/Rol.php");		
	$rol1 = new Rol();
	
	$_roles = $rol1->listarRoles();
	
	#Rol
	if($_POST['Rol']){
		$_rol = $rol1->listarRol($_POST['Rol']);
	}
	else{
		$_rol['nombre'] = "Elija un rol para el usuario";
	}
	
?>

<?php 	if($_POST["bandera"]){			
		include_once($docRootSitio."modelo/Administrador.php");		
		$ad1 = new Administrador();
		
		$mensaje = $ad1->validarAdministrador($_POST);
		
		if(!$mensaje){						
			$ad1->agregarAdministrador();		
			header("location: listarAdministradores.php?insert=1"); 	
			exit();		
		}		
	}		
?>

	<title>
			Agregar Administrador
	</title>
	
	
<div id="container" >
	<div id="main" >
	
	<?php  include("barraAdministradores.php") ?>				
	
	<!--form-->
	<form enctype="multipart/form-data" method="post">
	
		<!--bandera-->
		<input type="hidden" name="bandera" value="1">
	
		<fieldset>
		<legend> Informaci�n del Administrador</legend>	
		
		<?php if($mensaje){?>
		<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>
		
		<!--nombre-->
		<label>Nombre: *</label> <input type="text" name="nombre" style="width:195px;height:18px;" value="<?php echo $_POST['nombre']?>" /> <br />
				
		<!--apellido-->
		<label>Apellido: *</label> <input type="text" name="apellido" style="width:195px;height:18px;" value="<?php echo $_POST['apellido']?>" /> <br />
						
		<!--Rol-->		
		<label> Rol: *</label>
			<select name="Rol" style="width:195px;height:20px;" >
					<option selected value="<?php echo $_rol['id']?>"><?php echo $_rol['nombre']?></option>
					<?php for($i=1;$i<=count($_roles);$i++){?>
						<option value="<?php echo $_roles[$i]['id']?>"><?php echo $_roles[$i]['nombre']?></option>
					<?php }?>
			</select> <br />			
		<!--nombreUsuario-->		
		<label>Nombre de usuario: * </label> <input type="text" style="width:195px;height:18px;" name="nombreUsuario" value="<?php echo $_POST['nombreUsuario']?>" /> <br />
		
		<!--clave-->		
		<label>Contrase&ntilde;a: *</label> <input type="password" style="width:195px;height:18px;" name="clave" value="<?php echo $_POST['clave']?>" /> <br />
		
		<!--submit-->
		<input type="submit" value="Agregar"> * Campos obligatorios
		
		</fieldset>
	</form>			
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>
