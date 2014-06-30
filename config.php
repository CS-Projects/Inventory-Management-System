<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE ^E_DEPRECATED);
$con=mysql_connect("localhost","root","sedatanil48");
$table=mysql_select_db("image") or die (mysql_error());
?>
