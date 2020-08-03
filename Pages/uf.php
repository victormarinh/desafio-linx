<?php

	require_once '../Config/ConnectDb.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Relatorio | Cidades</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-dark bg-dark" style="border-radius: 0px 0px 20px 20px;">
		  <a class="navbar-brand" href="../index.php">MeuBrasil<i class="material-icons">public</i></a>
		  <div>
			  <a class="btn btn-link" href="" style="margin-left: 30px; color: #fff;">UF</a>
			  <a class="btn btn-link" href="region.php" style="color: #fff;">Região</a>
		  </div>
		</nav>

		<h1 style="text-align: center; color: orange; margin: 40px;">Relatório: UF</h1>

		<table class="table" style="margin-top: 25px;">

		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">UF</th>
		      <th scope="col">Quantidade de Cidades</th>
		    </tr>
		  </thead>

		  <tbody>

		  	<?php

		  		$query = $pdo->prepare("SELECT uf, COUNT(cidade) FROM `cidades` GROUP BY uf");
		  		$query->execute();
		  		$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

		  		foreach ($resultado as $valor) {
		  			
		  	?>

		    <tr>
		      <td><?php echo $valor['uf']; ?></td>
		      <td><?php echo $valor['COUNT(cidade)']; ?></td>
		    </tr>

			<?php } ?>

		  </tbody>
		</table>
	</div>
</body>
</html>
