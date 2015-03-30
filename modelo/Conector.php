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
<?php #CLASE Conector
class Conector {

	private $host;
	private $usuarioDb;
	private $claveDb;
	private $db;	

#Constructor
function Conector($host,$usuarioDb,$claveDb,$db) {
	$this->host = $host;	
	$this->usuarioDb = $usuarioDb;	
	$this->claveDb = $claveDb;	
	$this->db = $db;
}
	
function conectar() {
	global $docRootSitio;

	try{
			$conexion = mysql_connect($this->host,$this->usuarioDb,$this->claveDb);
			$select_db = mysql_select_db($this->db);
			
				if(!$conexion || !$select_db) {
					throw new Exception("<b>Error de CONEXION;</b>");
				}
		}      
		catch (Exception $e) {        

			$error['mysql'] = mysql_error();            
            include_once ($docRootSitio . "modulos/errores/listarErrores.php");
            exit();
    }	
	
	return $conexion;
}

public function desconectar($conexion){
	mysql_close($conexion);
	
}
  
}
?>








