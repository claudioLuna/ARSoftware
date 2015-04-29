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
	include_once($docRootSitio."modelo/Curso.php");
	
	$datosesc = new DatosEscuela();$turno = new Turno();
	$curso = new Curso();
	$alumno = new Alumno();
	$mar1 = new Marca();
	$usuario = $_SESSION["nombreUsuario"];	

	$Turno= $_alumnos['turno'];
	$_datos = $datosesc->listarDatosEscuela($_POST['datosEscuela']);
	$_alumnos = $alumno->listarAlumnoCuil($_POST['cuilAlumno']);
	
	$turnos=$turno->listarTurno($_alumnos['turno']);
	$curso=$curso->listarCurso($_alumnos['curso']);



	$mar1->setNombreUsuario($usuario);
    
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
			<B>CONTRATO DE COMODATO ESCUELA SECUNDARIA / INSTITUTO DE FORMACION DOCENTE. </B></FONT></FONT>
			<BR><B> <?php echo $_datos['numeroEscuela'];?></B><B> <?php echo $_datos['nombreEscuela'];?></B>
			
			
			</P>
	<center><img src="<?php echo $httpHostSitio?>plantilla/imagenes/conectar.png" alt="visita aulaclic" width="150" height="70" border="0"></center>		
		</TD>
	</TR>
</TABLE> 
		        <br>

<p>Entre la Autoridad Educativa Provincial representada en este acto por el Sr./a: <B><?php echo $_datos['nombreDirector'].' '.$_datos['apellidoDirector'];?> </B>,DNI Nº<B> <?php echo $_datos['dniDirector'];?></B>,
en su carácter de Director/a/Rector/a de la Escuela/Instituto<B> <?php echo $_datos['nombreEscuela'];?></B>, Nº<B> <?php echo $_datos['numeroEscuela'];?></B>,Distrito Escolar:<b><?php echo $_datos['seccionEscuela'];?> </b>de
la Ciudad de <b><?php echo $_datos['ciudad'];?> </b>Provincia de <b><?php echo $_datos['provincia'];?></b> con domicilio en <b><?php echo $_datos['domicilioEscuela'];?></b>,en adelante “EL COMODANTE” y por la otra la/el
Señora/Señor <b><?php echo $_alumnos['nombrePadre'].' '.$_alumnos['apellidoPadre'];?></b> .CUIL <b><?php echo $_alumnos['cuilPadre'];?></b>,con domicilio en la calle ............................piso….., dpto….…,de la ciudad
de <b><?php echo $_datos['ciudad'];?> </b>,Provincia de <b><?php echo $_datos['provincia'];?> </b> ;por sí,como mayor de edad o menor emancipado, o en su carácter de madre/padre/tutora/tutor/representante legal de <b><?php echo $_alumnos['nombre'].' '.$_alumnos['apellido'];?></b> Cuil <b><?php echo $_alumnos['cuil'];?></b>,alumna/o
 del curso <b><?php echo $curso['nombre'];?></b>, turno <b><?php echo $turnos['nombre'];?></b>, del establecimiento educativo <B><?php echo $_datos['nombreEscuela'];?></B>,sito en la calle <b><?php echo $_datos['domicilioEscuela'];?></b>,
de la ciudad de <b><?php echo $_datos['ciudad'];?> </b>provincia de <b><?php echo $_datos['provincia'];?> </b>, en adelante“EL COMODATARIO”,
ambos mayores de edad y hábiles para este acto,convienen en celebrar el presente CONTRATO DE COMODATO,sujeto a las siguientes cláusulas y condiciones:</p>

<b>PRIMERA:</b> EL COMODANTE da en COMODATO al COMODATARIO, y éste acepta,una laptop educativa Modelo <b><?php echo $_marcas['nombre'];?></b> Numero de Serie <b><?php echo $_alumnos['numSerie'];?></b>.<br><br>

<b>SEGUNDA:</b> EL COMODATARIO	destinará la laptop	que	recibe en COMODATO a fines educativos en su carácter de estudiante y para el uso de su grupo familiar,
en el marco del PROGRAMA CONECTAR IGUALDAD.COM.AR, procurando familiarizar a todo integrante de su hogar con las nuevas  tecnologías. La entrega del
equipamiento implica única y exclusivamente la facultad de uso sobre el mismo, el que deberá realizarse conforme a su destino.<br><br>

<b>TERCERA:</b> El COMODATARIO reconoce en forma expresa que recibe el bien objeto	del	presente contrato de parte de EL COMODANTE gratuitamente, en concepto
de préstamo de uso.También será gratuita su conectividad en los términos y condiciones establecidos por el Comité Ejecutivo del Programa Conectar Igualdad.<br><br>

