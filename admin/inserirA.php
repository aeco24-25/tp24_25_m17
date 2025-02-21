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
			<form action="inserirAbd.php" method = "POST">
				<div class="row">
					<div class="col-25">
						<label for="nome"><b>Nome</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="nome" name="nome" placeholder="Nome...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="nif"><b>NIF</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="nif" name="nif" placeholder="NIF...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="morada"><b>Morada</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="morada" name="morada" placeholder="Morada...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="idade"><b>Idade</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="idade" name="idade" placeholder="Idade...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="sexo"><b>Sexo</b></label>
					</div>
					<div class="col-75">
						<select name = "sexo">
							<option value = "m">Masculino</option>
							<option value = "f">Feminino</option>
						</select>	
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="nacionalidade"><b>Nacionalidade</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="nacionalidade" name="nacionalidade" placeholder="Nacionalidade...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="generoP"><b>Género preferido</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="generoP" name="generoP" placeholder="Género Preferido...">
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

