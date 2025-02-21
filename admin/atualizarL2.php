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
				$isbn = $_REQUEST['isbn'];
				$titulo = $_REQUEST['titulo'];
				$genero = $_REQUEST['genero'];
				$precoT = $_REQUEST['precoT'];
				$quantStock = $_REQUEST['quantStock'];
				$sql = "UPDATE livros 
						SET titulo = :titulo, genero = :genero, precoT = :precoT, quantStock = :quantStock
						WHERE isbn = :isbn";
				$atualizar = $ligacao->prepare($sql);
				$atualizar->bindParam( ':isbn', $isbn, PDO::PARAM_STR);
				$atualizar->bindParam( ':titulo', $titulo, PDO::PARAM_STR);
				$atualizar->bindParam( ':genero', $genero, PDO::PARAM_STR);
				$atualizar->bindParam( ':precoT', $precoT, PDO::PARAM_STR);
				$atualizar->bindParam( ':quantStock', $quantStock, PDO::PARAM_STR);
				$atualizar->execute();
				$contar = $atualizar->rowCount();
				if ($contar == 1)
				{
					print ("<table>");
					print("<tr><th>ISBN</th><th>Título</th><th>Género</th><th>Preço Tabela</th><th>Quantidade em Stock</th></tr>");
					print("<tr><td>$isbn</td><td>$titulo</td><td>$genero</td><td>$precoT </td><td>$quantStock</td></tr>");
					print("</table>");
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

