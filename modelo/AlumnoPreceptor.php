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
		
class AlumnoPreceptor{
		
	private $id;
	private $nombre;
	private $nacimiento;
	private $dni;
	private $telefono;
	private $direccion;
	private $curso;
	private $nombrePadre;
	private $documentoPadre;
	private $puntosIce;
	
	public function AlumnoPreceptor(){}
	
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

	#nacimiento	
	public function setNacimiento($nacimiento){
		$this->nacimiento = mysql_real_escape_string(strip_tags(trim($nacimiento)));	
	}
	public function getNacimiento(){
		return $this->nacimiento;
	}	
	
	#dni	
	public function setDni($dni){
		$this->dni = mysql_real_escape_string(strip_tags(trim($dni)));	
	}
	public function getDni(){
		return $this->dni;
	}
	
	#telefono	
	public function setTelefono($telefono){
		$this->telefono = mysql_real_escape_string(strip_tags(trim($telefono)));	
	}
	public function getTelefono(){
		return $this->telefono;
	}
	
	#direccion	
	public function setDireccion($direccion){
		$this->direccion = mysql_real_escape_string(strip_tags(trim($direccion)));	
	}
	public function getDireccion(){
		return $this->direccion;
	}
	
	#curso	
	public function setCurso($curso){
		$this->curso = mysql_real_escape_string(strip_tags(trim($curso)));	
	}
	public function getCurso(){
		return $this->curso;
	}
	
	#nombrePadre	
	public function setNombrePadre($nombrePadre){
		$this->nombrePadre = mysql_real_escape_string(strip_tags(trim($nombrePadre)));	
	}
	public function getNombrePadre(){
		return $this->nombrePadre;
	}
	
	#documentoPadre	
	public function setDocumentoPadre($documentoPadre){
		$this->documentoPadre = mysql_real_escape_string(strip_tags(trim($documentoPadre)));	
	}
	public function getDocumentoPadre(){
		return $this->documentoPadre;
	}
	
	#puntosIce	
	public function setPuntosIce($puntosIce){
		$this->puntosIce = mysql_real_escape_string(strip_tags(trim($puntosIce)));	
	}
	public function getPuntosIce(){
		return $this->puntosIce;
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
	
	public function existeAlumno(){
	global $docRootSitio;	
		
	$q="SELECT nombre FROM alumnopreceptor WHERE nombre='{$this->getAlumno()}' ";
									
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
			
	if($_alumno['nombre']){
		return 1;
	}
	else{
		return 0;
	}	
}
			
	public function listarAlumno($Alumno){
		global $docRootSitio;		
		$this->setId($Alumno);
				
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumnopreceptor WHERE id='{$this->getId()}' LIMIT 1";
	
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
	
	public function listarAlumnos($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumnopreceptor ";
				
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
		$_alumnos = $i1->iterarObjetos($result);	
			
		return $_alumnos;	
	}

	public function listarAlumnosCurso($Alumno){		
		global $docRootSitio;
		$this->setId($Alumno);		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumnopreceptor WHERE curso='{$this->getId()}'";
				
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
		$_alumnosCurso = $i1->iterarObjetos($result);	
			
		return $_alumnosCurso;	
	}
		
	public function setAlumno($_post){
		if(is_array($_post)){			
			$_campos = array_keys($_post);		
		}	
			
		for($i=0;$i<count($_campos);$i++){		
			if($_post[$_campos[$i]] != '' && method_exists ($this,"set".agregarMayuscula($_campos[$i]))){
			$this->{"set".agregarMayuscula($_campos[$i])}($_post[$_campos[$i]]);
			}				
		}		
	}
	
	public function validarAlumno($_post){	
	$this->setAlumno($_post);
		
	if($this->getNombre() == ''){
		$mensaje = "Debe ingresar <strong>el Nombre</strong> del Alumno.";	
		return $mensaje;
	}
	if($this->getNacimiento() == ''){
		$mensaje = "Debe ingresar <strong>La Fecha De Nacimiento</strong> del Alumno.";	
		return $mensaje;
	}
	if($this->getDni() == ''){
		$mensaje = "Debe ingresar <strong>El Dni</strong> del Alumno.";	
		return $mensaje;
	}
	if($this->getTelefono() == ''){
		$mensaje = "Debe ingresar <strong>El Telefono</strong> del Alumno.";	
		return $mensaje;
	}
	if($this->getDireccion() == ''){
		$mensaje = "Debe ingresar <strong>La Direccion</strong> del Alumno.";	
		return $mensaje;
	}
	if($this->getNombrePadre() == ''){
		$mensaje = "Debe ingresar <strong>El Nombre Del Padre</strong> del Alumno.";	
		return $mensaje;
	}
	if($this->getDocumentoPadre() == ''){
		$mensaje = "Debe ingresar <strong>El Dni Del Padre</strong> del Alumno.";	
		return $mensaje;
	}
	
}	
	
	public function agregarAlumno(){		
	global $docRootSitio;   			
 	
	$q="INSERT INTO alumnopreceptor (id,nombre,nacimiento,dni,telefono,direccion,curso,nombrePadre,documentoPadre,puntosIce,marcaNetbook,numeroSerie) "
			."VALUES ('','{$this->getNombre()}','{$this->getNacimiento()}','{$this->getDni()}','{$this->getTelefono()}','{$this->getDireccion()}','{$this->getCurso()}','{$this->getNombrePadre()}','{$this->getDocumentoPadre()}','','');";
	
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
	
	public function modificarAlumno(){
		global $docRootSitio;			
				
	 $q="UPDATE alumnopreceptor SET nombre='{$this->getNombre()}',nacimiento='{$this->getNacimiento()}',dni='{$this->getDni()}',telefono='{$this->getTelefono()}',Direccion='{$this->getDireccion()}',curso='{$this->getCurso()}',nombrePadre='{$this->getNombrePadre()}',documentoPadre='{$this->getDocumentoPadre()}' WHERE id='{$this->getId()}'";	
		
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
	
	public function eliminarAlumno($Alumno) {
	global $docRootSitio; 	
	$this->setId($Alumno);
		
	$q = "DELETE FROM alumnopreceptor WHERE id='{$this->getId()}' LIMIT 1";
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
	
	public function actualizarIce($Alumno,$Puntos){
		global $docRootSitio;
		$this->setId($Alumno);	
		$this->setPuntosIce($Puntos);		
				
		$q="UPDATE alumnopreceptor SET puntosIce='{$this->getPuntosIce()}' WHERE id='{$this->getId()}'";	
	
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
	
}
			