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
		
class Tecnico{
		
	private $id;
	private $nombreAlumno;
	private $curso;
	private $cuil;
	private $numeroSerie;
	private $marca;
	private $problema;
	private $fecha;
	private $idreclamo;
	private $estado;
	private $estadoFin;
	private $nombreUsuario;
	
	public function Tecnico(){}
	
	#id	
	public function setId($id){
		$this->id = mysql_real_escape_string(strip_tags(trim($id)));		
	}	
	public function getId(){	
		return $this->id;
	}
	
	#nombreAlumno
	public function setNombreAlumno($nombreAlumno){
		$this->nombreAlumno = mysql_real_escape_string(strip_tags(trim($nombreAlumno)));	
	}
	public function getNombreAlumno(){
		return $this->nombreAlumno;
	}

	#curso
	public function setCurso($curso){
		$this->curso = mysql_real_escape_string(strip_tags(trim($curso)));	
	}
	public function getCurso(){
		return $this->curso;
	}
	
	#cuil
	public function setCuil($cuil){
		$this->cuil = mysql_real_escape_string(strip_tags(trim($cuil)));	
	}
	public function getCuil(){
		return $this->cuil;
	}
	
	#numeroSerie
	public function setNumeroSerie($numeroSerie){
		$this->numeroSerie = mysql_real_escape_string(strip_tags(trim($numeroSerie)));	
	}
	public function getNumeroSerie(){
		return $this->numeroSerie;
	}	
	
	#marca	
	public function setMarca($marca){
		$this->marca = mysql_real_escape_string(strip_tags(trim($marca)));	
	}
	public function getMarca(){
		return $this->marca;
	}	
	
	#problema	
	public function setProblema($problema){
		$this->problema = mysql_real_escape_string(strip_tags(trim($problema)));	
	}
	public function getProblema(){
		return $this->problema;
	}	
	
	#fecha
	public function setFecha(){
		$this->fecha = date("Y-m-d H:i:s");	
	}
	public function getFecha(){	
		return $this->fecha;
	}	
	
	#idreclamo	
	public function setIdReclamo($idreclamo){
		$this->idreclamo = mysql_real_escape_string(strip_tags(trim($idreclamo)));	
	}
	public function getIdReclamo(){
		return $this->idreclamo;
	}
	
	#estado	
	public function setEstado($estado){
		$this->estado = mysql_real_escape_string(strip_tags(trim($estado)));	
	}
	public function getEstado(){
		return $this->estado;
	}	
	
	#estado	update
	public function setEstado2($estado2){
		$this->estado2 = mysql_real_escape_string(strip_tags(trim($estado2)));	
	}
	public function getEstado2(){
		return $this->estado2;
	}
	
	#estadoFin
	public function setEstadoFin($estadoFin){
		$this->estadoFin = mysql_real_escape_string(strip_tags(trim($estadoFin)));	
	}
	public function getEstadoFin(){
		return $this->estadoFin;
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
	
	public function existeTecnico(){
	global $docRootSitio;	
		
	$q="SELECT numSerie FROM tecnico WHERE numSerie='{$this->getNumSerie()}' ";
									
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
	$_tecnico = $i1->iterarObjeto($result);
			
	if($_tecnico['nombre']){
		return 1;
	}
	else{
		return 0;
	}	
}
			
	public function listarTecnico($Tecnico){
		global $docRootSitio;		
		$this->setId($Tecnico);
				
		$q = "SELECT * FROM tecnico WHERE id='{$this->getId()}' LIMIT 1";
	
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
		$_tecnico = $i1->iterarObjeto($result);					
		return $_tecnico;	
	}
	
	public function listarTecnicoEstado($Tecnico,$usuario){
		global $docRootSitio;		
		$this->setId($Tecnico);
		$this->setNombreUsuario($usuario);
				
		$q = "SELECT * FROM tecnico WHERE numeroSerie='{$this->getId()}' AND estadoFin='0' AND nombreUsuario='{$this->getNombreUsuario()}'";
	
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
		$_tecnico = $i1->iterarObjeto($result);					
		return $_tecnico;	
	}
	
	public function listarTecnicos($offset="",$limit="",$campoOrder="",$order="",$usuario){		
		global $docRootSitio;		
		$this->setNombreUsuario($usuario);
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM tecnico WHERE nombreUsuario='{$this->getNombreUsuario()}'";
				
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
		$_tecnicos = $i1->iterarObjetos($result);	
			
		return $_tecnicos;	
	}
	
	public function listarTecnicosPrincipal($offset="",$limit="",$campoOrder="",$order="",$usuario){		
		global $docRootSitio;		
		$this->setNombreUsuario($usuario);
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM tecnico WHERE nombreUsuario='{$this->getNombreUsuario()}' AND estado!=3";
				
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
		$_tecnicos = $i1->iterarObjetos($result);	
			
		return $_tecnicos;	
	}
	
	public function setTecnico($_post){
		if(is_array($_post)){			
			$_campos = array_keys($_post);		
		}	
			
		for($i=0;$i<count($_campos);$i++){		
			if($_post[$_campos[$i]] != '' && method_exists ($this,"set".agregarMayuscula($_campos[$i]))){
			$this->{"set".agregarMayuscula($_campos[$i])}($_post[$_campos[$i]]);
			}				
		}		
	}
	
	public function validarTecnico($_post){	
	$this->setTecnico($_post);
		
	if($this->getIdReclamo() == ''){
		$mensaje = "Debes Escribir El <strong>Id De Reclamo</strong> De Anses.";	
		return $mensaje;
	}	
	
	if($this->getProblema() == ''){
		$mensaje = "Debes Escribir El <strong>Problema</strong> Expresado Por El Alumno.";	
		return $mensaje;
	}
			
	if($this->getEstado() == ''){
		$mensaje = "Debes Ingresar El <strong>Estado</strong> Del Reclamo.";	
		return $mensaje;
	}
}	
	
	public function agregarTecnico(){		
	global $docRootSitio;   			
 	
	$q="INSERT INTO tecnico (id,nombreAlumno,curso,cuil,numeroSerie,marca,problema,fecha,idreclamo,estado,estadoFin,nombreUsuario) "
			."VALUES ('','{$this->getNombreAlumno()}','{$this->getCurso()}','{$this->getCuil()}','{$this->getNumeroSerie()}','{$this->getMarca()}','{$this->getProblema()}','{$this->getFecha()}','{$this->getIdReclamo()}','{$this->getEstado()}','0','{$this->getNombreUsuario()}');";
	
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
	
	public function modificarTecnico(){
		global $docRootSitio;			
				
	$q="UPDATE tecnico SET nombreAlumno='{$this->getNombreAlumno()}',numeroSerie='{$this->getNumeroSerie()}',marca='{$this->getMarca()}',problema='{$this->getProblema()}',fecha='{$this->getFecha()}',idreclamo='{$this->getIdReclamo()}',estado='{$this->getEstado2()}' WHERE id='{$this->getId()}'";	

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
	
	public function eliminarTecnico($Tecnico) {
	global $docRootSitio; 	
	$this->setId($Tecnico);
		
	$q = "DELETE FROM tecnico WHERE id='{$this->getId()}' LIMIT 1";
	
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
	
	public function modificarEstado($Netbook){
	global $docRootSitio;			
	$this->setId($Netbook);
	
	 	$q="UPDATE  tecnico SET estadoFin='1' WHERE id='{$this->getId()}'";	
		
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
	
	
	function dias_transcurridos($fecha_i,$fecha_f)
	{
		$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
		$dias 	= abs($dias); $dias = floor($dias);
		return $dias;
	}
	
	
	
}
			