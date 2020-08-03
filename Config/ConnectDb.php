<?php

try{
	$pdo = new PDO("mysql:dbname=linx;host=localhost", 'root', '');
}catch(PDOException $e){
	echo "Error na conexão: " . $e->getMessage();
}
