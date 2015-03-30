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
<?php	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/configSitio.php");	
	session_start();		
	session_unset();
	session_destroy();
	$_SESSION = array();
	
	setcookie("token",$_COOKIE['token'],time()-172800,"/","",0);
	setcookie("nombreUsuario",$_COOKIE['nombreUsuario'],time()-172800,"/","",0);	
		
	header("Location: " . $httpHostSitio . "index.php");
?>
