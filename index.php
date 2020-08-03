<?php

	require_once 'Config/ConnectDb.php'; 

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Layout-Linx</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
	<div class="container">
  		<nav class="navbar navbar-dark bg-dark" style="border-radius: 0px 0px 20px 20px;">
		  <a class="navbar-brand" href="index.php">MeuBrasil<i class="material-icons">public</i></a>
		    <a class="btn btn-link" href="Pages/region.php" style="color: #fff; margin-left: 750px;">Relatório</a>
		    <a class="btn btn-primary" href="Pages/sign.php">Cadastrar</a>
		</nav>

		<form class="form-inline" method="post" action="" style="margin-top: 25px; justify-content: center;">
		  	<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="escolha">
		        <option selected value="0">Escolha</option>
		        <option value="1">UF</option>
		        <option value="2">Região</option>
		        <option value="3">Cidade</option>
      		</select>
		    <input class="form-control mr-sm-2" type="search" name="buscarLista" placeholder="Pesquisar: UF, Cidade ou Região" aria-label="Search" style="width: 400px;">
		    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-right: 50px;">Pesquisar</button>

		    <!--<h1 style="text-align: center; margin-top: 20px;">Listagem:</h1>-->

		<table class="table" style="margin-top: 25px;">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">IBGE</th>
		      <th scope="col">UF</th>
		      <th scope="col">Cidade</th>
		      <th scope="col">Latitude</th>
		      <th scope="col">Longitude</th>
		      <th scope="col">Região</th>
		      <th scope="col">Opções</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php

		  		if(!isset($_POST['escolha'])){
					$escolha = 0;		  			
		  		}
		  		else{
		  			$escolha = $_POST['escolha'];		  
		  		}

		  		if($escolha == 0){
					$query = $pdo->prepare("SELECT * FROM `cidades`");
		  		}
		  		else if($escolha == 1){
		  			$query = $pdo->prepare("SELECT * FROM `cidades` WHERE uf = :uf");
		  			$query->bindValue(":uf", $_POST['buscarLista']);
		  		}
		  		else if($escolha == 2){
		  			$query = $pdo->prepare("SELECT * FROM `cidades` WHERE regiao = :regiao");
		  			$query->bindValue(":regiao", $_POST['buscarLista']);
		  		}
		  		else if($escolha == 3){
		  			$query = $pdo->prepare("SELECT * FROM `cidades` WHERE cidade = :cidade");
		  			$query->bindValue(":cidade", $_POST['buscarLista']);
		  		}

		  		$query->execute();
		  		$resultado = $query->fetchAll(PDO::FETCH_ASSOC);


		  		//print_r($resultado);

		  		foreach ($resultado as $valor) {

		  	?>

		    <tr>
		      <th scope="row"><?php echo $valor['ibge']; ?></th>
		      <td><?php echo $valor['uf']; ?></td>
		      <td><?php echo $valor['cidade']; ?></td>
		      <td><?php echo $valor['latitude']; ?></td>
		      <td><?php echo $valor['longitude']; ?></td>
		      <td><?php echo $valor['regiao']; ?></td>
		      <td><a href="Pages/modificate.php/?id=<?php echo $valor['id']; ?>" class="btn btn-warning">Atualizar</a><a  href="Actions/delete.php/?id=<?php echo $valor['id']; ?>"class="btn btn-danger" style="margin-left: 10px;">Excluir</a></td>
		    </tr>

		<?php }?>

		  </tbody>
		</table>
		</form>
	</div>
</body>
</html>