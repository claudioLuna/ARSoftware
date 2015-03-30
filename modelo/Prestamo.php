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
		
class Prestamo{
		
	private $id;
	private $numSerie;
	private $curso;
	private $fechaDesde;
	private $fechaHasta;
	private $alumno;
	
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
	
	#fechaDesde
	public function setFechaDesde($fechaDesde){
		$this->fechaDesde = mysql_real_escape_string(strip_tags(trim($fechaDesde)));	
	}
	public function getFechaDesde(){	
		return $this->fechaDesde;
	}	

	#fechaHasta
	public function setFechaHasta($fechaHasta){
		$this->fechaHasta = mysql_real_escape_string(strip_tags(trim($fechaHasta)));		
	}
	public function getFechaHasta(){	
		return $this->fechaHasta;
	}		
	
	#nombre	
	public function setNombre($nombre){
		$this->nombre = mysql_real_escape_string(strip_tags(trim($nombre)));	
	}
	public function getNombre(){
		return $this->nombre;
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
	
	public function existePrestamo(){
	global $docRootSitio;	
		
	$q="SELECT netbook FROM prestamo WHERE numSerie='{$this->getNumSerie()}' ";
									
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
			
	public function listarPrestamo($Prestamo){
		global $docRootSitio;		
		$this->setId($Prestamo);
				
		$q = "SELECT * FROM prestamo WHERE id='{$this->getId()}' LIMIT 1";
	
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
		$_prestamo = $i1->iterarObjeto($result);					
		return $_prestamo;	
	}
	
	public function listarPrestamos($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM prestamo WHERE estado = '1'";
				
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
	
	public function setPrestamo($_post){
		if(is_array($_post)){			
			$_campos = array_keys($_post);		
		}	
			
		for($i=0;$i<count($_campos);$i++){		
			if($_post[$_campos[$i]] != '' && method_exists ($this,"set".agregarMayuscula($_campos[$i]))){
			$this->{"set".agregarMayuscula($_campos[$i])}($_post[$_campos[$i]]);
			}				
		}		
	}
	
	public function validarPrestamo($_post){	
	$this->setPrestamo($_post);

	if($this->getNumSerie() == ''){
		$mensaje = "Debes Escribir El <strong>Numero De Serie</strong> De La Netbook.";	
		return $mensaje;
	}
	
	if($this->getCurso() == ''){
		$mensaje = "Debes Escribir El <strong>Curso</strong> De La Netbook.";	
		return $mensaje;
	}
	
	if($this->getNombre() == ''){
		$mensaje = "Debes Seleccionar El <strong>Alumno</strong> A Quien Se Le Va A Prestar La Netbook.";	
		return $mensaje;
	}


}	
	
	public function agregarPrestamo(){		
	global $docRootSitio;   			
 	
	$q="INSERT INTO prestamo (id,numSerie,curso,fechaDesde,fechaHasta,nombre,estado) "
			."VALUES ('','{$this->getNumSerie()}','{$this->getCurso()}','{$this->getFechaDesde()}','{$this->getFechaHasta()}','{$this->getNombre()}','1');";

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
	
	public function eliminarPrestamo($Prestamo) {
	global $docRootSitio; 	
	$this->setId($Prestamo);
		
	$q = "DELETE FROM prestamo WHERE id='{$this->getId()}' LIMIT 1";
	
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
	
	public function modificarPrestamo(){
		global $docRootSitio;			
				
	  echo $q="UPDATE prestamo SET fechaHasta='{$this->getFechaHasta()}' WHERE id='{$this->getId()}'";	
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
	
	public function modificarDevolver($Prestamo){
	global $docRootSitio;			
	$this->setId($Prestamo);
	
		$q="UPDATE prestamo SET estado='0' WHERE numSerie='{$this->getId()}'";	
		
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
	
	public function listarAlumnosPrestamos($Prestamo){
		global $docRootSitio;		
		$this->setId($Prestamo);
				
		$q = "SELECT * FROM prestamo WHERE numSerie='{$this->getId()}' AND estado = '1' LIMIT 1";
	
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
		$_alumno = $i1->iterarObjeto($result);					
		return $_alumno;	
	}
	
}
			