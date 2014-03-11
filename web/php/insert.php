<?php

	include("connect.php");
	
	$data = $_POST["data"];
	
	//$gravarsql= "insert into searchs (name) value ('"$data"')";
	mysql_query("insert into searchs (name) value ('".$data."')");
	header('Location: ../../index.php');
?>

