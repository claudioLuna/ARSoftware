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
		
class Curso{
		
	private $id;
	private $nombre;
	private $nombreUsuario;
	
	public function Curso(){}
	
	#id	
	public function setId($id){
		$this->id = mysql_real_escape_string(strip_tags(trim($id)));		
	}	
	public function getId(){	
		return $this->id;
	}
	
	#nombre	
	public function setNombre($nombre){
		$this->nombre = mysql_real_escape_string(strip_tags(trim($nombre)));	
	}
	public function getNombre(){
		return $this->nombre;
	}		
	
	#nombreUsuario
	public function setNombreUsuario($nombreUsuario){
		$this->nombreUsuario = mysql_real_escape_string(strip_tags(trim($nombreUsuario)));
	}
	public function getNombreUsuario(){
		return $this->nombreUsuario;
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
	
	public function existeCurso(){
	global $docRootSitio;	
		
	$q="SELECT nombre FROM curso WHERE nombre='{$this->getNombre()}' ";
									
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
			
	public function listarCurso($Curso){
		global $docRootSitio;		
		$this->setId($Curso);
			
		$q = "SELECT * FROM curso WHERE id='{$this->getId()}' LIMIT 1";
	
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
		$_curso = $i1->iterarObjeto($result);					
		return $_curso;	
	}
	
	public function listarCursos($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM curso  WHERE nombreUsuario='{$this->getNombreUsuario()}' ";
				
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
		$_clientes = $i1->iterarObjetos($result);	
			
		return $_clientes;	
	}
	
	public function listarCursosCreados($Catedra){
		global $docRootSitio;		
		$this->setId($Catedra);
				
		$q = "SELECT * FROM curso WHERE nombre='{$this->getId()}' AND nombreUsuario='{$this->getNombreUsuario()}'";
	
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
		$_catedra = $i1->iterarObjeto($result);					
		return $_catedra;	
	}
	
	public function setCurso($_post){
		if(is_array($_post)){			
			$_campos = array_keys($_post);		
		}	
			
		for($i=0;$i<count($_campos);$i++){		
			if($_post[$_campos[$i]] != '' && method_exists ($this,"set".agregarMayuscula($_campos[$i]))){
			$this->{"set".agregarMayuscula($_campos[$i])}($_post[$_campos[$i]]);
			}				
		}		
	}
	
	public function validarCurso($_post){	
	$this->setCurso($_post);
		
	if($this->getNombre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Curso.";	
		return $mensaje;
	}
	
}	
	
	public function agregarCurso($Curso){		
	global $docRootSitio;   			
 	$this->setNombreUsuario($Curso);
	
	$q="INSERT INTO curso (id,nombre,nombreUsuario) "
			."VALUES ('','{$this->getNombre()}','{$this->getNombreUsuario()}');";
	
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
	
	public function modificarCurso(){
		global $docRootSitio;			
				
	   $q="UPDATE curso SET nombre='{$this->getNombre()}' WHERE id='{$this->getId()}'";	
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
	
	public function eliminarCurso($Curso) {
	global $docRootSitio; 	
	$this->setId($Curso);
		
	$q = "DELETE FROM curso WHERE id='{$this->getId()}' LIMIT 1";
	
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
			