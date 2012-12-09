<?php
function db_connect()
{
	$db = new PDO('mysql:host=localhost;dbname=oes', 'root', '');
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return($db);
}
?>
