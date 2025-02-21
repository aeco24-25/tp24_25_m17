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
			include ("menu_admin.inc");
		?>
		<section class="col-6">
			<?php
				//Ligação
				include("../ligacao.php");
				
				$codV = $_REQUEST['codV'];
				$quantV = $_REQUEST['quantV'];
				$isbn = $_REQUEST['codL'];
				
				//IR BUSCAR OS DADOS DOS LIVROS
				$sqlL1 = "SELECT quantStock, unidadesV FROM livros WHERE isbn = '$isbn'";
				$consultaL1 = $ligacao->query($sqlL1);
				$consultaL1->setFetchMode(PDO::FETCH_ASSOC);
					
				while($resultL1 = $consultaL1->fetch()){
					$quantStock = $resultL1['quantStock'];
					$unidadesV = $resultL1['unidadesV'];
				}
				
				//ATUALIZAR A TABELA LIVROS COM A QUANTIDADE EM STOCK e COM AS UNIDADES VENDIDAS
				$quantStock = $quantStock + $quantV;
				$unidadesV = $unidadesV - $quantV;
				$sqlV= "UPDATE livros SET quantStock = :quantStock, unidadesV = :unidadesV WHERE isbn = :isbn";
				$atualizar = $ligacao->prepare($sqlV);
				$atualizar->bindParam( ':quantStock', $quantStock, PDO::PARAM_STR);
				$atualizar->bindParam( ':unidadesV', $unidadesV, PDO::PARAM_STR);
				$atualizar->bindParam( ':isbn', $isbn, PDO::PARAM_STR);
				$atualizar->execute();
				$contar = $atualizar->rowCount();
				
				//APAGAR UMA VENDA
				$sql = "DELETE FROM vendas WHERE codV = :codV";
				$apagar = $ligacao->prepare($sql);
				$apagar->bindParam( ':codV', $codV, PDO::PARAM_STR);
				$apagar->execute();
				$contar = $apagar->rowCount();
				
				if ($contar == 1){
					echo "Registo eliminado!";
					header("Refresh:3 ; URL=removerV.php");
				}
			?>	
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

