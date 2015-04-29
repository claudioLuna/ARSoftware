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
		
class DatosEscuela{
		
	private $id;
	private $nombreDirector;
	private $apellidoDirector;
	private $dniDirector;
	private $cuilDirector;
	private $numeroEscuela;
	private $nombreEscuela;
	private $cueEscuela;
	private $seccionEscuela;
	private $domicilioEscuela;
	private $ciudad;
	private $provincia;
	private $nombreUsuario;
	public function DatosEscuela(){}
	
	#id	
	public function setId($id){
		$this->id = mysql_real_escape_string(strip_tags(trim($id)));		
	}	
	public function getId(){	
		return $this->id;
	}
	
	#nombre	Director
	
	public function setNombreDirector($nombreDirector){
		$this->nombreDirector = mysql_real_escape_string(strip_tags(trim($nombreDirector)));	
	}
	public function getNombreDirector(){
		return $this->nombreDirector;
	}	
	#nombre	Director
	
	public function setApellidoDirector($apellidoDirector){
		$this->apellidoDirector = mysql_real_escape_string(strip_tags(trim($apellidoDirector)));	
	}
	public function getApellidoDirector(){
		return $this->apellidoDirector;
	}		
	
	#dni Director
	public function setDniDirector($dniDirector){
		$this->dniDirector = mysql_real_escape_string(strip_tags(trim($dniDirector)));
	}
	public function getDniDirector(){
		return $this->dniDirector;
	}
	
	#cuilDirector
	
	public function setCuilDirector($cuilDirector){
		$this->cuilDirector = mysql_real_escape_string(strip_tags(trim($cuilDirector)));
	}
	public function getCuilDirector(){
		return $this->cuilDirector;
	}
	
	#numero Escuela
	public function setNumeroEscuela($numeroEscuela){
		$this->numeroEscuela = mysql_real_escape_string(strip_tags(trim($numeroEscuela)));
	}
	public function getNumeroEscuela(){
		return $this->numeroEscuela;
	}

	#nombre	Escuela
	public function setNombreEscuela($nombreEscuela){
		$this->nombreEscuela = mysql_real_escape_string(strip_tags(trim($nombreEscuela)));
	}
	public function getNombreEscuela(){
		return $this->nombreEscuela;
	}
	
	#cue Escuela
	public function setCueEscuela($cueEscuela){
		$this->cueEscuela = mysql_real_escape_string(strip_tags(trim($cueEscuela)));
	}
	public function getCueEscuela(){
		return $this->cueEscuela;
	}

	#seccion Escuela
	public function setSeccionEscuela($seccionEscuela){
		$this->seccionEscuela = mysql_real_escape_string(strip_tags(trim($seccionEscuela)));
	}
	public function getSeccionEscuela(){
		return $this->seccionEscuela;
	}
	
	#domicilio Escuela
	public function setDomicilioEscuela($domicilioEscuela){
		$this->domicilioEscuela = mysql_real_escape_string(strip_tags(trim($domicilioEscuela)));
	}
	public function getDomicilioEscuela(){
		return $this->domicilioEscuela;
	}
	
	#ciudad
	public function setCiudad($ciudad){
		$this->ciudad = mysql_real_escape_string(strip_tags(trim($ciudad)));
	}
	public function getCiudad(){
		return $this->ciudad;
	}

