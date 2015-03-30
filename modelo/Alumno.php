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
		
class Alumno{
		
	private $id;
	private $nombre;
	private $apellido;
	private $cuil;
	private $direccion;
	private $escuela;
	private $curso;
	private $nombreCurso;
	private $turno;
	private $nombrePadre;
	private $apellidoPadre;
	private $cuilPadre;
	private $MarcaNetbook;
	private $numSerie;
	private $prestado;
	private $cargador;
	private $bateria;
	private $nombreUsuario;
	private $estadoNetbook;
	
	public function Alumno(){}
	
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

	#apellido	
	public function setApellido($apellido){
		$this->apellido = mysql_real_escape_string(strip_tags(trim($apellido)));	
	}
	public function getApellido(){
		return $this->apellido;
	}		
	
	#cuil	
	public function setCuil($cuil){
		$this->cuil = mysql_real_escape_string(strip_tags(trim($cuil)));	
	}
	public function getCuil(){
		return $this->cuil;
	}	
	
	#direccion	
	public function setDireccion($direccion){
		$this->direccion = mysql_real_escape_string(strip_tags(trim($direccion)));	
	}
	public function getDireccion(){
		return $this->direccion;
	}	
	
	#escuela	
	public function setEscuela($escuela){
		$this->escuela = mysql_real_escape_string(strip_tags(trim($escuela)));	
	}
	public function getEscuela(){
		return $this->escuela;
	}	
	
	#curso	
	public function setCurso($curso){
		$this->curso = mysql_real_escape_string(strip_tags(trim($curso)));	
	}
	public function getCurso(){
		return $this->curso;
	}	
	
	#nombreCurso	
	public function setNombreCurso($nombreCurso){
		$this->nombreCurso = mysql_real_escape_string(strip_tags(trim($nombreCurso)));	
	}
	public function getNombreCurso(){
		return $this->nombreCurso;
	}	
	
	#turno	
	public function setTurno($turno){
		$this->turno = mysql_real_escape_string(strip_tags(trim($turno)));	
	}
	public function getTurno(){
		return $this->turno;
	}	

	#nombrePadre	
	public function setNombrePadre($nombrePadre){
		$this->nombrePadre = mysql_real_escape_string(strip_tags(trim($nombrePadre)));	
	}
	public function getNombrePadre(){
		return $this->nombrePadre;
	}	
	
	#apellidoPadre	
	public function setApellidoPadre($apellidoPadre){
		$this->apellidoPadre = mysql_real_escape_string(strip_tags(trim($apellidoPadre)));	
	}
	public function getApellidoPadre(){
		return $this->apellidoPadre;
	}	
	
	#cuilPadre	
	public function setCuilPadre($cuilPadre){
		$this->cuilPadre = mysql_real_escape_string(strip_tags(trim($cuilPadre)));	
	}
	public function getCuilPadre(){
		return $this->cuilPadre;
	}	
	
	#MarcaNetbook	
	public function setMarcaNetbook($MarcaNetbook){
		$this->MarcaNetbook = mysql_real_escape_string(strip_tags(trim($MarcaNetbook)));	
	}
	public function getMarcaNetbook(){
		return $this->MarcaNetbook;
	}		
	
	#numSerie	
	public function setNumSerie($numSerie){
		$this->numSerie = mysql_real_escape_string(strip_tags(trim($numSerie)));	
	}
	public function getNumSerie(){
		return $this->numSerie;
	}
	
	#numSerieDb	
	public function setNumSerieDb($numSerieDb){
		$this->numSerieDb = mysql_real_escape_string(strip_tags(trim($numSerieDb)));	
	}
	public function getNumSerieDb(){
		return $this->numSerieDb;
	}
	#prestado	
	public function setPrestado($prestado){
		$this->prestado = mysql_real_escape_string(strip_tags(trim($prestado)));	
	}
	public function getPrestado(){
		return $this->prestado;
	}
	
