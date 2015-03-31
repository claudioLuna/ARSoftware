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
class Fecha{
	private $año;
	private $mes;
	private $dia;
			
	public function Fecha(){}
	
	#año
	public function setAño($año){
		if(is_numeric($año)){
			$this->año = $año;
		}
		else{
			$this->año=0;
		}
	}
	
	public function getAño(){		
		return $this->año;
	}
	
	#mes
	public function setMes($mes){
		if(is_numeric($mes)){
			$this->mes = $mes;
		}
		else{
			$this->mes=0;
		}
	}
	
	public function getMes(){
		return $this->mes;
	}
	
	#dia
	public function setDia($dia){
		if(is_numeric($dia)){
			$this->dia = $dia;
		}
		else{
			$this->dia=0;
		}
	}
	
	public function getDia(){
		return $this->dia;
	}
	
	public function formatearFecha($fecha){				
		$_fecha = explode("/",$fecha);
		
		$this->setAño($_fecha[2]);
		$this->setMes($_fecha[1]);
		$this->setDia($_fecha[0]);
		
		if(checkdate($this->getMes(),$this->getDia(),$this->getAño())){
			return $fechaFormateada = $this->getAño() . "-" . $this->getMes() . "-" . $this->getDia();
		}
		else{
			return 0;		
		}
		
	}

	public function desformatearFecha($fecha){
		$_fecha = explode("-",$fecha);
		
		$this->setAño($_fecha[0]);
		$this->setMes($_fecha[1]);
		$dia = substr($_fecha[2],0,2);
		$this->setDia($dia);
			
		$fechaDesformateada = $this->getDia() . "/" . $this->getMes() . "/" . $this->getAño();
		
		return $fechaDesformateada;
		
	}
	
	////////Comparar Fechas////////////
	function compararFechas($primera, $segunda)
	{
		//echo $primera;
		//echo "<br>";
		
    $dias	= (strtotime($primera)-strtotime($segunda))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	
	
	return  $dias;
	
	
	}
	
	//$primera = "29/02/2000";
	//$segunda = "31/01/2000";
	
	//echo compararFechas ($primera,$segunda);
	//exit;
	
}
	
	

?>