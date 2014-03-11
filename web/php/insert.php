<?php

	include("connect.php");
	
	$data = $_GET["data"];
	
	//$gravarsql= "insert into searchs (name) value ('"$data"')";
	mysql_query("insert into searchs (name) value ('".$data."')");
	header('Location: ../../index.php');
?>

