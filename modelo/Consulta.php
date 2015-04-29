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
	
 $q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno  WHERE curso= $busqueda ";
	
	
	
				$result = mysql_query($q);
				$orden = new Iterador();
				$_consultas = $orden->iterarObjetos($result);
					
				return $_consultas;
	}
	
	
	/////////////////////////////////
		public function listarAlumnos($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno WHERE MarcaNetbook!=0";
				
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
	
	public function listarAlumnosSinUsoEscolar($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno WHERE MarcaNetbook!=0 AND curso!=15 and nombreUsuario='{$this->getNombreUsuario()}'";
				
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
	
	public function listarAlumnosUsoEscolar($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno WHERE MarcaNetbook!=0 AND cursoNombre='Uso Escolar'";
				
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
	
	public function listarAlumnosSinNetbook($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno WHERE numSerie='0' AND prestado='0' ";
				
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
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getApellido() == ''){
		$mensaje = "Debes Escribir El <strong>Apellido</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCurso() == ''){
		$mensaje = "Debes Escribir El <strong>Curso</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCuil() == ''){
		$mensaje = "Debes Escribir El <strong>Cuil</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getNombrePadre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Padre Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getApellidoPadre() == ''){
		$mensaje = "Debes Escribir El <strong>Apellido</strong> Del Padre Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCuilPadre() == ''){
		$mensaje = "Debes Escribir El <strong>Cuil</strong> Del Padre Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getMarcaNetbook() == 0){
		$mensaje = "Debes Seleccionar Un <strong>Marca</strong> De Netbook Para El Alumno.";	
		return $mensaje;
	}
	
	if($this->getNumSerie() == ''){
		$mensaje = "Debes Escribir El <strong>Numero De Serie</strong> De La Netbook Del Alumno.";	
		return $mensaje;
	}
}	
	
	public function validarAlumnoSinNetbook($_post){	
	$this->setAlumno($_post);
		
	if($this->getNombre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getApellido() == ''){
		$mensaje = "Debes Escribir El <strong>Apellido</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCuil() == ''){
		$mensaje = "Debes Escribir El <strong>Cuil</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getDireccion() == ''){
		$mensaje = "Debes Escribir La <strong>Direccion</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getEscuela() == ''){
		$mensaje = "Debes Escribir El Numero De La <strong>Escuela</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCurso() == 0){
		$mensaje = "Debes Escribir El <strong>Curso</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getTurno() == ''){
		$mensaje = "Debes Seleccionar El <strong>Turno</strong> Del Alumno.";	
		return $mensaje;
	}

	if($this->getNombrePadre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Padre Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getApellidoPadre() == ''){
		$mensaje = "Debes Escribir El <strong>Apellido</strong> Del Padre Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCuilPadre() == ''){
		$mensaje = "Debes Escribir El <strong>Cuil</strong> Del Padre Del Alumno.";	
		return $mensaje;
	}
	
}	
	
	public function validarAlumnoSNetbook($_post){	
	$this->setAlumno($_post);
		
	if($this->getNombre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCuil() == ''){
		$mensaje = "Debes Escribir El <strong>Cuil</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getDireccion() == ''){
		$mensaje = "Debes Escribir La <strong>Direccion</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getEscuela() == ''){
		$mensaje = "Debes Escribir El Numero De La <strong>Escuela</strong> Del Alumno.";	
		return $mensaje;
	}
	

}	
	
	public function agregarAlumno($Alumno){		
	global $docRootSitio;   			
	$this->setNombreUsuario($Alumno);
	$q="INSERT INTO alumno (id,nombre,apellido,cuil,direccion,escuela,curso,turno,nombrePadre,apellidoPadre,cuilPadre,MarcaNetbook,numSerie,prestado,cargador,bateria,nombreUsuario) "
			."VALUES ('','{$this->getNombre()}','{$this->getApellido()}','{$this->getCuil()}','{$this->getDireccion()}','{$this->getEscuela()}','{$this->getCurso()}','{$this->getTurno()}','{$this->getNombrePadre()}','{$this->getApellidoPadre()}','{$this->getCuilPadre()}','{$this->getMarcaNetbook()}','{$this->getNumSerie()}','0','{$this->getCargador()}','{$this->getBateria()}','{$this->getNombreUsuario()}');";
	
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
	
	public function agregarAlumnoSNetbook($Alumno){		
	global $docRootSitio;   			
	$this->setNombreUsuario($Alumno);
	
	$q="INSERT INTO alumno (id,nombre,apellido,cuil,direccion,escuela,curso,cursoNombre,turno,nombrePadre,apellidoPadre,cuilPadre,MarcaNetbook,numSerie,prestado,cargador,bateria,nombreUsuario,estado) "
			."VALUES ('','{$this->getNombre()}','{$this->getApellido()}','{$this->getCuil()}','{$this->getDireccion()}','{$this->getEscuela()}','{$this->getCurso()}','{$this->getNombreCurso()}','{$this->getTurno()}','{$this->getNombrePadre()}','{$this->getApellidoPadre()}','{$this->getCuilPadre()}','{$this->getMarcaNetbook()}','{$this->getNumSerie()}','0','{$this->getCargador()}','{$this->getBateria()}','{$this->getNombreUsuario()}','1');";
	
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
	
	public function agregarAlumnoSinNetbook($Alumno){		
	global $docRootSitio;   			
 	$this->setNombreUsuario($Alumno);
	$q="INSERT INTO alumno (id,nombre,apellido,cuil,direccion,escuela,curso,turno,nombrePadre,apellidoPadre,cuilPadre,MarcaNetbook,numSerie,prestado,cargador,bateria,nombreUsuario) "
			."VALUES ('','{$this->getNombre()}','{$this->getApellido()}','{$this->getCuil()}','{$this->getDireccion()}','{$this->getEscuela()}','{$this->getCurso()}','{$this->getTurno()}','{$this->getNombrePadre()}','{$this->getApellidoPadre()}','{$this->getCuilPadre()}','','0','','','','{$this->getNombreUsuario()}');";
	
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
				
	  $q="UPDATE alumno SET nombre='{$this->getNombre()}',apellido='{$this->getApellido()}',curso='{$this->getCurso()}',cuil='{$this->getCuil()}',nombrePadre='{$this->getNombrePadre()}',apellidoPadre='{$this->getApellidoPadre()}',cuilPadre='{$this->getCuilPadre()}',MarcaNetbook='{$this->getMarcaNetbook()}',numSerie='{$this->getNumSerie()}',prestado='0',cargador='{$this->getCargador()}',bateria='{$this->getBateria()}' WHERE id='{$this->getId()}'";	
	
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
	
	public function modificarAlumnoSinNetbook(){
		global $docRootSitio;			
				
	  $q="UPDATE alumno SET nombre='{$this->getNombre()}',apellido='{$this->getApellido()}',cuil='{$this->getCuil()}',direccion='{$this->getDireccion()}',escuela='{$this->getEscuela()}',curso='{$this->getCurso()}',turno='{$this->getTurno()}',nombrePadre='{$this->getNombrePadre()}',apellidoPadre='{$this->getApellidoPadre()}',cuilPadre='{$this->getCuilPadre()}' WHERE id='{$this->getId()}'";	
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
	
	public function modificarEstadoAlumno($Alumno){
	global $docRootSitio;			
	$this->setId($Alumno);
	
		$q="UPDATE alumno SET prestado='1' WHERE id='{$this->getId()}'";	
	
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
	
	public function modificarEstadoNetbook($Alumno){
	global $docRootSitio;			
	$this->setId($Alumno);
	
		$q="UPDATE alumno SET estado='0',prestado='1' WHERE numSerie='{$this->getId()}'";	
		
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
	
	public function modificarDevolver($Alumno){
	global $docRootSitio;			
	$this->setId($Alumno);
	
		$q="UPDATE alumno SET prestado='0',estado='1' WHERE id='{$this->getId()}'";	
		
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
	
	public function modificarDevolverAlumno($Alumno){
	global $docRootSitio;			
	$this->setId($Alumno);
	
		$q="UPDATE alumno SET prestado='0',estado='1' WHERE numSerie='{$this->getId()}'";	
		
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
		
	$q = "DELETE FROM alumno WHERE id='{$this->getId()}' LIMIT 1";
	
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
	
	public function listarAlumnoCuil($Alumno){
		global $docRootSitio;
		$this->setCuil($Alumno);
	
		$q = "SELECT * FROM alumno WHERE cuil='{$this->getCuil()}' LIMIT 1";
	
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
	
	public function listarNetbookPrestamo($Netbook,$usuario){
		global $docRootSitio;		
		$this->setId($Netbook);
		$this->setNombreUsuario($usuario);
				
		$q = "SELECT * FROM alumno WHERE numSerie='{$this->getId()}' AND nombreUsuario='{$this->getNombreUsuario()}' AND cursoNombre='Uso Escolar'";
	
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
	
}
			