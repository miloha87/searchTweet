<?php
    include("connect.php");
    $data = $_GET["query"];

    mysql_query("insert into searchs (name) value ('".$data."')");
?>

