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
	
	     <title>ARSoftware</title>

<?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/principal.php");
	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");
	include_once($docRootSitio."modelo/Alumno.php");	
	include_once($docRootSitio."modelo/DatosEscuela.php");
	include_once($docRootSitio."modelo/Marca.php");
	include_once($docRootSitio."modelo/Turno.php");
	include_once($docRootSitio."modelo/Curso.php");

	$datosesc = new DatosEscuela();
	$mar1 = new Marca();
	$alumno = new Alumno();
	$Turno= $_alumnos['turno'];
	$turno = new Turno();
	$curso = new Curso();
	
	$_datos = $datosesc->listarDatosEscuela($_POST['datosEscuela']);
	$_alumnos = $alumno->listarAlumnoCuil($_POST['cuilAlumno']);
	$_marcas = $mar1->listarMarca($_alumnos['MarcaNetbook']);
	$curso=$curso->listarCurso($_alumnos['curso']);
	$turnos=$turno->listarTurno($_alumnos['turno']);
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
			<B>CONTRATO DE CESION PARA ALUMNOS. </B></FONT></FONT>
			
			<BR><B> <?php echo $_datos['numeroEscuela'];?></B><B> <?php echo $_datos['nombreEscuela'];?></B>
			</P>
	<center><img src="<?php echo $httpHostSitio?>plantilla/imagenes/conectar.png" alt="visita aulaclic" width="150" height="70" border="0"></center>		
		</TD>
	</TR>
</TABLE> 
<br>
<br>


Entre la Autoridad Educativa Provincial representada en este acto por el
Sr/a:<b> <?php echo $_datos['nombreDirector'].' '.$_datos['apellidoDirector'];?></b> 
DNI Nº <b><?php echo $_datos['dniDirector'];?></b>,
en su carácter de Director/a/Rector/a de la	Escuela/Instituto
<B> <?php echo $_datos['nombreEscuela'];?></B>,Nº<B> <?php echo $_datos['numeroEscuela'];?></B>
,Distrito Escolar:<b><?php echo $_datos['seccionEscuela'];?> </b>
 de la Ciudad de <b><?php echo $_datos['ciudad'];?></b> Provincia de <b><?php echo $_datos['provincia'];?></b> con domicilio en
  <b><?php echo $_datos['domicilio'];?></b>, en adelante “EL CEDENTE” y por la otra parte la/el
   Señora/Señor: <b><?php echo $_alumnos['nombre'].' '.$_alumnos['apellido'];?></b> CUIL Nº <b> <?php echo $_alumnos['cuil'];?></b>,
    con domicilio en la calleN° <b> <?php echo $_alumnos['direccion'];?></b> piso…….dpto….…, de la ciudad <B> <?php echo $_datos['ciudad'];?></B> Provincia de <B> <?php echo $_datos['provincia'];?></B>;
     en su carácter de alumna/o del curso<b> <?php echo $curso['nombre'];?></b>, turno<b> <?php echo $turnos['nombre']; ?></b>,o en su carácter de padre,
      madre, tutor o representante legal del  alumna/o………………….… DNI  Nº……………....del  curso…….….  División……..,
        turno……….…  del establecimiento educativo mencionado,en adelante “EL  CESIONARIO”, ambos mayores de edad
         y hábiles para este acto, convienen en celebrar el presente CONTRATO DE CESION EN PROPIEDAD, sujeto a las siguientes cláusulas y condiciones:

PRIMERA: LA AUTORIDAD EDUCATIVA da en forma gratuita y definitiva en PROPIEDAD al CESIONARIO y éste acepta, una laptop educativa Modelo: <b><?php echo $_marcas['nombre'];?></b> Numero de Serie <b><?php echo $_alumnos['numSerie'];?></b>, con cargo de destinarla a fines formativos y de compartirla con su grupo familiar primario,comprometiéndose a no enajenarla de ninguna forma y bajo ninguna circunstancia o concepto.

En prueba de conformidad se firman DOS (2) ejemplares de un mismo tenor y a un solo efecto, por EL CEDENTE y por EL CESIONARIO en la ciudad
<b><?php echo $_datos['ciudad'];?></b> Provincia de <b><?php echo $_datos['provincia'];?></b>, a los <b><?php echo date("d");?> </b> días del mes de <b><?php echo $mees;?> </b> de <b><?php echo date("Y");?><br>


<div id="palabra" value="" style="border:1px solid #000000; width:140px;height:20px;margin:0 auto;padding:5px;background:#ABE319;font-Size:18px;" onclick="style.display='none',window.print();"><center>Imprimir</center></div>