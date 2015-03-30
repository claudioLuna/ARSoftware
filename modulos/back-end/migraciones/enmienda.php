<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
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
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="OpenOffice.org 3.2  (Linux)">
	<META NAME="AUTHOR" CONTENT="symfony ">
	<META NAME="CREATED" CONTENT="20140824;2524000">
	<META NAME="CHANGEDBY" CONTENT="symfony ">
	<META NAME="CHANGED" CONTENT="20140824;4570700">
	<META NAME="CHANGEDBY" CONTENT="symfony ">
	<STYLE TYPE="text/css">
	<!--
		@page { margin: 2cm }
		P { margin-bottom: 0.21cm }
		TD P { margin-bottom: 0cm }
	-->
	</STYLE>
	 <title>ARSoftware</title>
</HEAD>

<?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/principal.php");
	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");
	include_once($docRootSitio."modelo/Alumno.php");	
	include_once($docRootSitio."modelo/DatosEscuela.php");
	include_once($docRootSitio."modelo/Marca.php");
	
	$datosesc = new DatosEscuela();

	$_datos = $datosesc->listarDatosEscuela($_POST['datosEscuela']);
	$alumno = new Alumno();
	$_alumnos = $alumno->listarAlumnoCuil($_POST['cuilAlumno']);

	$mar1 = new Marca();
	$_marcas = $mar1->listarMarca($_alumnos['MarcaNetbook']);

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
			<B>ENMIENDA DE MIGRACION . </B></FONT></FONT>
			<BR><B> <?php echo $_datos['numeroEscuela'];?></B><B> <?php echo $_datos['nombreEscuela'];?></B>
			
			</P>
	<center><img src="<?php echo $httpHostSitio?>plantilla/imagenes/conectar.png" alt="visita aulaclic" width="150" height="70" border="0"></center>		
		</TD>
	</TR>
</TABLE> 

<br>
<br>

El/La director/a de la escuela N°............. Nombre.....................deja constancia por la presente que deslinda de toda responsabilidad,
sobre la netbook <b> <?php  echo $_marcas['nombre'];?></b> al Sr. <b> <?php echo $_datos['nombreDirector'];?></b> <b> <?php echo $_datos['apellidoDirector'];?></b> Director de la Escuela N°
 <b> <?php echo $_datos['numeroEscuela'];?></b>, <b><?php echo $_datos['nombreEscuela'];?></b>,dado que a partir
 de la fecha <b><?php echo date("d");?></b> del mes de <b><?php echo $mees;?></b> de <b><?php echo date("Y");?></b>,
 la misma migra a esta escuela, a nombre del alumno <b><?php echo $_alumnos['nombre'];?></b> <b><?php echo $_alumnos['apellido'];?></b> ,
 CUIL:<b><?php echo $_alumnos['cuil'];?></b>.<br><br>

<div id="palabra" value="" style="border:1px solid #000000; width:140px;height:20px;margin:0 auto;padding:5px;background:#ABE319;font-Size:18px;" onclick="style.display='none',window.print();"><center>Imprimir</center></div>

<P STYLE="margin-bottom: 0cm"><BR>
</P>
</BODY>
</HTML>