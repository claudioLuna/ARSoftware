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
		
class Correo{
		
	private $id;
	private $nombreOrigen;
	private $nombreDestino;
	private $mensaje;
	private $asunto;
	private $fecha;
	
	public function Correo(){}
	
	#id	
	public function setId($id){
		$this->id = mysql_real_escape_string(strip_tags(trim($id)));		
	}	
	public function getId(){	
		return $this->id;
	}
	
	#nombreOrigen	
	public function setNombreOrigen($nombreOrigen){
		$this->nombreOrigen = mysql_real_escape_string(strip_tags(trim($nombreOrigen)));	
	}
	public function getNombreOrigen(){
		return $this->nombreOrigen;
	}

	#nombreDestino	
	public function setNombreDestino($nombreDestino){
		$this->nombreDestino = mysql_real_escape_string(strip_tags(trim($nombreDestino)));	
	}
	public function getNombreDestino(){
		return $this->nombreDestino;
	}	
	
	#mensaje	
	public function setMensaje($mensaje){
		$this->mensaje = mysql_real_escape_string(strip_tags(trim($mensaje)));	
	}
	public function getMensaje(){
		return $this->mensaje;
	}
	
	#asunto	
	public function setAsunto($asunto){
		$this->asunto = mysql_real_escape_string(strip_tags(trim($asunto)));	
	}
	public function getAsunto(){
		return $this->asunto;
	}
	
	#fecha	
		public function setFecha(){
		$this->fecha = date("d-m-Y H:i:s");	
	}
	public function getFecha(){	
		return $this->fecha;
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
	
	public function listarCorreosUsuario($Usuario){		
		global $docRootSitio;		
		$this->setId($Usuario);
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM correo WHERE nombreDestino='{$this->getId()}' ";
				
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
		$_correos = $i1->iterarObjetos($result);	
			
		return $_correos;	
	}
	
	public function setCorreo($_post){
		if(is_array($_post)){			
			$_campos = array_keys($_post);		
		}	
			
		for($i=0;$i<count($_campos);$i++){		
			if($_post[$_campos[$i]] != '' && method_exists ($this,"set".agregarMayuscula($_campos[$i]))){
			$this->{"set".agregarMayuscula($_campos[$i])}($_post[$_campos[$i]]);
			}				
		}		
	}
	
	public function validarCorreo($_post){	
	$this->setCorreo($_post);
		
	if($this->getNombreOrigen() == ''){
		$mensaje = "Debes seleccionar el <strong>Nombre</strong> del destinatario.";	
		return $mensaje;
	}
	if($this->getMensaje() == ''){
		$mensaje = "No puedes enviar un <strong>Correo</strong> en blanco.";	
		return $mensaje;
	}
	if($this->getAsunto() == ''){
		$mensaje = "Debes ingresar el <strong>Asunto</strong> del mail.";	
		return $mensaje;
	}
	
}	
	
	public function agregarCorreo(){		
	global $docRootSitio;   			
 	
	$q="INSERT INTO correo (id,nombreOrigen,nombreDestino,mensaje,asunto,fecha) "
			."VALUES ('','{$this->getNombreOrigen()}','{$this->getNombreDestino()}','{$this->getMensaje()}','{$this->getAsunto()}','{$this->getFecha()}');";
	
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
	
	public function eliminarCorreo($Correo) {
	global $docRootSitio; 	
	$this->setId($Correo);
		
	$q = "DELETE FROM correo WHERE id='{$this->getId()}' LIMIT 1";
	
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
			