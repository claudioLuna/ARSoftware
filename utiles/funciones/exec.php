<?php

exec("ipconfig /all",$_ipconfig);

for($i=0;$i<=count($_ipconfig);$i++){
	echo "<br>" . $_ipconfig[$i];
}
	
	//print_r($_ipconfig);

?>

