<?php

	require_once '../Config/ConnectDb.php';

	$novaIbge = $_POST['ibge'];
	$novaCidade = $_POST['cidade'];
	$novaLatitude = $_POST['latitude'];
	$novaLongitude = $_POST['longitude'];
	$novaRegiao = $_POST['regiao'];
	$novaUf = $_POST['uf'];

	$query = $pdo->prepare("SELECT ibge, nome, uf FROM cidades");
	$query->execute();
	$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

	print_r($resultado);

	if (condition) {
		
	}

	$query = $pdo->prepare("INSERT INTO cidades(`ibge`, `uf`, `cidade`, `latitude`, `longitude`, `regiao`) VALUES(:ibge , :uf, :cidade, :latitude, :longitude, :regiao)");

	$query->bindValue(":ibge", $novaIbge);
	$query->bindValue(":cidade", $novaCidade);
	$query->bindValue(":latitude", $novaLatitude);
	$query->bindValue(":longitude", $novaLongitude);
	$query->bindValue(":regiao", $novaRegiao);
	$query->bindValue(":uf", $novaUf);

	//$query->execute();

	//header('Location: ../index.php');
	
?>