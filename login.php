<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="script.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="estilos.css">
	<link rel="stylesheet" href="formularioLogin.css">
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
		<?php include ('menu.inc');?>
		<section class="col-6">
		<p class ="texto"><b>Login</b></p>
			<div class="cform">
				<form class ="cform" action = "processarLogin.php" method = "POST">
				 <label for="user"><b>Nome utilizador</b></label>
				 <input type="text" id="fuser" name="nome_utilizador" placeholder="Username...">
				 <label for="user"><b>Password</b></label>
				 <input type="password" id="fpass" name="palavra_passe" placeholder="Password...">
				 <input name ="submit" type="submit" id ="submit" value = "Enviar">				
				</form>
			</div>
		</section>
		<aside class="col-3">
			<figure>
				<img src="imagens/livros.jpg" alt="livros" style="width:100%;">
			</figure>
			<figcaption></figcaption>
		</aside>
	</div>
	<div class="row">
		<footer class="col-12">&copy; 2024-2025 3PSI todos os direitos reservados.</footer>
	</div>
</body>
</html>

