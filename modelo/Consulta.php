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
<?php	include_once($docRootSitio."utiles/conexion.php");
	include_once("Iterador.php");	
		
class Consulta{
		
	private $id;
	
	
	public function Consulta(){}
	
	#id	
	public function setId($id){
		$this->id = mysql_real_escape_string(strip_tags(trim($id)));		
	}	
		public function getCantRegistros(){
		$q = "SELECT FOUND_ROWS() as cantidad";
		
		try{
			$result = mysql_query($q);
				if(!$result) {
					throw new Exception("");
				}
		}      
		catch (Exception $e) {        
			$error['consulta'] = $q;
			$error['mysql'] = mysql_error();            
			include_once ($docRootSitio . "modulos/errores/listarErrores.php");
			exit();
		}
		
		$i1 = new Iterador();
		$_objeto = $i1->iterarObjeto($result);
		$cantRegistros = $_objeto['cantidad'];
			
		return $cantRegistros;	
		
	}

	/////////Listar Por Estados////
	
	public function listarEstadoNetbookCurso($offset="",$limit="",$campoOrder="",$order="",$busqueda,$campoBusqueda) {
$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno numSerie WHERE "
				." $campoBusqueda LIKE '$busqueda%' ";
	
	
		$result = mysql_query($q);
		$orden = new Iterador();
		$_consultas = $orden->iterarObjetos($result);
			
		return $_consultas;
	}

  
	/////////////////////////////////
	/////////Listar Por Estados////
	
	public function listarNetbookCurso($offset="",$limit="",$campoOrder="",$order="",$busqueda,$campoBusqueda) {
	
 $q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno  WHERE curso= $busqueda ORDER BY estadoNetbook ";
	
	
	
				$result = mysql_query($q);
				$orden = new Iterador();
				$_consultas = $orden->iterarObjetos($result);
					
				return $_consultas;
	}
	
	

	
	
	
	/////////Listar Todo////
	
	public function listarNetbookTotal($offset="",$limit="",$campoOrder="",$order="") {
	
	 $q = "SELECT DISTINCT numserie FROM  `alumno` WHERE numserie !=0 LIMIT 0 , 30 ";
	
	
	
		$result = mysql_query($q);
		$orden = new Iterador();
		$_consultas = $orden->iterarObjetos($result);
			
		return $_consultas;
	
	
	
	
	
	}
	
	
	/////////Listar Total Servicio////
	
	public function listarNetbookTotalServicio($offset="",$limit="",$campoOrder="",$order="") {
	
		$q = "SELECT * FROM  `tecnico` WHERE estado = 1 or estado = 2 LIMIT 0 , 30 ";
	
	
	
		$result = mysql_query($q);
		$orden = new Iterador();
		$_consultas = $orden->iterarObjetos($result);
			
		return $_consultas;
	
	
	
	
	
	}

	/////////Listar Total Servicio////
	
	public function listarNetbookTotalOk($offset="",$limit="",$campoOrder="",$order="") {
	
		$q = "SELECT * FROM  `alumno` WHERE estado = 1 LIMIT 0 , 30 ";
	
	
	
		$result = mysql_query($q);
		$orden = new Iterador();
		$_consultas = $orden->iterarObjetos($result);
			
		return $_consultas;
	
	
	
	
	
	}
	
	
	
	
	
	
	
	/////////////////
	
}
			