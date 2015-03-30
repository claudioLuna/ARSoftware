<?php
function nombreModulo(){		
		$path = $_SERVER['PHP_SELF'];
		$dirName = dirname($path); 
	
		$_dirName = explode("/", $dirName); 
	
		$modulo = $_dirName[4];
				
		return $modulo;	
	}
?>
