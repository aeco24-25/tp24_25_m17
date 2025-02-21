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
			$isbn = $_REQUEST['isbn'];
			$titulo = $_REQUEST['titulo'];
			$genero = $_REQUEST['genero'];
			$precoT = $_REQUEST['precoT'];
			$quantStock = $_REQUEST['quantStock'];
		?>
		<section class="col-6">
			<p class = "texto" ><b>ISBN - </b><?php echo $isbn;?> </p>
			<div class="container">
				<form action="atualizarL2.php" method = "POST">
					<div class="row">
						<div class="col-25">
							<label for="titulo"><b>Título Livro</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $titulo; ?>" name="titulo">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="genero"><b>Género Livro</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $genero; ?>" name="genero">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="precoT"><b>Preço Tabela</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $precoT; ?> €" name="precoT">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="quantStock"><b>Quantidade em Stock</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $quantStock; ?>" name="quantStock">
						</div>
					</div>
					<input type="hidden" value="<?php echo $isbn; ?>" name="isbn">
					<br>
					<div class="row">
						<input type="submit" value="Alterar">
					</div>
				</form>
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

