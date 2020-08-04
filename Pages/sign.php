<?php

	require_once '../Config/ConnectDb.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Cadastrar | Cidade</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
	<div class="container">

		<nav class="navbar navbar-dark bg-dark" style="border-radius: 0px 0px 20px 20px;">
		  <a class="navbar-brand" href="../index.php">MeuBrasil<i class="material-icons">public</i></a>
		</nav>

		<form style="margin: 40px;" method="post" action="../Actions/create.php">

		  <h1 style="text-align: center; color: green;">Cadastrar Cidade</h1>

		  <div class="form-group">
		    <label for="exampleInputEmail1">IBGE:</label>
		    <input type="number" class="form-control" name="ibge" id="exampleInputEmail1" placeholder="IBGE">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Cidade</label>
		    <input type="text" class="form-control" name="cidade" id="exampleInputPassword1" placeholder="Cidade">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Latitude</label>
		    <input type="number" class="form-control" name="latitude" id="exampleInputPassword1" placeholder="Latitude">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Longitude</label>
		    <input type="number" class="form-control" name="longitude" id="exampleInputPassword1" placeholder="Longitude	">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Região</label>
		    <input type="text" class="form-control" name="regiao" id="exampleInputPassword1" placeholder="Região">
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlSelect1">UF</label>
		    <select class="form-control" id="exampleFormControlSelect1" name="uf">

		    	<?php
		    		$query = $pdo->prepare("SELECT uf FROM `cidades` GROUP BY uf");
		  			$query->execute();
		  			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

		  		//print_r($resultado);

		  			foreach ($resultado as $valor) {
		    	?>


		      <option><?php echo $valor['uf']; ?></option>


		  	<?php } ?>
		    </select>
		  </div>

		  <a href="../../index.php" class="btn btn-warning">Voltar</a>
		  <button type="submit" class="btn btn-success" style="float: right;">Cadastrar</button>

		</form>
	</div>
</body>
</html>