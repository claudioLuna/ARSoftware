<?php 

error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR); 
$servername='localhost';//localhost 
$dbusername='root';//root 
$dbpassword='root';//tupass 
$dbname='escuelas';//tuclave 
connecttodb($servername,$dbname,$dbusername,$dbpassword); 
function connecttodb($servername,$dbname,$dbusername,$dbpassword) 
{ 
$link=mysql_connect ($servername,$dbusername,$dbpassword); 
if(!$link) 
{ 
die('No puedo Conectarme al Administrador MySQL'.mysql_error()); 
} 
mysql_select_db($dbname,$link) 
or die ('No puedo seleccionar la base de datos'.mysql_error()); 
} 

$fechaDeLaCopia = "-".date("d-l-F-Y");    
$ficheroDeLaCopia =$dbname.$fechaDeLaCopia.".sql";
$sistema="show variables where variable_name= 'basedir'";
$restore=mysql_query($sistema);
$DirBase=mysql_result($restore,0,"value");
$primero=substr($DirBase,0,1);
if ($primero=="/") {
    $DirBase="mysqldump";
    
} 
else 
{
    $DirBase=$DirBase."bin\mysqldump";
     
}

$executa="$DirBase --host=$servername --user=$dbusername --password=$dbpassword -R -c  --add-drop-table $dbname > $ficheroDeLaCopia";
system($executa);

header( "Content-Disposition: attachment; filename=".$ficheroDeLaCopia."");
header("Content-type: application/force-download");
@readfile($ficheroDeLaCopia);

unlink($ficheroDeLaCopia);

?> 