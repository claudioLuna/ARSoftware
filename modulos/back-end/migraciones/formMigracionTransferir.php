	<!DOCTYPE html>
	<html lang="en">
	
	<head>
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
	
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    
	    <link href="<?php echo $httpHostSitio?>plantilla/css/bootstrap.min.css" rel="stylesheet">
	     <script src="<?php echo $httpHostSitio?>jquery/jquery-1.11.1.js"></script>	
	    
	    <link rel="stylesheet" href="<?php echo $httpHostSitio?>jquery/jqueryprintpage-master/css/reset.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo $httpHostSitio?>jquery/jqueryprintpage-master/css/demos.css" type="text/css" media="all" />
        
        <link rel="stylesheet" href="<?php echo $httpHostSitio?>jquery/jqueryprintpage-master/css/jquery.printpage.css" type="text/css" media="screen" />
        <script src="<?php echo $httpHostSitio?>jquery/jqueryprintpage-master/js/jquery.printpage.js"></script>
        
   <title>ARSoftware</title>
	    <?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/principal.php");
	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");
	include_once($docRootSitio."modelo/Alumno.php");	
	include_once($docRootSitio."modelo/DatosEscuela.php");
	include_once($docRootSitio."modelo/Marca.php");
	include_once($docRootSitio."modelo/Turno.php");
	
	$usuario = $_SESSION["nombreUsuario"];

	$datosesc = new DatosEscuela();
	$_datos = $datosesc->listarDatosEscuela($_POST['datosEscuela']);

	$alumno = new Alumno();
	$_alumnos = $alumno->listarAlumnoCuil($_POST['cuilAlumno']);

	$mar1 = new Marca();
	$mar1->setNombreUsuario($usuario);
	$_marcas = $mar1->listarMarca($_alumnos['MarcaNetbook']);
	
	$Turno= $_alumnos['turno'];
	$turno = new Turno();

	$turnos=$turno->listarTurno($Turno);


//echo $turnos;


	$mes = date(F);
		//meses
			if($mes=="January"){
		$mees=Enero;
		}
			if($mes=="February"){
		$mees=Febrero;
		}
			if($mes=="March"){
		$mees=Marzo;
		}
			if($mes=="April"){
		$mees=Abril;
		}
			if($mes=="May"){
		$mees=Mayo;
		}
			if($mes=="June"){
		$mees=Junio;
		}
			if($mes=="July"){
		$mees=Julio;
		}
			if($mes=="August"){
		$mees=Agosto;
		}
			if($mes=="September"){
		$mees=Septiembre;
		}
			if($mes=="October"){
		$mees=Octubre;
		}
			if($mes=="November"){
		$mees=Noviembre;
		}
			if($mes=="December"){
		$mees=Diciebre;
		}
?>

 <div id="container">

		    <div id="content">
                <div id="content-main">
		   			  <div id="content-sidebar">   
		   			  <TABLE WIDTH=100% CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=256*>
	<TR>
	
		<TD WIDTH=100% VALIGN=BOTTOM STYLE="border: 1.00pt solid #000000; padding: 0.1cm">
			<P LANG="es-ES" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0cm">
			</P>
			
	
	
			<P LANG="es-ES" CLASS="western" ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=3 STYLE="font-size: 13pt">
			<B>ACTA DE MIGRACIÓN PARA ALUMNOS DE ESCUELAS CUBIERTO POR EL PROGRAMA CONECTAR IGUALDAD. </B></FONT></FONT>
			<BR><B> <?php echo $_datos['numeroEscuela'];?></B><B> <?php echo $_datos['nombreEscuela'];?></B>
			
			
			</P>
	<center><img src="<?php echo $httpHostSitio?>plantilla/imagenes/conectar.png" alt="visita aulaclic" width="150" height="70" border="0"></center>		
		</TD>
	</TR>
</TABLE> 
<br>
<br>
Entre la autoridad educativa provincial representada por el Sr/a: <B><?php echo $_datos['nombreDirector'].' '.$_datos['apellidoDirector'];?> </B> DNI N° <B> <?php echo $_datos['dniDirector'];?></B>
en su carácter de Director de la Escuela <B> <?php echo $_datos['nombreEscuela'];?></B> Nº <B> <?php echo $_datos['numeroEscuela'];?></B> CUE: <B><?php echo $_datos['cueEscuela'];?> </B>
Sección de Supervisión <b><?php echo $_datos['seccionEscuela'];?> </b>de la ciudad de <B> <?php echo $_datos['ciudad'];?></B> Provincia de <B> <?php echo $_datos['provincia'];?></B>, con domicilio en <b><?php echo $_datos['domicilioEscuela'];?></b>
en adelante “EL CEDENTE”  y por otra parte el/la Sr./a ..................... DNI Nº ................en  su carácter de Director/a de la  Escuela  Nº ......  
Nombre.....................CUE............ Sección de Supervisión......de
la ciudad de.......................Provincia de Mendoza, con domicilio en....................................
<br>
En adelante “EL RECEPCIONISTA”, convienen por la presente acta la migración del/la alumno/a <b><?php echo $_alumnos['nombre'];?></b> <b><?php echo $_alumnos['apellido'];?></b> CUIL Nº <b> <?php echo $_alumnos['cuil'];?></b>
comodatario de la netbook modelo <b><?php echo $_marcas['nombre'];?></b> serie Nº <b><?php echo $_alumnos['numSerie'];?></b>, del establecimiento con director/a CEDENTE al establecimiento
con director/a RECEPCIONISTA, a fin de ser incorporada en la planta de alumnos comodatarios de este último establecimiento y la registración en el servidor del mismo para otorgar los 
correspondientes certificados de seguridad dejando de estar vinculada al servidor de la institución de origen.

 En prueba de conformidad se firman tres (3) ejemplares de un mismo tenor y a un solo efecto, por el CEDENTE y por el RECEPCIONISTA en la ciudad <B> <?php echo $_datos['ciudad'];?></B> Provincia de <B> <?php echo $_datos['provincia'];?></B>,
 a los <b><?php echo date("d");?> </b> días del mes de <b><?php echo $mees;?> </b> de <b><?php echo date("Y");?></b>.
  <br>
  <br>
<br>
  <br>



 sssss
		
 </div>
 </div>
 </div>
 </div>

 <div id="palabra" value="" style="border:1px solid #000000; width:140px;height:20px;margin:0 auto;padding:5px;background:#ABE319;font-Size:18px;" onclick="style.display='none',window.print();"><center>Imprimir</center></div>