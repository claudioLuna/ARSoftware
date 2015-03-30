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
<?php include_once($docRootSitio."utiles/conexion.php");
	include_once("Iterador.php");
		
class Modulo{
		
	private $id;
	private $nombre;
	private $descripcion;
	private $ModuloPadre;
	
	public function Modulo(){}
		
	#id
	public function setId($id){
		$this->id=$id;
	}
	public function getId(){
		return $this->id;
	}
	#nombre
	public function setNombre($nombre){
		$this->nombre=$nombre;
	}
	public function getNombre(){
		return $this->nombre;
	}
	#descripcion
	public function setDescripcion($descripcion){
		$this->descripcion=$descripcion;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}
	#ModuloPadre
	public function setModuloPadre($ModuloPadre){
		$this->ModuloPadre=$ModuloPadre;
	}
	public function getModuloPadre(){
		return $this->ModuloPadre;
	}
	
	
	public function listarModulo_nombre($nombre){
		global $docRootSitio;
		$tabla = agregarMinuscula(get_class($this));
		$this->nombre = $nombre;	
	
		$q = "SELECT * FROM $tabla WHERE nombre='$this->nombre' LIMIT 1";
	
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
		$_modulo = $i1->iterarObjeto($result);	
			
		return $_modulo;	
		
	}
	
	public function listarModulos_ModuloPadre($ModuloPadre){
		global $docRootSitio;
		$tabla = agregarMinuscula(get_class($this));
		$this->ModuloPadre = $ModuloPadre;	
	
	 	$q = "SELECT * FROM $tabla WHERE ModuloPadre='$this->ModuloPadre' ORDER BY id ASC";
	
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
		$_modulosPadres = $i1->iterarObjetos($result);	
			
		return $_modulosPadres;	
		
	}
	
	public function listarModulo($Modulo){
		global $docRootSitio;
		$tabla = agregarMinuscula(get_class($this));
		$this->setId($Modulo);	
	
		$q = "SELECT * FROM $tabla WHERE id='{$this->getId()}' LIMIT 1";
	
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
		$_modulo = $i1->iterarObjeto($result);	
			
		return $_modulo;	
		
	}
	
	public function listarModulosHijos($Modulo){	
	global $docRootSitio;
	$tabla = agregarMinuscula(get_class($this));
	
	$this->setId($Modulo);
		
	$q = "SELECT * FROM $tabla WHERE ModuloPadre='{$this->getId()}'";
	
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
	$_modulosHijos = $i1->iterarObjetos($result);	
		
	return $_modulosHijos;	
}
	
}	
?>




