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
		
	#nuevo objeto
	$alu1 = new Alumno();				
	$cur1 = new Curso();
	$mar1 = new Marca();
	$adm1 = new Administrador();
	$tur1 = new Turno();
	$datoesc = new DatosEscuela();
	
	$usuario = $_SESSION["nombreUsuario"];

	#Listar Nombre Usuario
	$_nombre = $adm1->listarAdministradorins2($usuario);
	
	#Paginación	
	$limit=15;		

	if(isset($_GET['pag']))
	{
	$RegistrosAEmpezar=($_GET['pag']-1)*$limit;
	$PagAct=$_GET['pag'];
	}
	else
	{
	$RegistrosAEmpezar=0;
	$PagAct=1;
	}
	
	$alu1->setNombreUsuario($usuario);
	$_alumnos = $alu1->listarAlumnosSinUsoEscolar($RegistrosAEmpezar,$limit);
	$cantRegistros = $alu1->getCantRegistros();	
	
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$cantRegistros/$limit;
$Res=$cantRegistros%$limit;

if($Res>0) $PagUlt=floor($PagUlt)+1;
	
	if(!isset($_GET['order']) || $_GET['order']=="DESC"){
			$order = "ASC";
		}
		else{
			$order = "DESC";
		}		

	if(count($_alumnos)){?>	
		                        <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <td><b><center>Nombre</center></b></td>
												<td><b><center>Apellido</center></b></td>
                                                <td><b><center>Cuil</center></b></td>
                                                <td><b><center>Curso</center></b></td>
												<td><b><center>Escuela</center></b></td>
												<td><b><center>Numero De Serie</center></b></td>
												<td><b><center>Estado Netbook</center></b></td>
                                                <td><b><center>Acciones</center></b></td>
                                            </tr>
                                        </thead>
                                                		
		<?php for($i=1;$i<=count($_alumnos);$i++){		
		
		$_curso = $cur1->listarCurso($_alumnos[$i]['curso']);	
		$_marca = $mar1->listarMarca($_alumnos[$i]['MarcaNetbook']);
		$_turno = $tur1->listarTurno($_alumnos[$i]['turno']);
		$_datos = $datoesc->listarNumeroEscuela($_alumnos[$i]['escuela']);	
		
			if($_alumnos[$i]['estadoNetbook'] == "Ok")
			{
			$color= "green";
			}
			else
			{
			$color= "red";
			}

		?>			
											<tr>
                                                <td><center><?php echo $_alumnos[$i]['nombre'];?></center></td>
												<td><center><?php echo $_alumnos[$i]['apellido'];?></center></td>
                                                <td><center><?php echo $_alumnos[$i]['cuil'];?></center></td>
                                                <td><center><?php echo $_curso['nombre'];?></center></td>
												<td><center><?php echo $_datos['numeroEscuela'].' - '.$_datos['nombreEscuela']?></center></td>
												<td><center><?php echo $_alumnos[$i]['numSerie'];?></center></td>
												<td <?php echo $classTh?> style="color:<?php echo $color?>;"><center><?php echo $_alumnos[$i]['estadoNetbook'];?></center></td>
											<td><center>
					<div>	
					<form method="post" action="modificarAlumno.php">
							<input type="hidden" name="Alumno" value="<?php echo $_alumnos[$i]['id']?>">
							<input type="submit" class="btn btn-primary" value="Editar">
						</form>
					<form method="post" action="verMasDatosAlumno.php">
							<input type="hidden" name="Alumno" value="<?php echo $_alumnos[$i]['id']?>">
							<input type="submit" class="btn btn-success" value="Ver Mas">
						</form>
					<form method="post" action="eliminarAlumno.php">
								<input type="hidden" name="Alumno" value="<?php echo $_alumnos[$i]['id']?>">
						<input type="submit" value="Eliminar" class="btn btn-warning"
						onclick="return confirm('Est seguro que desea eliminar el alumno <?php echo $_alumnos[$i]['nombre'].' '.$_alumnos[$i]['apellido']?>?');">
					</form>
				</center>
				</td>								
			</tr>
		<?php }}
		
			else{?>
			<div class="alert alert-info">
                    <center><strong>Aviso! </strong> No existen alumnos cargados.</center>
    </div>
	<?php }?>
                                      
                                </div>
								  </tbody>
                                    </table>
     	<div style="width:779px;height:20px;border:0px solid #000000;">				
				<center>
					<?php
						if($PagAct>1){?> <a style="color:#000000;" onclick="PaginaImagenes('<?php echo $PagAnt?>');">Anterior</a>
							<?php }echo "<strong>Pagina ".$PagAct."/".$PagUlt."</strong>";
							if($PagAct<$PagUlt){?> <a style="color:#000000;" onclick="PaginaImagenes('<?php echo $PagSig?>');">Siguiente</a>
							<?php }?>
				</center>
	</div>	                               