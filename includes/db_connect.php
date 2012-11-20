<?php
function db_connect()
{
	$db = new PDO('mysql:host=localhost;dbname=oes;charset=UTF-8', 'root', '');
	return($db);
}
?>