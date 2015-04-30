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
	include_once($docRootSitio."modelo/Administrador.php");	
	include_once($docRootSitio."modelo/Prestamo.php");	
	include_once($docRootSitio."modelo/Alumno.php");
	include_once($docRootSitio."modelo/Curso.php");	
	
	#nuevo objeto
	$pre1 = new Prestamo();
	$alu1 = new Alumno();
	$cur1 = new Curso();
	$adm1 = new Administrador();
	   
	#Variable
	$usuario = $_SESSION["nombreUsuario"];
    $_nombre = $adm1->listarAdministradorins2($usuario);
	$pre1->setNombreUsuario($usuario);
	$_prestamos = $pre1->listarPrestamos($offset,$limit,$campoOrder,$order);	
	
	#getCantRegistros
	$cantRegistros = $pre1->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit);
	
	#Paginación	
	$limit=25;		
	if(is_numeric($_GET['pagina']) && $_GET['pagina']>=1){				
		$offset = ($_GET['pagina']-1) * $limit;		
	}
	else{
		$offset=0;
	}
	
	#Orden por defecto
	if(!isset($_GET['campoOrder']) && !isset($_GET['order']) ){
		$order = "DESC";
	}
	else{
		$campoOrder = $_GET['campoOrder'];
		$order = $_GET['order'];
	}
	
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
			<B>PRESTAMOS DE NETBOOK. </B></FONT></FONT>
			<BR><B> <?php echo $_datos['numeroEscuela'];?></B><B> <?php echo $_datos['nombreEscuela'];?></B>
			
			
			</P>
	<center><img src="<?php echo $httpHostSitio?>plantilla/imagenes/conectar.png" alt="visita aulaclic" width="150" height="70" border="0"></center>		
		</TD>
	</TR>
</TABLE> 
    	
	
<?php 
	
if(count($_prestamos)){?>	
<br>
<br>
		<table border="1" align="center">
			<tr>
				<th>					
					<center><b>Numero De Serie</b></center>		
				</th>
				<th>					
					<center><b>Nombre Alumno</b></center>
				</th>
				<th>					
					<center><b>Fecha Prestamo</b></center>		
				</th>
				<th>					
					<center><b>Fecha Devolucion</b></center>			
				</th>
				<th>					
					<center><b>Estado</b></center>			
				</th>
				<th>					
					<center><b>Curso</b></center>	
				</th>
				
			</tr>	
		
		<?php for($i=1;$i<=count($_prestamos);$i++){			
		$_nombre = $alu1->listarAlumno($_prestamos[$i]['nombre']);
		$_curso = $cur1->listarCurso($_prestamos[$i]['curso']);
			if($i%2==0){
					$class="class='alt'";
					$classTh="class='specalt'";
				}
				else{
					$class="";
					$classTh="class='spec'";
				}
				
			if($_prestamos[$i]['fechaHasta'] <= date("Y-m-d"))
			{
			$men="Debe Devolver La Netbook";
			$color= "red";
			}
			else
			{
			$men="Ok";
			$color= "black";
			}
			
		?>			
			<tr>			
				<td>
					<center><?php echo $_prestamos[$i]['numSerie']?></center>
				</td>	
				<td>
					<center><?php echo $_nombre['nombre'].' '.$_nombre['apellido']?></center>
				</td>
				<td>
					<center><?php echo $_prestamos[$i]['fechaDesde']?></center>
				</td>
				<td>
					<center><?php echo $_prestamos[$i]['fechaHasta']?></center>
				</td>
				<td style="color:<?php echo $color?>;"></center>
					<center><?php echo $men?>
				</td>
				<td>
					<center><?php echo $_curso['nombre']?></center>
				</td>
											
			</tr>
		<?php }?>
		</table>
			 <?php }								
			else{?>
			<div class="alert alert-info">
                    <center><strong>Aviso! </strong> No existen Netbook cargadas.</center>
    </div>
	<?php }?>
	
                                        
                                </div>
								  </tbody>
								  </table>
                                            
         <br>
      
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
