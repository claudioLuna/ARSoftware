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
<h1><font color="#6C3600">Ocurrieron los siguientes errores</font></h1>


<font color="#6C3600"><b>Archivo</b> </font></label><?php echo $e->getFile()?>  <br /><br />
<font color="#6C3600"><b>L&iacute;nea</b> </font></label><?php echo $e->getLine()?><br /><br />
<font color="#6C3600"><b>SqlQuery</b> </font> </label><?php echo $error['consulta']?><br /><br />
<font color="#6C3600"><b>MySql error</b> </font> </label><?php echo $error['mysql']?><br /><br />
<font color="#6C3600"><b>Traza</b> </font></label><?php echo $e->getTraceAsString()?><br /><br />

<font color="#6C3600"><b>Mensaje de error</b> </font> </label><?php echo $e->getMessage()?><br /><br />

	

