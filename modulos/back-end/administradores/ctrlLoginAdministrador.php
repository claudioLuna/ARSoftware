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
	include_once("../../../utiles/principal.php");			
	#incluyo clases
	include_once($docRootSitio."modelo/Administrador.php");	
	
	$ad1 = new Administrador();			
	$mensaje = $ad1->validarFormLoginAdministrador($_POST);	

	if(!$mensaje){		
		
				
		$_administrador = $ad1->loginAdministrador();								
		
		if($_administrador){
			session_start();	
			
			$_SESSION["Administrador"] = $_administrador['id'];
			$_SESSION["nombreUsuario"] = $_administrador['nombreUsuario'];
			$_SESSION["Rol"] = $_administrador['Rol'];
			
			$token = md5(rand().$_SESSION['nombreUsuario']);
			$_SESSION['token'] = $token;	
			
			
			if($_POST['recordar']) {					
				#172800 = 2d�as
				setcookie("nombreUsuario",$_SESSION["nombreUsuario"],time()+172800,"/","");	
				setcookie("token",$_SESSION['token'],time()+172800,"/","",0);	
								
			}
									
			$ad1->modificarToken($_SESSION["nombreUsuario"],$_SESSION['token']);
			
			if($_SESSION["Rol"]==1) 
			{		
			header("location: " . $httpHostSitio . "modulos/back-end/administradores/principalAdministradorAR.php"); 				
			exit();
			}
				if($_SESSION["Rol"]==2) 
			{		
			header("location: " . $httpHostSitio . "modulos/back-end/administradores/principalAdministradorSecretaria.php"); 				
			exit();
			}
				if($_SESSION["Rol"]==3) 
			{		
			header("location: " . $httpHostSitio . "modulos/back-end/administradores/principalAdministradorBiblioteca.php"); 				
			exit();
			}
				if($_SESSION["Rol"]==4) 
			{		
			header("location: " . $httpHostSitio . "modulos/back-end/administradores/principalAdministradorPreceptor.php"); 				
			exit();
			}
		}
		else{
			$mensaje = "La combinaci�n de nombre de usuario y contrase�a es incorrecta.";			
		}		
	}	
?>