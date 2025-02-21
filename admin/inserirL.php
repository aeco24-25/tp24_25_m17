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
			include ("menu_admin.inc");
		?>
		<section class="col-6">
			<div class="container">
			<form action="inserirLbd.php" method = "POST">
				<div class="row">
					<div class="col-25">
						<label for="isbn"><b>ISBN</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="isbn" name="isbn" placeholder="ISBN...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="editora"><b>Editora</b></label>
					</div>
					<div class="col-75">
						<select name = "codE">
						<?php
							//Ligação
							include("../ligacao.php");
	
							//Mostrar editoras
							$sqlE = "SELECT * FROM editora";
							$consultaE = $ligacao->query($sqlE);
							$consultaE->setFetchMode(PDO::FETCH_ASSOC);
						
							while($resultE = $consultaE->fetch()){
								$nomeE = $resultE['nome'];
								$codE = $resultE['codE'];
								print ("<option value = $codE>$nomeE</option>");
							}
							print ("</select>");
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="autor"><b>Autor</b></label>
					</div>
					<div class="col-75">
						<select name = "codA">
						<?php
							//Ligação
							include("../ligacao.php");
	
							//Mostrar autores
							$sqlA = "SELECT * FROM autores";
							$consultaA = $ligacao->query($sqlA);
							$consultaA->setFetchMode(PDO::FETCH_ASSOC);
						
							while($resultA = $consultaA->fetch()){
								$nomeA = $resultA['nome'];
								$codA = $resultA['codA'];
								print ("<option value = $codA>$nomeA</option>");
							}
							print ("</select>");
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="titulo"><b>Título do livro</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="titulo" name="titulo" placeholder="Título...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="genero"><b>Género</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="genero" name="genero" placeholder="Género...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="precoT"><b>Preço Tabela</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="precoT" name="precoT" placeholder="Preço Tabela...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="npaginas"><b>Número de páginas</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="npaginas" name="npaginas" placeholder="Número de páginas...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="quantStock"><b>Quantidade em Stock</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="quantStock" name="quantStock" placeholder="Quantidade em Stock...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="data_edicao"><b>Data de Edição</b></label>
					</div>
					<div class="col-75">
						<input type="date" placeholder="Escreva a  data" name="data_edicao" required>
					</div>
				</div>
				<br>
				<div class="row">
					<input type="submit" value="Inserir">
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

