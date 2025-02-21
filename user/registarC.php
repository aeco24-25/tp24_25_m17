<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="../script.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="../estilos.css">
	<link rel="stylesheet" href="../formularios.css">
	<link rel="stylesheet" href="../tabela.css">
	<title>LivrariaDD</title>
</head>
<body>
	<div class="row">
		<header>
			<div class="col-8">
				<h1>LivrariaDD</h1>
			</div>
		</header>
	</div>
	<div class="row">
		<?php 
			include("../verificar_sessao.php");
			include("../ligacao.php");
			$user = $_SESSION["nome_utilizador"];
						
			//Consulta do código cliente
			$sqlU = "SELECT * FROM utilizadores;";
			$consultaU = $ligacao->query($sqlU);
			$consultaU->setFetchMode(PDO::FETCH_ASSOC);
				
			while($resultU = $consultaU->fetch()){
				$nomeU = $resultU['nomeuser'];
					
				if ($nomeU == $user){
					$codCL = $resultU['codCL'];
					break;
				}
			}
			
			include ("menu_user.inc");
		?>
		<section class="col-6">
			<div class="container">
				<?php
					//Confirmar dados da consulta
					$titulo = $_REQUEST['titulo'];
					$isbn = $_REQUEST['isbn'];
					$codA = $_REQUEST['codA'];
					$nomeA = $_REQUEST['nomeA'];
					$codE = $_REQUEST['codE'];
					$nomeE = $_REQUEST['nomeE'];
					$genero = $_REQUEST['genero'];
					$precoT = $_REQUEST['precoT'];
					$quantStock = $_REQUEST['quantStock'];
					$quant = $_REQUEST['quant'];
					$dataV = $_REQUEST['dataV'];
					$totalV = $quant * $precoT;
					
					if ($quant > $quantStock){
						echo "Quantidade superior a disponível";
						header("Refresh:3; URL = ./comprarL.php"); 
					}
					else {
						//ATUALIZAR A TABELA LIVROS COM A QUANTIDADE EM STOCK e COM AS UNIDADES VENDIDAS
						$quantStock = $quantStock - $quant;
						
						//Ir buscar as unidades vendidas dos livros
						$sqlC1 = "SELECT unidadesV FROM livros WHERE isbn = '$isbn'";
						$consultaC1 = $ligacao->query($sqlC1);
						$consultaC1->setFetchMode(PDO::FETCH_ASSOC);
					
						while($resultC1 = $consultaC1->fetch()){
							$unidadesV = $resultC1['unidadesV'];
						}
						$unidadesV = $unidadesV + $quant;
						
						$sqlV= "UPDATE livros SET quantStock = :quantStock, unidadesV = :unidadesV WHERE isbn = :isbn";
						$atualizar = $ligacao->prepare($sqlV);
						$atualizar->bindParam( ':quantStock', $quantStock, PDO::PARAM_STR);
						$atualizar->bindParam( ':unidadesV', $unidadesV, PDO::PARAM_STR);
						$atualizar->bindParam( ':isbn', $isbn, PDO::PARAM_STR);
						$atualizar->execute();
						$contar = $atualizar->rowCount();
										
						$sqlI = "INSERT INTO vendas(dataV,codCL, codL, precoU, quantV, totalV) 
							VALUES(:dataV, :codCL, :isbn, :precoT, :quant, :totalV)";
						$inserir = $ligacao->prepare($sqlI);
						$inserir->bindParam( ':dataV', $dataV, PDO::PARAM_STR);
						$inserir->bindParam( ':codCL', $codCL, PDO::PARAM_STR);
						$inserir->bindParam( ':isbn', $isbn, PDO::PARAM_STR);
						$inserir->bindParam( ':precoT', $precoT, PDO::PARAM_STR);
						$inserir->bindParam( ':quant', $quant, PDO::PARAM_STR);
						$inserir->bindParam( ':totalV', $totalV, PDO::PARAM_STR);
						$inserir->execute();
						$contar = $inserir->rowCount();
					
						if ($contar == 1)
						{
							echo "<table>";
							echo "<tr><th>Data Venda</th><th>Código Cliente</th><th>ISBN</th><th>Preço Unitário</th>
							<th>Quantidade Comprada</th><th>Total da Venda</th></tr>";
							echo "<td>$dataV</td><td>$codCL</td><td>$isbn</td><td>$precoT €</td><td>$quant</td><td>$totalV €</td></tr>";
							echo "</table>";
						}
					}
				?>
			</div>
		</section>
		<aside class="col-3">
			<figure>
				<img src="../imagens/livros.jpg" alt="livros" style="width:100%;">
			</figure>
			<figcaption> </figcaption>
		</aside>
	</div>
	<div class="row">
		<footer class="col-12">&copy; 2024-2025 3PSI todos os direitos reservados.</footer>
	</div>
</body>
</html>

