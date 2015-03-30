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
<?php
	include_once($docRootSitio."utiles/conexion.php");
	include_once("Iterador.php");	
		
class Administrador{
		
	private $id;
	private $nombre;
	private $apellido;
	private $Rol;
	private $nombreUsuario;
	private $clave;
	private $token;
	private $fecha;
	
	#atributos que no son campos en la tabla
	private $nombreUsuarioDb;
	
	public function Administrador(){}
	
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
		$this->apellido = $apellido;
	}
	public function getApellido(){
		return $this->apellido;				
	}
	
	#Rol
	public function setRol($Rol){
		$this->Rol = mysql_real_escape_string(strip_tags(trim($Rol)));		
	}
	public function getRol(){
		return $this->Rol;
	}		

	#nombreUsuario
	public function setNombreUsuario($nombreUsuario){
		$this->nombreUsuario = strtolower(mysql_real_escape_string(strip_tags(trim($nombreUsuario))));			
	}
	public function getNombreUsuario(){
		return $this->nombreUsuario;				
	}
	
	#clave
	public function setClave($clave){
		$this->clave = strtolower(mysql_real_escape_string(strip_tags(trim($clave))));
	}
	public function getClave(){
		return $this->clave;				
	}
	
	#token
	public function setToken($token){
		$this->token = $token;
	}
	public function getToken(){
		return $this->token;				
	}
	
	#fecha
	public function setFecha(){
		$this->fecha = date("Y-m-d H:i:s");	
	}
	public function getFecha(){	
		return $this->fecha;
	}	
	
	#nombreUsuarioDb
	public function setNombreUsuarioDb($nombreUsuarioDb){
		$this->nombreUsuarioDb = mysql_real_escape_string(strip_tags(trim($nombreUsuarioDb)));	
	}
	public function getNombreUsuarioDb(){
		return $this->nombreUsuarioDb;
	}
	
	
	public function getCantAdministradores(){
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
		$_administrador = $i1->iterarObjeto($result);
		$cantRegistros = $_administrador['cantidad'];
			
		return $cantRegistros;	
		
	}
		
	public function setAdministrador($_post){
		if(is_array($_post)){			
			$_campos = array_keys($_post);		
		}	
			
		for($i=0;$i<count($_campos);$i++){		
			if($_post[$_campos[$i]] != '' && method_exists ($this,"set".agregarMayuscula($_campos[$i]))){
			$this->{"set".agregarMayuscula($_campos[$i])}($_post[$_campos[$i]]);
			}				
		}		
	}
	
	public function validarAdministrador($_post){	
	$this->setAdministrador($_post);
		
	if($this->getNombre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Usuario.";	
		return $mensaje;
	}
	
	if($this->getApellido() == ''){
		$mensaje = "Debes Escribir El <strong>Apellido</strong> Del Usuario.";	
		return $mensaje;
	}
	
	if($this->getRol() == 0){
		$mensaje = "Debes Seleccionar El <strong>Rol</strong> Del Usuario.";	
		return $mensaje;
	}
		
	if($this->getNombreUsuario() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre De Usuario</strong> del Usuario.";	
		return $mensaje;
	}
	
	if(!ereg("^[_a-z0-9]+$",$this->getNombreUsuario())){
		$mensaje = "El nombre de usuario contiene espacios o caract&eacute;res <strong>no v&aacute;lidos</strong>";		
		return $mensaje;
	}	
	
	if($this->getClave() == ''){
		$mensaje = "Debes Escribir La <strong>Contrase&ntilde;a</strong> Del Usuario.";	
		return $mensaje;
	}
	
	if($this->getNombreUsuarioDb()!=$this->getNombreUsuario()){
		if($this->existeAdministrador()) {
			$mensaje = "El Administrador ya existe.";		
			return $mensaje;
		}
	}
	
}
	
	public function validarFormLoginAdministrador($_administrador){	
		
	$this->setAdministrador($_administrador);	
	
	if($this->getNombreUsuario() == ''){
		$mensaje = "Debes escribir el <strong>nombre de usuario</strong> del Administrador.";	
		return $mensaje;
	}
	if($this->getClave() == ''){
		$mensaje = "Debes escribir la <strong>clave</strong> del Administrador.";	
		return $mensaje;
	}
	
}
	
	public function existeAdministrador(){
	global $docRootSitio;
	$tabla = agregarMinuscula(get_class($this));
		
	$q="SELECT nombre FROM $tabla WHERE nombre='{$this->getNombreUsuario()}'";
									
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
	$_administrador = $i1->iterarObjeto($result);
			
	if($_administrador['nombre']){
		return 1;
	}
	else{
		return 0;
	}
	
	
}
	
	public function listarAdministradores($offset="",$limit="",$campoOrder="",$order=""){
		global $docRootSitio;
		$tabla = agregarMinuscula(get_class($this));
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM $tabla ";
				
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
		$_administradores = $i1->iterarObjetos($result);	
			
		return $_administradores;	
	}
	
	public function modificarAdministradorUsuario(){
		global $docRootSitio;	
		$tabla = agregarMinuscula(get_class($this));
				
	echo	$q="UPDATE $tabla SET clave='{$this->getClave()}' WHERE id='{$this->getId()}' ";	
		
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
	
	public function listarAdministradorins2($Administrador){
		global $docRootSitio;
		$tabla = agregarMinuscula(get_class($this));
		$this->setId($Administrador);			
		
		$q = "SELECT * FROM $tabla WHERE nombreUsuario='{$this->getId()}' LIMIT 1";
	
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
		$_administrador = $i1->iterarObjeto($result);	
			
		return $_administrador;	
		
	}
		
	public function listarAdministrador($Administrador){
		global $docRootSitio;
		$tabla = agregarMinuscula(get_class($this));
		$this->setId($Administrador);			
		
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
		$_administrador = $i1->iterarObjeto($result);	
			
		return $_administrador;	
		
	}
	
	public function listarAdministrador_nombreUsuario($nombreUsuario){
		global $docRootSitio;
		$tabla = agregarMinuscula(get_class($this));
		$this->setNombreUsuario($nombreUsuario);			
		
		$q = "SELECT * FROM $tabla WHERE nombreUsuario='{$this->getNombreUsuario()}' LIMIT 1";
	
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
		$_administrador = $i1->iterarObjeto($result);	
			
		return $_administrador;	
		
	}
	
	public function loginAdministrador() {
	global $docRootSitio;
	$tabla = agregarMinuscula(get_class($this));
	
	$q = "SELECT * FROM $tabla WHERE nombreUsuario='{$this->getNombreUsuario()}' AND clave='{$this->getClave()}' LIMIT 1";
		
	try {
	
	$result = mysql_query($q);
            if(!$result) {
                throw new Exception("<b>Explicar el error aqu&iacute;</b>");
            }
    }      
    catch (Exception $e) {        

			$error['consulta'] = $q;
            $error['mysql'] = mysql_error();            
            include_once ($docRootSitio . "modulos/errores/listarErrores.php");
            exit();
    }
		
	$i1 = new Iterador();
	$_administrador = $i1->iterarObjeto($result);	
			
	return $_administrador;	
}

	public function modificarToken($nombreUsuario,$token){
		global $docRootSitio; 
		$tabla = agregarMinuscula(get_class($this));
				
		$this->setNombreUsuario($nombreUsuario);
		$this->setToken($token);
		
		$q = "UPDATE $tabla SET token='{$this->getToken()}' WHERE nombreUsuario='{$this->getNombreUsuario()}' LIMIT 1" ;
		
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
	}
	
	public function listarAdministrador_nombreUsuario_token($nombreUsuario,$token){
		global $docRootSitio;
		$tabla = agregarMinuscula(get_class($this));
		$this->setNombreUsuario($nombreUsuario);	
		$this->setToken($token);	
	
		$q = "SELECT id FROM $tabla WHERE nombreUsuario='{$this->getNombreUsuario()}' AND token='{$this->getToken()}' LIMIT 1";
	
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
		$_administrador = $i1->iterarObjeto($result);	
		$this->setId($_administrador['id']);	
						
		return $this->getId();			
	}
	
	public function agregarAdministrador(){		
	global $docRootSitio;
	$tabla = agregarMinuscula(get_class($this));
	   			
    
	$this->setFecha();
				
	try {
		$q="INSERT INTO $tabla (id,nombre,apellido,Rol,nombreUsuario,clave,fecha) "
			."VALUES ('','{$this->getNombre()}','{$this->getApellido()}','{$this->getRol()}','{$this->getNombreUsuario()}',"
			."'{$this->getClave()}','{$this->getFecha()}');";
			
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
	
	public function modificarAdministrador(){
		global $docRootSitio;	
		$tabla = agregarMinuscula(get_class($this));
				
		$q="UPDATE $tabla SET nombre='{$this->getNombre()}',apellido='{$this->getApellido()}',Rol='{$this->getRol()}',"
			."nombreUsuario='{$this->getNombreUsuario()}',clave='{$this->getClave()}' WHERE id='{$this->getId()}' ";	
						
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
	
	public function eliminarAdministrador($Administrador) {
	global $docRootSitio; 
	$tabla = agregarMinuscula(get_class($this));	
	$this->setId($Administrador);
		
	$q = "DELETE FROM $tabla WHERE id='{$this->getId()}' LIMIT 1";
	
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
?>




