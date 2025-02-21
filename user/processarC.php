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
			include ("menu_user.inc");
		?>
		<section class="col-6">
			<div class="container">
				<?php
					$titulo = $_REQUEST['titulo'];
					$isbn = $_REQUEST['isbn'];
					$codA = $_REQUEST['codA'];
					$nomeA = $_REQUEST['nomeA'];
					$codE = $_REQUEST['codE'];
					$nomeE = $_REQUEST['nomeE'];
					$genero = $_REQUEST['genero'];
					$precoT = $_REQUEST['precoT'];
					$quantStock = $_REQUEST['quantStock'];
					
					//Ligação
					include("../ligacao.php");
				?>
					
					<form action="registarC.php" method = "POST">
						<div class="row">
							<div class="col-25">
								<label for="titulo"><b>Titulo Livro</b></label>
							</div>
							<div class="col-75">
								<label for="titulo"><?php echo $titulo; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label for="autor"><b>Nome Autor</b></label>
							</div>
							<div class="col-75">
								<label for="autor"><?php echo $nomeA; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label for="editora"><b>Nome Editora</b></label>
							</div>
							<div class="col-75">
								<label for="editora"><?php echo $nomeE; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label for="genero"><b>Género</b></label>
							</div>
							<div class="col-75">
								<label for="genero"><?php echo $genero; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label for="precoT"><b>Preço Tabela</b></label>
							</div>
							<div class="col-75">
								<label for="precoT"><?php echo $precoT; ?> €</label>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label for="quantS"><b>Quantidade em Stock</b></label>
							</div>
							<div class="col-75">
								<label for="quantS"><?php echo $quantStock; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label for="quant"><b>Quantidade a comprar</b></label>
							</div>
							<div class="col-75">
								<input type="text" name="quant" placeholder="Quantidade a comprar" required>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label for="dataV"><b>Data venda</b></label>
							</div>
							<div class="col-75">
								<input type="date" placeholder="Escreva a  data" name="dataV" required>
							</div>
						</div>
						
						<input type="hidden" value="<?php echo $isbn; ?>" name="isbn">
						<input type="hidden" value="<?php echo $titulo; ?>" name="titulo">
						<input type="hidden" value="<?php echo $nomeA; ?>" name="nomeA">
						<input type="hidden" value="<?php echo $nomeE; ?>" name="nomeE">
						<input type="hidden" value="<?php echo $genero; ?>" name="genero">
						<input type="hidden" value="<?php echo $precoT; ?>" name="precoT">
						<input type="hidden" value="<?php echo $codA; ?>" name="codA">
						<input type="hidden" value="<?php echo $codE; ?>" name="codE">
						<input type="hidden" value="<?php echo $quantStock; ?>" name="quantStock">
						<br>
						<div class="row">
							<input Type="reset" value="Apagar">
							<input type="submit" value="Comprar Livro">
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

