<?php

	require_once '../Config/ConnectDb.php';

	$id = $_GET['id'];

	$query = $pdo->prepare('DELETE FROM cidades WHERE id = :id');
	$query->bindValue(":id", $id);
	$query->execute();

	header('Location: ../../index.php?success=3');

?>