	#cargador	
	public function setCargador($cargador){
		$this->cargador = mysql_real_escape_string(strip_tags(trim($cargador)));	
	}
	public function getCargador(){
		return $this->cargador;
	}

	#bateria	
	public function setBateria($bateria){
		$this->bateria = mysql_real_escape_string(strip_tags(trim($bateria)));	
	}
	public function getBateria(){
		return $this->bateria;
	}

	#nombreUsuario
	public function setNombreUsuario($nombreUsuario){
		$this->nombreUsuario = mysql_real_escape_string(strip_tags(trim($nombreUsuario)));
	}
	public function getNombreUsuario(){
		return $this->nombreUsuario;
	}
	
	#estadoNetbook
	public function setEstadoNetbook($estadoNetbook){
		$this->estadoNetbook = mysql_real_escape_string(strip_tags(trim($estadoNetbook)));
	}
	public function getEstadoNetbook(){
		return $this->estadoNetbook;
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
	
	public function existeSerie(){
	global $docRootSitio;	
		
	 $q="SELECT numSerie FROM alumno WHERE numSerie='{$this->getNumSerie()}' ";
								
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
	$_serie = $i1->iterarObjeto($result);
			
	if($_serie['nombre']){
		return 1;
	}
	else{
		return 0;
	}	
}
			
	public function listarAlumno($Alumno){
		global $docRootSitio;		
		$this->setId($Alumno);
				
		$q = "SELECT * FROM alumno WHERE id='{$this->getId()}' LIMIT 1";
	
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
	
	public function listarAlumno2($Alumno,$usuario){
		global $docRootSitio;		
		$this->setId($Alumno);
		$this->setNombreUsuario($usuario);
				
		$q = "SELECT * FROM alumno WHERE numSerie='{$this->getId()}' AND nombreUsuario='{$this->getNombreUsuario()}' LIMIT 1";
	
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
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno WHERE MarcaNetbook!=0 AND curso!='Uso Escolar' and nombreUsuario='{$this->getNombreUsuario()}' ORDER BY estadoNetbook";
				
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
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno WHERE MarcaNetbook!=0 AND cursoNombre='Uso Escolar' AND prestado=0";
				
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
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno WHERE numSerie='0' AND prestado='0' AND nombreUsuario='{$this->getNombreUsuario()}' ";
				
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
	
	public function listarNetbooksSinAlumnoCreadas($numSerie){
		global $docRootSitio;		
		$this->setNumSerie($numSerie);
				
		$q = "SELECT * FROM alumno WHERE numSerie='{$this->getNumSerie()}' AND nombreUsuario='{$this->getNombreUsuario()}'";
	
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
	
	if($this->getCuil() == ''){
		$mensaje = "Debes Escribir El <strong>Cuil</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if(!ereg("([0-9]{2})-([0-9]{8})-([0-9]{1})",$this->getCuil())) 
	{
	$mensaje = "El Formato Del <strong>Cuil</strong> Esta Mal.El Formato Debe Ser El Siguiente XX-XXXXXXXX-X";	
	return $mensaje;
	}
	
	if($this->getCurso() == ''){
		$mensaje = "Debes Escribir El <strong>Curso</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getDireccion() == ''){
		$mensaje = "Debes Escribir La <strong>Direccion</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getEscuela() == 0){
		$mensaje = "Debes Seleccionar Una <strong>Escuela</strong> Para El Alumno.";	
		return $mensaje;
	}
		
	if($this->getTurno() == 0){
		$mensaje = "Debes Seleccionar El <strong>Turno</strong> Para El Alumno.";	
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
		
	if(!ereg("([0-9]{2})-([0-9]{8})-([0-9]{1})",$this->getCuilPadre())) 
	{
	$mensaje = "El Formato Del <strong>Cuil</strong> Esta Mal. El Formato Debe Ser El Siguiente XX-XXXXXXXX-X";	
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
	
	if($this->getCargador() == ''){
		$mensaje = "Debes Escribir El <strong>Numero De Serie</strong> Del Cargador.";	
		return $mensaje;
	}
	
	if($this->getBateria() == ''){
		$mensaje = "Debes Escribir El <strong>Numero De Serie</strong> De La Bateria.";	
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
	$q="INSERT INTO alumno (id,nombre,apellido,cuil,direccion,escuela,curso,turno,nombrePadre,apellidoPadre,cuilPadre,MarcaNetbook,numSerie,prestado,cargador,bateria,nombreUsuario,estadoNetbook) "
			."VALUES ('','{$this->getNombre()}','{$this->getApellido()}','{$this->getCuil()}','{$this->getDireccion()}','{$this->getEscuela()}','{$this->getCurso()}','{$this->getTurno()}','{$this->getNombrePadre()}','{$this->getApellidoPadre()}','{$this->getCuilPadre()}','{$this->getMarcaNetbook()}','{$this->getNumSerie()}','0','{$this->getCargador()}','{$this->getBateria()}','{$this->getNombreUsuario()}','Ok');";
	
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
	
	$q="INSERT INTO alumno (id,nombre,apellido,cuil,direccion,escuela,curso,cursoNombre,turno,nombrePadre,apellidoPadre,cuilPadre,MarcaNetbook,numSerie,prestado,cargador,bateria,nombreUsuario,estado,estadoNetbook) "
			."VALUES ('','{$this->getNombre()}','{$this->getApellido()}','{$this->getCuil()}','{$this->getDireccion()}','{$this->getEscuela()}','{$this->getCurso()}','{$this->getNombreCurso()}','{$this->getTurno()}','{$this->getNombrePadre()}','{$this->getApellidoPadre()}','{$this->getCuilPadre()}','{$this->getMarcaNetbook()}','{$this->getNumSerie()}','0','{$this->getCargador()}','{$this->getBateria()}','{$this->getNombreUsuario()}','1','Ok');";
	
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
	$q="INSERT INTO alumno (id,nombre,apellido,cuil,direccion,escuela,curso,turno,nombrePadre,apellidoPadre,cuilPadre,MarcaNetbook,numSerie,prestado,cargador,bateria,nombreUsuario,estadoNetbook) "
			."VALUES ('','{$this->getNombre()}','{$this->getApellido()}','{$this->getCuil()}','{$this->getDireccion()}','{$this->getEscuela()}','{$this->getCurso()}','{$this->getTurno()}','{$this->getNombrePadre()}','{$this->getApellidoPadre()}','{$this->getCuilPadre()}','','0','','','','{$this->getNombreUsuario()}','No Tiene');";
	
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
	
	public function actualizarEstadoNetbook($Alumno,$estado){
	global $docRootSitio;			
	$this->setId($Alumno);
	$this->setEstadoNetbook($estado);
	
		$q="UPDATE alumno SET estadoNetbook='{$this->getEstadoNetbook()}' WHERE numSerie='{$this->getId()}'";	
	
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
	
	public function listarSerie($Serie){
		global $docRootSitio;		
		$this->setNumSerie($Serie);
				
		$q = "SELECT * FROM alumno WHERE numSerie='{$this->getNumSerie()}' AND nombreUsuario='{$this->getNombreUsuario()}'";
	
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
	
	public function listarCargadores($Cargador){
		global $docRootSitio;		
		$this->setCargador($Cargador);
				
		$q = "SELECT * FROM alumno WHERE cargador='{$this->getCargador()}' AND nombreUsuario='{$this->getNombreUsuario()}'";
		
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
	
	public function listarBateria($Bateria){
		global $docRootSitio;		
		$this->setBateria($Bateria);
				
	 $q = "SELECT * FROM alumno WHERE bateria='{$this->getBateria()}' AND nombreUsuario='{$this->getNombreUsuario()}'";
	
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
			