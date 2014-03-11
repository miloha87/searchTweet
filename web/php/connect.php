
<?php

	$link=mysql_connect("localhost", "root", "") or die('No se pudo conectar'); 
	mysql_select_db('twitter') OR DIE ("Error: No es posible establecer la conexión");
?>