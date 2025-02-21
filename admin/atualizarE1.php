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
			$codE = $_REQUEST['codE'];
			$nome = $_REQUEST['nome'];
			$nif = $_REQUEST['nif'];
			$morada = $_REQUEST['morada'];
			$telefone = $_REQUEST['telefone'];
			$email = $_REQUEST['email'];

		?>
		<section class="col-6">
			<p class = "texto" ><b>Código Editora - </b><?php echo $codE;?> </p>
			<p class = "texto"><b>NIF - </b><?php echo $nif;?> </p>
			<div class="container">
				<form action="atualizarE2.php" method = "POST">
					<div class="row">
						<div class="col-25">
							<label for="nome"><b>Nome Editora</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $nome; ?>" name="nome">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="morada"><b>Morada Editora</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $morada; ?>" name="morada">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="telefone"><b>Telefone Editora</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $telefone; ?>" name="telefone">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="email"><b>Email Editora</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $email; ?>" name="email">
						</div>
					</div>
					<input type="hidden" value="<?php echo $codE; ?>" name="codE">
					<input type="hidden" value="<?php echo $nif; ?>" name="nif">
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

