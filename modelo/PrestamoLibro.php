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
		
class PrestamoLibro{
		
	private $id;
	private $idLibro;
	private $nombreAlumno;
	private $alumno;
	private $curso;
	private $nombreLibro;
	private $fechaPrestamo;
	private $fechaDevolucion;
	private $estadoLibro;
			
	public function PrestamoLibro(){}
	
	#id	
	public function setId($id){
		$this->id = mysql_real_escape_string(strip_tags(trim($id)));		
	}	

	public function getId(){	
		return $this->id;
	}
	
	#idLibro
	public function setIdLibro($idLibro){
		$this->idLibro = mysql_real_escape_string(strip_tags(trim($idLibro)));		
	}	
	public function getIdLibro(){	
		return $this->idLibro;
	}
	
	#nombreAlumno	
	public function setNombreAlumno($nombreAlumno){
		$this->nombreAlumno = mysql_real_escape_string(strip_tags(trim($nombreAlumno)));	
	}
	public function getNombreAlumno(){
		return $this->nombreAlumno;
	}	

	#Nombre	
	public function setNombre($Nombre){
		$this->Nombre = mysql_real_escape_string(strip_tags(trim($Nombre)));	
	}
	public function getNombre(){
		return $this->Nombre;
	}
	
	#curso	
	public function setCurso($curso){
		$this->curso = mysql_real_escape_string(strip_tags(trim($curso)));	
	}
	public function getCurso(){
		return $this->curso;
	}	
	
	#nombreLibro	
	public function setNombreLibro($nombreLibro){
		$this->nombreLibro = mysql_real_escape_string(strip_tags(trim($nombreLibro)));	
	}
	public function getNombreLibro(){
		return $this->nombreLibro;
	}
	
	#fechaPrestamo	
	public function setFechaPrestamo($fechaPrestamo){
		$this->fechaPrestamo = mysql_real_escape_string(strip_tags(trim($fechaPrestamo)));	
	}
	public function getFechaPrestamo(){
		return $this->fechaPrestamo;
	}
	
	#fechaDevolucion	
	public function setFechaDevolucion($fechaDevolucion){
		$this->fechaDevolucion = mysql_real_escape_string(strip_tags(trim($fechaDevolucion)));	
	}
	public function getFechaDevolucion(){
		return $this->fechaDevolucion;
	}
	
	#estadoLibro	
	public function setEstadoLibro($estadoLibro){
		$this->estadoLibro = mysql_real_escape_string(strip_tags(trim($estadoLibro)));	
	}
	public function getEstadoLibro(){
		return $this->estadoLibro;
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
	
	public function listarPrestamo($Prestamo){
		global $docRootSitio;		
		$this->setId($Prestamo);
				
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM prestamolibro WHERE id='{$this->getId()}' LIMIT 1";
	
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
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM prestamolibro ";
				
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
		$_prestamos = $i1->iterarObjetos($result);	
			
		return $_prestamos;	
	}

	public function listarPrestamosSinDevolver($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM prestamolibro WHERE estadoLibro='1' ";
				
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
		$_prestamos = $i1->iterarObjetos($result);	
			
		return $_prestamos;	
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
		
	if($this->getNombreAlumno() == ''){
		$mensaje = "Debe ingresar <strong>el Nomnbre</strong> del Alumno.";	
		return $mensaje;
	}
}	
	
	public function agregarPrestamo(){		
	global $docRootSitio;   			
 	
	$q="INSERT INTO prestamolibro (id,idLibro,nombreAlumno,alumno,cursoAlumno,libroNombre,prestamo,devolucion,estadoLibro) "
			."VALUES ('','{$this->getIdLibro()}','{$this->getNombreAlumno()}','{$this->getNombre()}','{$this->getCurso()}','{$this->getNombreLibro()}','{$this->getFechaPrestamo()}','{$this->getFechaDevolucion()}','1');";
	
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
	
	public function modificarPrestamo(){
		global $docRootSitio;			
				
	 $q="UPDATE prestamolibro SET nombreAlumno='{$this->getNombreAlumno()}',cursoAlumno='{$this->getCurso()}',libroNombre='{$this->getNombreLibro()}',prestamo='{$this->getFechaPrestamo()}',devolucion='{$this->getFechaDevolucion()}' WHERE id='{$this->getId()}'";	
		
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
	
	public function modificarEstadoPrestamo($Libro){
	global $docRootSitio;
	$this->setId($Libro);		
				
		$q="UPDATE prestamolibro SET estadoLibro='2' WHERE idLibro='{$this->getId()}'";	
		
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
	
	public function eliminarPrestamo($Prestamo) {
	global $docRootSitio; 	
	$this->setId($Prestamo);
		
	$q = "DELETE FROM prestamolibro WHERE id='{$this->getId()}' LIMIT 1";
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
	
	public function buscarPrestamos($offset="",$limit="",$campoOrder="",$order="",$busqueda,$campoBusqueda){
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM prestamolibro WHERE "
			." $campoBusqueda LIKE '$busqueda%' ";
				
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
		$_libros = $i1->iterarObjetos($result);	
			
		return $_libros;	
	}
	
	
}
			