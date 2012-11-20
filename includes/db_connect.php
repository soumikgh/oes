<?php
function db_connect()
{
	$db = new PDO('mysql:host=localhost;dbname=oes', 'root', '');
	return($db);
}
?>
