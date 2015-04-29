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
	
    include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");	
    include_once($docRootSitio."modelo/Alumno.php");
    include_once($docRootSitio."modelo/Marca.php");
    include_once($docRootSitio."modelo/Curso.php");
    include_once($docRootSitio."modelo/Turno.php");
    include_once($docRootSitio."modelo/Tecnico.php");
    include_once($docRootSitio."modelo/Prestamo.php");
	include_once($docRootSitio."modelo/Administrador.php");
	include_once($docRootSitio."modelo/DatosEscuela.php");
	include_once($docRootSitio."modelo/Consulta.php");
	
	
	#nuevo objeto
	$alu1 = new Alumno();				
	$cur1 = new Curso();
	$mar1 = new Marca();
	$adm1 = new Administrador();
	$tur1 = new Turno();
	$datoesc = new DatosEscuela();
	
	$consulta = new Consulta();
	
	$usuario = $_SESSION["nombreUsuario"];
	$curso=$_GET['Curso'];

    $alu1->setNombreUsuario($usuario);
	
	$cur1->setNombreUsuario($usuario);
	$_cursos = $cur1->listarCursos();
    $_consultas = $consulta->listarNetbookCurso($offset,$limit,$campoOrder,$order,$curso,$_POST['campoBusqueda']);

for($i=1;$i<=count($_consultas);$i++){		
		

		$_datos = $datoesc->listarNumeroEscuela($_consultas[$i]['escuela']);	
		
}
	
	
		
	
	#getCantRegistros
	$cantRegistros = $alu1->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit);

	#Listar Nombre Usuario
	$_nombre = $adm1->listarAdministradorins2($usuario);

	
?> 
 
</head>

<body>

	 <TABLE WIDTH=100% CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=256*>
	<TR>
	
		<TD WIDTH=100% VALIGN=BOTTOM STYLE="border: 1.00pt solid #000000; padding: 0.1cm">
			<P LANG="es-ES" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0cm">
			</P>
			
	
	
			<P LANG="es-ES" CLASS="western" ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=3 STYLE="font-size: 13pt">
			<B>REPORTE DE NETBOOKS POR CURSO. </B></FONT></FONT>
			<BR><B> <?php echo $_datos['numeroEscuela'];?></B><B> <?php echo $_datos['nombreEscuela'];?></B>
			
			
			</P>
	<center><img src="<?php echo $httpHostSitio?>plantilla/imagenes/conectar.png" alt="visita aulaclic" width="150" height="70" border="0"></center>		
		</TD>
	</TR>
</TABLE> 
    	
	
<?php 
	
if(count($_consultas)){?>	
	<br>
	<br>
		                        <table border="1">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
												<th>Apellido</th>
                                                <th>Cuil</th>
                                                <th>Curso</th>
												<th>Escuela</th>
												<th>Numero De Serie</th>
												<th>Estado Netbook</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
        		
		<?php for($i=1;$i<=count($_consultas);$i++){		
		
		$_curso = $cur1->listarCurso($_consultas[$i]['curso']);	
		$_marca = $mar1->listarMarca($_consultas[$i]['MarcaNetbook']);
		$_turno = $tur1->listarTurno($_consultas[$i]['turno']);
		$_datos = $datoesc->listarNumeroEscuela($_consultas[$i]['escuela']);	
		
			if($_consultas[$i]['estadoNetbook'] == "Ok")
			{
			$color= "green";
			}
			else
			{
			$color= "red";
			}

		?>			
											<tr>
                                                <td><?php echo $_consultas[$i]['nombre'];?></td>
												<td><?php echo $_consultas[$i]['apellido'];?></td>
                                                <td><?php echo $_consultas[$i]['cuil'];?></td>
                                                <td><?php echo $_curso['nombre'];?></td>
												<td><?php echo $_datos['numeroEscuela'].' - '.$_datos['nombreEscuela']?></td>
												<td><?php echo $_consultas[$i]['numSerie'];?></td>
												<th <?php echo $classTh?> style="color:<?php echo $color?>;"><?php echo $_consultas[$i]['estadoNetbook'];?></th>
											
			</tr>
			<tr>
			 
                               
			</tr>
		<?php }}

		
			else{?>
			<br>
			<br>
			<div class="alert alert-info">
                    <center><strong>Aviso! </strong> No existen resultados.</center>
    </div>
	<?php }?>
	
                                        
                                </div>
								  </tbody>
								  </table>
                                            
         
          <div id="palabra" value="" style="border:1px solid #000000; width:140px;height:20px;margin:0 auto;padding:5px;background:#ABE319;font-Size:18px;" onclick="style.display='none',window.print();"><center>Imprimir</center></div>
        </div><!-- Fin container-fluid ------------------------------------------------------------------------------------------------------>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
