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
			$codA = $_REQUEST['codA'];
			$nome = $_REQUEST['nome'];
			$nif = $_REQUEST['nif'];
			$morada = $_REQUEST['morada'];
			$idade = $_REQUEST['idade'];
			$nacionalidade = $_REQUEST['nacionalidade'];
			$generoP = $_REQUEST['generoP'];
		?>
		<section class="col-6">
			<p class = "texto" ><b>Código Autor - </b><?php echo $codA;?> </p>
			<p class = "texto"><b>NIF - </b><?php echo $nif;?> </p>
			<div class="container">
				<form action="atualizarA2.php" method = "POST">
					<div class="row">
						<div class="col-25">
							<label for="nome"><b>Nome Autor</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $nome; ?>" name="nome">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="morada"><b>Morada Autor</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $morada; ?>" name="morada">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="idade"><b>Idade Autor</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $idade; ?>" name="idade">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="nacionalidade"><b>Nacionalidade Autor</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $nacionalidade; ?>" name="nacionalidade">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="generoP"><b>Género Preferido Autor</b></label>
						</div>
						<div class="col-75">
							<input type="text" value="<?php echo $generoP; ?>" name="generoP">
						</div>
					</div>
					<input type="hidden" value="<?php echo $codA; ?>" name="codA">
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