	#provincia
	public function setProvincia($provincia){
		$this->provincia = mysql_real_escape_string(strip_tags(trim($provincia)));
	}
	public function getProvincia(){
		return $this->provincia;
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
	
	public function existeDatosEscuela(){
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
			
	public function listarDatosEscuela($DatosEscuela){
		global $docRootSitio;		
		$this->setId($DatosEscuela);
				
		$q = "SELECT * FROM datosescuela WHERE id='{$this->getId()}' LIMIT 1";
	
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
		return $_cliente;	
	}
	
	public function listarNumeroEscuela($Datos){
		global $docRootSitio;		
		$this->setNombreEscuela($Datos);
				
		 $q = "SELECT * FROM datosescuela WHERE numeroEscuela='{$this->getNombreEscuela()}'";
	
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
		return $_cliente;	
	}
	
	public function listarEscuelaMigracion($Datos){
		global $docRootSitio;		
		$this->setNombreEscuela($Datos);
				
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM datosescuela where nombreUsuario='{$this->getNombreUsuario()}' ";
		
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
		return $_cliente;	
	}
	
	public function listarNumeroEscuelaSinAlumno($Datos){
		global $docRootSitio;		
		$this->setNombreEscuela($Datos);
				
		$q = "SELECT * FROM datosescuela WHERE nombreEscuela='{$this->getNombreEscuela()}'";
	
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
		return $_cliente;	
	}
	
	public function listarDatosEscuelas(){		
		global $docRootSitio;		
		
		 $q = "SELECT SQL_CALC_FOUND_ROWS * FROM datosescuela where nombreUsuario='{$this->getNombreUsuario()}' ";
				
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
		$_escuelas = $i1->iterarObjetos($result);	
			
		return $_escuelas;	
	}
	
	public function listarEscuelas(){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM datosescuela where nombreUsuario='{$this->getNombreUsuario()}'";
			
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
		$_escuelas = $i1->iterarObjetos($result);	
			
		return $_escuelas;	
	}
	
	public function listarEscuela(){		
		global $docRootSitio;		
		
		 $q = "SELECT SQL_CALC_FOUND_ROWS * FROM datosescuela where nombreUsuario='{$this->getNombreUsuario()}' AND nombreEscuela='{$this->getNombreEscuela()}'";
			exit();
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
	
	public function setDatosEscuela($_post){
		if(is_array($_post)){			
			$_campos = array_keys($_post);		
		}	
			
		for($i=0;$i<count($_campos);$i++){		
			if($_post[$_campos[$i]] != '' && method_exists ($this,"set".agregarMayuscula($_campos[$i]))){
			$this->{"set".agregarMayuscula($_campos[$i])}($_post[$_campos[$i]]);
			}				
		}		
	}
	
	public function validarDatosEscuela($_post){	
	$this->setDatosEscuela($_post);
		
	if($this->getNombreDirector() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Director.";	
		return $mensaje;
	}
	if($this->getApellidoDirector() == ''){
		$mensaje = "Debes Escribir El <strong>Apellido</strong> Del Director.";	
		return $mensaje;
	}
	if($this->getDniDirector() == ''){
		$mensaje = "Debes Escribir El <strong>Dni</strong> Del Director.";	
		return $mensaje;
	}
	
	if($this->getCuilDirector() == ''){
		$mensaje = "Debes Escribir El <strong>Cuil</strong> Del Director.";	
		return $mensaje;
	}
	
	if($this->getNumeroEscuela() == ''){
		$mensaje = "Debes Escribir El <strong>Numero</strong> De La Escuela.";	
		return $mensaje;
	}
	
	if($this->getNombreEscuela() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> De La Escuela.";	
		return $mensaje;
	}
	
	if($this->getCueEscuela() == ''){
		$mensaje = "Debes Escribir El <strong>Cue</strong> De La Escuela.";	
		return $mensaje;
	}
	
	if($this->getSeccionEscuela() == ''){
		$mensaje = "Debes Escribir La <strong>Seccion</strong> De La Escuela.";	
		return $mensaje;
	}
	
	if($this->getDomicilioEscuela() == ''){
		$mensaje = "Debes Escribir La <strong>Direccion</strong> De La Escuela.";	
		return $mensaje;
	}
	
	if($this->getDomicilioEscuela() == ''){
		$mensaje = "Debes Escribir La <strong>Direccion</strong> De La Escuela.";	
		return $mensaje;
	}
	
	if($this->getCiudad() == ''){
		$mensaje = "Debes Escribir La <strong>Ciudad</strong> De La Escuela.";	
		return $mensaje;
	}
	
	if($this->getProvincia() == ''){
		$mensaje = "Debes Escribir La <strong>Provincia</strong> De La Escuela.";	
		return $mensaje;
	}
}	
	
	public function agregarDatosEscuela(){		
	global $docRootSitio;   			
 	
	 $q="INSERT INTO datosescuela (id,nombreDirector,apellidoDirector,dniDirector,cuilDirector,numeroEscuela,nombreEscuela,cueEscuela,seccionEscuela,domicilioEscuela,ciudad,provincia,nombreUsuario) "
			."VALUES ('','{$this->getNombreDirector()}','{$this->getApellidoDirector()}','{$this->getDniDirector()}','{$this->getCuilDirector()}','{$this->getNumeroEscuela()}','{$this->getNombreEscuela()}','{$this->getCueEscuela()}','{$this->getSeccionEscuela()}','{$this->getDomicilioEscuela()}','{$this->getCiudad()}','{$this->getProvincia()}','{$this->getNombreUsuario()}');";
	
	try {			
		$result = mysql_query($q);
		$this->setId(mysql_insert_id());
           if(!$result) {
            throw new Exception("<b>Explicar el error aqui</b>");
            
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
	
	public function modificarDatosEscuela(){
		global $docRootSitio;			
				
	   $q="UPDATE datosescuela SET nombreDirector='{$this->getNombreDirector()}',apellidoDirector='{$this->getApellidoDirector()}',dniDirector='{$this->getDniDirector()}',cuilDirector='{$this->getCuilDirector()}',numeroEscuela='{$this->getNumeroEscuela()}',nombreEscuela='{$this->getNombreEscuela()}',cueEscuela='{$this->getCueEscuela()}',seccionEscuela='{$this->getSeccionEscuela()}',domicilioEscuela='{$this->getDomicilioEscuela()}',ciudad='{$this->getCiudad()}',provincia='{$this->getProvincia()}' WHERE id='{$this->getId()}'";	
	
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
	
	public function eliminarDatosEscuela($DatosEscuela) {
	global $docRootSitio; 	
	$this->setId($DatosEscuela);
		
	$q = "DELETE FROM datosescuela WHERE id='{$this->getId()}' LIMIT 1";
	
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
			