<b>CUARTA:</b> El presente contrato tendrá vigencia desde la firma del mismo y (i) hasta el momento en que el estudiante de por acreditado con titulo
la finalización del ciclo educativo correspondiente en cualquiera de sus modalidades o, (ii) en el supuesto que hubiere recibido la laptop educativa
dentro de los noventa (90) días corridos previos al final del cursado del ciclo y habiendo egresado del mismo,hasta la aprobación del curso de introducción
al uso de las TIC (Tecnologías de la Información)en el sistema educativo realizada dentro de los seis (6) meses posteriores a dicho egreso,en los términos
dispuesto por el COMITÉ EJECUTIVO DEL PROGRAMA CONECTAR  IGUALDAD.COM.AR.
Una  vez  cumplimentada  una  u  otra condición, conforme el momento del ciclo lectivo en que el estudiante haya recibido  la  laptop  educativa,
la  misma pasará a ser de propiedad  del estudiante.<br><br>

<b>QUINTA:</b> El COMODATARIO podrá rescindir en cualquier momento el presente contrato previa notificación fehaciente a EL COMODANTE con TREINTA (30) días de anticipación,
debiendo para ello restituir la laptop objeto del presente al COMODANTE en buen estado de conservación.<br><br>

<b>SEXTA:</b> El COMODANTE	podrá requerir en cualquier	momento	la devolución de la laptop objeto del presente contrato, y el COMODATARIO deberá  efectuar  la entrega de la
misma dentro de los TREINTA (30) días posteriores a la notificación en  tal sentido. En ningún supuesto y bajo ningún concepto podrá EL COMODATARIO retener el bien prestado, una vez que
EL COMODANTE solicite su reintegro. En caso de no restitución del bien en el plazo acordado,EL COMODATARIO quedará	constituido en mora de pleno derecho, quedando facultado
EL COMODANTE  a homologar el presente convenio y solicitar su reintegro con la sola presentación  del mismo.<br><br>

<b>SEPTIMA:</b> EL COMODATARIO se compromete expresamente a utilizar el bien recibido para  el desarrollo de los objetivos y fines propios del Programa Conectar Igualdad; en el  marco del proyecto
educativo  aprobado  por la Autoridad  Educativa  de  la  Jurisdicción,  compatible  con  los  compromisos acordados en el seno del Consejo Federal de Educación.<br><br>

<b>OCTAVA:</b> EL COMODATARIO se compromete a mantener en buen estado de  conservación y a utilizar el equipamiento recibido conforme su destino; así como a resguardar el equipamiento entregado y
no comercializarlo.  En caso  de  robo/hurto  o  extravío  del  mismo,  EL  COMODATARIO  deberá efectuar  ante  dependencia  policial  o  autoridad  competente  la  pertinente denuncia, dentro
de las 72 horas de acontecido el hecho. Además, deberá comunicar  dicha  denuncia  en	www.conectarigualdad.gob.ar (Portal  de Conectar Igualdad). EL COMODANTE podrá, ante la falsa u ausencia de
denuncia  en  tiempo  y  forma  por  parte  del  COMODATARIO,  iniciar  las acciones judiciales que pudieren corresponder.<br><br>

<b>NOVENA:</b> El  ALUMNO  deberá  inscribirse  OBLIGATORIAMENTE  en  el aplicativo	creado	en	www.conectarigualdad.gob.ar,(Portal	Conectar Igualdad) para gozar de la garantía de reposición o de
servicio técnico con que cuenta el equipamiento entregado en comodato.<br><br>

<b>DECIMA:</b> EL COMODATARIO deberá solicitar	oportunamente al COMODANTE, por cuenta de éste último, las reparaciones necesarias sobre el bien objeto del presente, con el fin de posibilitar una 
adecuada utilización del mismo.<br><br>

<b>DECIMOPRIMERA:</b> EL COMODANTE y EL COMODATARIO constituyen domicilio especial en los señalados “ut supra”, donde tendrán validez todas las notificaciones judiciales y extrajudiciales.<br><br>

<b>DECIMOSEGUNDA:</b> EL COMODATARIO autoriza a EL COMODANTE a la realización de  investigaciones cuantitativas (encuestas) y/o investigaciones cualitativas (entrevistas en profundidad), con el consentimiento
del usuario/a,a través de la entidad que designe con el fin de evaluar el funcionamiento y desempeño del programa.<br><br>

<b>DECIMOTERCERA:</b> Para cualquier cuestión judicial, de común acuerdo las partes  quedan  sometidas a la competencia de los Juzgados Ordinarios de Primera Instancia con competencia en lo Contencioso Administrativo.<br><br>

En prueba de conformidad se firman DOS (2) ejemplares de un mismo tenor y a un solo efecto, por EL COMODANTE y por “EL COMODATARIO” en la ciudad <B> <?php echo $_datos['ciudad'];?></B> Provincia de <B> <?php echo $_datos['provincia'];?></B>,
a los <b><?php echo date("d");?></b> días del mes de <b><?php echo $mees;?> </b> de <b><?php echo date("Y");?></b>.

    
		        
		        </div>
                
                
                </div>
		    </div>
        </div>
        
        <div id="palabra" value="" style="border:1px solid #000000; width:140px;height:20px;margin:0 auto;padding:5px;background:#ABE319;font-Size:18px;" onclick="style.display='none',window.print();"><center>Imprimir</center></div>