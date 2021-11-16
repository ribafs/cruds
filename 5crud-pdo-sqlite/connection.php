<?php
// requer criver sqlite no php:
// sudo apt install php7.4-sqlite3
// sudo service apache2 restart
try
{
    $pdo = new PDO('sqlite:./sqlite.db');
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

