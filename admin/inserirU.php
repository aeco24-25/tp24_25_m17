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
			<form action="inserirUbd.php" method = "POST">
				<div class="row">
					<div class="col-25">
						<label for="nomeuser"><b>Nome Utilizador</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="nomeuser" name="nomeuser" placeholder="Nome de utilizador...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="pwd"><b>Password</b></label>
					</div>
					<div class="col-75">
						<input type="password" id="pwd" name="pwd" placeholder="Password...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="email"><b>Email</b></label>
					</div>
					<div class="col-75">
						<input type="email" id="email" name="email" placeholder="Email...">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="niveluser"><b>Nível de utilizador</b></label>
					</div>
					<div class="col-75">
						<select name = "niveluser">
							<option value = "1">Nível 1 - Administrador</option>
							<option value = "2">Nível 2 - Utilizador</option>
						</select>	
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

