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
		
class Netbook{
		
	private $id;
	private $numSerie;
	private $curso;
	private $MarcaNetbook;
	private $estado;
	
	public function Netbook(){}
	
	#id	
	public function setId($id){
		$this->id = mysql_real_escape_string(strip_tags(trim($id)));		
	}	
	public function getId(){	
		return $this->id;
	}
	
	#numSerie	
	public function setNumSerie($numSerie){
		$this->numSerie = mysql_real_escape_string(strip_tags(trim($numSerie)));	
	}
	public function getNumSerie(){
		return $this->numSerie;
	}
	
	#curso	
	public function setCurso($curso){
		$this->curso = mysql_real_escape_string(strip_tags(trim($curso)));	
	}
	public function getCurso(){
		return $this->curso;
	}	
	
	#MarcaNetbook	
	public function setMarcaNetbook($MarcaNetbook){
		$this->MarcaNetbook = mysql_real_escape_string(strip_tags(trim($MarcaNetbook)));	
	}
	public function getMarcaNetbook(){
		return $this->MarcaNetbook;
	}		
	
	#estado	
	public function setEstado($estado){
		$this->estado = mysql_real_escape_string(strip_tags(trim($estado)));	
	}
	public function getEstado(){
		return $this->estado;
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
	
	public function existeNetbook(){
	global $docRootSitio;	
		
	$q="SELECT netbook FROM alumno WHERE numSerie='{$this->getNumSerie()}' ";
									
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
	$_cliente = $i1->iterarObjeto($result);
			
	if($_cliente['nombre']){
		return 1;
	}
	else{
		return 0;
	}	
}
			
	public function listarNetbook($Netbook){
		global $docRootSitio;		
		$this->setId($Netbook);
				
		$q = "SELECT * FROM netbook WHERE id='{$this->getId()}' LIMIT 1";
	
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
		$_netbook = $i1->iterarObjeto($result);					
		return $_netbook;	
	}
	
	public function listarNetbookPrestamo($Netbook){
		global $docRootSitio;		
		$this->setId($Netbook);
				
		$q = "SELECT * FROM netbook WHERE numSerie='{$this->getId()}' LIMIT 1";
	
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
		$_netbook = $i1->iterarObjeto($result);					
		return $_netbook;	
	}
	
	public function listarNetbooks($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM netbook ";
				
		if($campoOrder!= "" && $order!=""){			
			${$campoOrder} = $campoOrder;			
			$q .= " ORDER BY  ${$campoOrder} $order ";						
		}		
		
		if($limit!=""){
			$q .= " LIMIT $offset,$limit ";			
		}
				
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
		$_netbooks = $i1->iterarObjetos($result);	
			
		return $_netbooks;	
	}
	
	public function setNetbook($_post){
		if(is_array($_post)){			
			$_campos = array_keys($_post);		
		}	
			
		for($i=0;$i<count($_campos);$i++){		
			if($_post[$_campos[$i]] != '' && method_exists ($this,"set".agregarMayuscula($_campos[$i]))){
			$this->{"set".agregarMayuscula($_campos[$i])}($_post[$_campos[$i]]);
			}				
		}		
	}
	
	public function validarNetbook($_post){	
	$this->setNetbook($_post);

	if($this->getNumSerie() == ''){
		$mensaje = "Debes Escribir El <strong>Numero De Serie</strong> De La Netbook.";	
		return $mensaje;
	}
	
	if($this->getMarcaNetbook() == 0){
		$mensaje = "Debes Seleccionar Un <strong>Marca</strong> De Netbook.";	
		return $mensaje;
	}
	

}	
	
	public function agregarNetbook(){		
	global $docRootSitio;   			
 	
	$q="INSERT INTO netbook (id,numSerie,curso,MarcaNetbook,estado) "
			."VALUES ('','{$this->getNumSerie()}','Uso Escolar','{$this->getMarcaNetbook()}','1');";
	
	try {			
		$result = mysql_query($q);
		$this->setId(mysql_insert_id());
           if(!$result) {
            throw new Exception("<b>Explicar el error aqu�</b>");
            
			}
		}
		catch (Exception $e) {
				mysql_query("ROLLBACK");
				$error['consulta'] = $q;
				$error['mysql'] = mysql_error();            
				include_once ($docRootSitio . "modulos/errores/listarErrores.php");
				exit();
		}			  		
				
		return 1;			
}
	
	public function modificarNetbook(){
		global $docRootSitio;			
				
	  $q="UPDATE netbook SET curso='Uso Escolar',MarcaNetbook='{$this->getMarcaNetbook()}',numSerie='{$this->getNumSerie()}',estado='1' WHERE id='{$this->getId()}'";	
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
			
		return 	1;
	}
	
	public function modificarEstadoNetbook($Netbook){
	global $docRootSitio;			
	$this->setId($Netbook);
	
		$q="UPDATE alumno SET estado='0' WHERE numSerie='{$this->getId()}'";	
		
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
			
		return 	1;
	}
	
	public function modificarDevolver($Netbook){
	global $docRootSitio;			
	$this->setId($Netbook);
	
	echo	$q="UPDATE netbook SET estado='1' WHERE numSerie='{$this->getId()}'";	
		
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
			
		return 	1;
	}
		
	public function eliminarNetbook($Netbook) {
	global $docRootSitio; 	
	$this->setId($Netbook);
		
	$q = "DELETE FROM netbook WHERE id='{$this->getId()}' LIMIT 1";
	
	try {
	
	$result = mysql_query($q);
            if(!$result) {
                throw new Exception("");
            }
    }      
    catch (Exception $e) {        
			mysql_query("ROLLBACK");
			$error['consulta'] = $q;
            $error['mysql'] = mysql_error();            
            include_once ($docRootSitio . "modulos/errores/listarErrores.php");
            exit();
    }		
	return 1;
}
	
	
}
			