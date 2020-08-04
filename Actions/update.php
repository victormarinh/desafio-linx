<?php

	require_once '../Config/ConnectDb.php';

	$id = $_GET['id'];
	$atualizaIbge = $_POST['ibge'];
	$atualizaCidade = $_POST['cidade'];
	$atualizaLatitude = $_POST['latitude'];
	$atualizaLongitude = $_POST['longitude'];
	$atualizaRegiao = $_POST['regiao'];
	$atualizaUf = $_POST['uf'];

	$query = $pdo->prepare("UPDATE cidades SET ibge = :ibge , cidade = :cidade, latitude = :latitude, longitude = :longitude, regiao = :regiao, uf = :uf WHERE id = :id ");

	$query->bindValue(":ibge", $atualizaIbge);
	$query->bindValue(":cidade", $atualizaCidade);
	$query->bindValue(":latitude", $atualizaLatitude);
	$query->bindValue(":longitude", $atualizaLongitude);
	$query->bindValue(":regiao", $atualizaRegiao);
	$query->bindValue(":uf", $atualizaUf);
	$query->bindValue(":id", $id);

	$query->execute();

	header('Location: ../../index.php?success=2');
?>